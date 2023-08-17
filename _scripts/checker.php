<?php

/* This scripts checks the consisency of the documentation and returns
   errors or warnings. */

spl_autoload_register(function($className) {
  $classFile = __DIR__ . '/lib/' . str_replace('\\', '/', $className) . '.php';
  if (is_file($classFile)) {
    require_once $classFile;
  }
});

$modules = [
  'Finance [FIN]',
];

$errors = [];
$warnings = [];
$notices = [];

foreach ($modules as $module) {
  $moduleDir = __DIR__ . '/../' . $module;
  $widgets = scandir($moduleDir);

  echo "Checking module {$module}...\n";

  foreach ($widgets as $widget) {
    $widgetDir = $moduleDir . '/' . $widget;

    if (in_array($widget, ['.', '..'])) continue;
    if (!is_dir($widgetDir)) continue;

    $widgetRef = str_replace('\\', '/', realpath($widgetDir));

    echo "  Checking widget {$widget}...\n";

    // Introduction.md
    if (!is_file($widgetDir . '/Introduction.md')) $errors[] = "[{$widgetRef}/Introduction.md] File not found.";
    else if (filesize($widgetDir . '/Introduction.md') < 25) $warnings[] = "[{$widgetRef}/Introduction.md] File is too short.";

    // Functional Specification.md
    if (!is_file($widgetDir . '/Functional Specification.md')) $errors[] = "[{$widgetRef}/Functional Specification.md] File not found.";
    else if (filesize($widgetDir . '/Functional Specification.md') < 25) $warnings[] = "[{$widgetRef}/Functional Specification.md] File is too short.";

    // Settings.md
    // $md = new \Markdown($widgetDir . '/Settings.md');
    // $md->findTableByColumns(['Setting', 'Data type', 'Default value', 'Description']);

    // Models
    if (!is_dir($widgetDir . '/Models')) {
      $warnings[] = "[{$widget}] Models are not specified.";
    } else {
      $models = scandir($widgetDir . '/Models');
      foreach ($models as $model) {

        if (in_array($model, ['.', '..'])) continue;

        echo "    Checking model {$model}...\n";

        $modelRef = str_replace('\\', '/', realpath($widgetDir . '/Models/' . $model));
        $modelContainsLookup = FALSE;

        $md = new \Markdown($widgetDir . '/Models/' . $model);

        // Properties
        $properties = $md->findTableByColumns(['Property', 'Value']);
        
        if ($properties === NULL) {
          $errors[] = "[{$modelRef}] Properties not found.";
        } else if (count($properties) == 0) {
          $errors[] = "[{$modelRef}] No property defined.";
        }

        // Columns
        $h2Columns = $md->findContentByH2('Columns');
        if (empty($h2Columns)) {
          $errors[] = "[{$modelRef}] Definition of Columns is empty.";
        } else {
          if (strpos($h2Columns, 'lookup') !== FALSE) {
            $modelContainsLookup = TRUE;
          }
        }

        // Foreign Keys
        $foreignKeys = $md->findTableByColumns([
          'Column',
          'Parent table',
          'Relation',
          'OnUpdate',
          'OnDelete',
        ]);
        if ($foreignKeys === NULL || count($foreignKeys) === 0) {
          $warnings[] = "[{$modelRef}] Foreign keys are not defined or table structure is invalid.";
        }

        // Indexes
        $indexes = $md->findTableByColumns([
          'Name',
          'Type',
          'Column + Order',
        ]);

        if ($indexes === NULL || count($indexes) === 0) {
          if ($modelContainsLookup) {
            $errors[] = "[{$modelRef}] Indexes are not defined or table structure is invalid and model contains lookups.";
          } else {
            $warnings[] = "[{$modelRef}] Indexes are not defined or table structure is invalid.";
          }
        } else if (count($indexes) === 1 && $indexes[0][0] ?? '' == 'id') {
          if ($modelContainsLookup) {
            $errors[] = "[{$modelRef}] Only one index for column `id` defined and model contains lookups.";
          } else {
            $warnings[] = "[{$modelRef}] Only one index for column `id` defined.";
          }
        }
      }
    }


  }
}


// output results

echo "\n";
echo "Results\n";
echo "\n";

$errors = array_unique($errors);
$warnings = array_unique($warnings);

if (count($notices) > 0) {
  echo "NOTICES\n";
  echo join("\n", $notices)."\n";
  echo "\n";
}

if (count($warnings) > 0) {
  echo "WARNINGS\n";
  echo join("\n", $warnings)."\n";
  echo "\n";
}

if (count($errors) > 0) {
  echo "ERRORS\n";
  echo join("\n", $errors)."\n";
  echo "\n";

  echo "Fix errors and rebuild the prototype again.\n";
  echo "\n";

  exit(1);
}
