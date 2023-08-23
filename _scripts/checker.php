<?php

/*
  This scripts checks the consisency of the documentation and returns
  errors or warnings.

  USAGE
  
  EXAMPLE 1:
    php checker.php
    Checks everything.

  EXAMPLE 2:
    php checker.php <MODULE>
    Checks everything inside the <MODULE> module.

  EXAMPLE 3:
    php checker.php <MODULE> <WIDGET>
    Checks everything inside the <MODULE> module and <WIDGET> widget.

  EXAMPLE 4:
    php checker.php <MODULE> <WIDGET> <MODEL>
    Checks everything inside the <MODULE> module, <WIDGET> widget and <MODEL> model.
*/


spl_autoload_register(function($className) {
  $classFile = __DIR__ . '/lib/' . str_replace('\\', '/', $className) . '.php';
  if (is_file($classFile)) {
    require_once $classFile;
  }
});

$moduleToCheck = $argv[1] ?? "";
$widgetToCheck = $argv[2] ?? "";
$modelToCheck = $argv[3] ?? "";

$modules = [
  'Bookkeeping',
];

$errors = [];
$warnings = [];
$notices = [];

foreach ($modules as $module) {
  $moduleDir = __DIR__ . '/../' . $module;
  $widgets = scandir($moduleDir);

  if (!empty($moduleToCheck) && $module !== $moduleToCheck) continue;

  echo "Checking module {$module}...\n";

  foreach ($widgets as $widget) {
    $widgetDir = $moduleDir . '/' . $widget;
    $widgetRef = str_replace('\\', '/', realpath($widgetDir));

    if (in_array($widget, ['.', '..'])) continue;
    if (!is_dir($widgetDir)) continue;
    if (!empty($widgetToCheck) && strpos($widgetRef, $widgetToCheck) === FALSE) continue;

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

        $modelRef = str_replace('\\', '/', realpath($widgetDir . '/Models/' . $model));
        $modelContainsLookup = FALSE;

        if (!empty($modelToCheck) && strpos($modelRef, $modelToCheck) === FALSE) continue;

        echo "    Checking model {$model}...\n";

        $md = new \Markdown($widgetDir . '/Models/' . $model);

        // Document outline
        if (
          $md->hasH1('Model') === FALSE
          || $md->hasH2('Introduction') === FALSE
          || $md->hasH2('Constants') === FALSE
          || $md->hasH2('Properties') === FALSE
          || $md->hasH2('Data Structure') === FALSE
          || $md->hasH3('ADIOS Parameters') === FALSE
          || $md->hasH3('Foreign Keys') === FALSE
          || $md->hasH3('Indexes') === FALSE
          || $md->hasH2('Callbacks') === FALSE
        ) {
          $errors[] = "[{$modelRef}] Document outline is invalid.";
        }

        // Properties
        $propertiesTable = $md->findTableByColumns(['Property', 'Value']);
        $properties = [];

        if ($propertiesTable === NULL) {
          $errors[] = "[{$modelRef}] Properties not found.";
        } else if (count($propertiesTable) == 0) {
          $errors[] = "[{$modelRef}] No property defined.";
        } else {
          foreach ($propertiesTable as $row) {
            $properties[$row[0]] = $row[1];
          }
        }

        // Data Structure
        $dataStructure = $md->findTableByColumns(['Column', 'Title', 'ADIOS Type', 'Length', 'Required', 'Notes']);
        $columns = [];

        foreach ($dataStructure as $row) {
          $columns[$row[0]] = [
            'type' => $row[2],
            'foreignKey' => NULL,
            'index' => NULL,
          ];

          if (!in_array($row[2], ["varchar", "int", "date", "datetime", "lookup", "file", "image", "boolean", "decimal", "text", "json"])) {
            $errors[] = "[{$modelRef}] Unknown ADIOS type for `{$row[0]}`.";
          }
          if ($row[2] == "lookup") {
            $modelContainsLookup = TRUE;
          }

          if ($row[2] == "lookup" && substr($row[0], 0, 3) != 'id_') {
            $errors[] = "[{$modelRef}] `{$row[0]}` is lookup and does not start with `id_`.";
          }
          if ($row[2] == "boolean" && substr($row[0], 0, 3) != 'is_') {
            $errors[] = "[{$modelRef}] `{$row[0]}` is boolean and does not start with `is_`.";
          }
          if ($row[2] == "date" && substr($row[0], -5) != '_date') {
            $errors[] = "[{$modelRef}] `{$row[0]}` is date and does not end with `_date`.";
          }

          if (substr($row[0], 0, 3) == 'id_' && $row[2] != "lookup") {
            $errors[] = "[{$modelRef}] `{$row[0]}` starts with `id_` but is not lookup.";
          }
          if (substr($row[0], 0, 3) == 'is_' && $row[2] != "boolean") {
            $errors[] = "[{$modelRef}] `{$row[0]}` starts with `is_` but is not boolean.";
          }
          if (substr($row[0], -5) == '_date' && $row[2] != "date") {
            $errors[] = "[{$modelRef}] `{$row[0]}` ends with `_date` but is not date.";
          }
        }

        // ADIOS Parameters
        $h3AdiosParameters = $md->findContentByH3('ADIOS Parameters');
        if (empty($h3AdiosParameters)) {
          $errors[] = "[{$modelRef}] Definition of ADIOS Parameters is empty.";
        }

        // Foreign Keys
        $foreignKeys = $md->findTableByColumns([
          'Column',
          'Model',
          'Relation',
          'OnUpdate',
          'OnDelete',
        ]);
        if ($foreignKeys === NULL || count($foreignKeys) === 0) {
          $warnings[] = "[{$modelRef}] Foreign keys are not defined or table structure is invalid.";
        } else {
          foreach ($foreignKeys as $row) {
            if (isset($columns[$row[0]])) {
              $columns[$row[0]]['foreignKey'] = $row;
            }
          }
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
        } else {
          foreach ($indexes as $row) {
            if (isset($columns[$row[0]])) {
              $columns[$row[0]]['index'] = $row;
            }
          }
        }

        // Columns
        foreach ($columns as $colName => $colDefinition) {
          if ($colDefinition['type'] == 'lookup') {
            if ($colDefinition['foreignKey'] === NULL) {
              $errors[] = "[{$modelRef}] `{$colName}` is lookup but has no foreign key defined.";
            }
          }

          if (
            in_array($colDefinition['type'], ['lookup', 'boolean'])
            && $colDefinition['index'] === NULL
          ) {
            $errors[] = "[{$modelRef}] `{$colName}` is {$colDefinition['type']} but has no index defined.";
          }

          if (
            in_array($colDefinition['type'], ['date', 'int'])
            && $colDefinition['index'] === NULL
          ) {
            $warnings[] = "[{$modelRef}] `{$colName}` is {$colDefinition['type']} but has no index defined.";
          }
        }

        if ($properties['isCrossTable'] ?? '' === 'TRUE') {
          if (isset($columns['id'])) {
            $errors[] = "[{$modelRef}] Cross-tables cannot contain `id`.";
          }
        } else {
          if (!isset($columns['id'])) {
            $errors[] = "[{$modelRef}] Column `id` not found.";
          }
        }

        // Miscelaneous
        if (
          $properties['isCrossTable'] ?? '' === 'TRUE'
          && strpos($model, 'Has') === FALSE
        ) {
          $warnings[] = "[{$modelRef}] Model is a cross-table but does not contain 'Has' in it's name.";
        }

        if ($properties['isCrossTable'] ?? '' !== 'TRUE') {
          if (
            !isset($columns['id_created_by'])
            || $columns['id_created_by']['type'] != 'lookup'
          ) {
            $errors[] = "[{$modelRef}] `id_created_by` is not defined or is not a lookup.";
          }

          if (
            !isset($columns['create_datetime'])
            || $columns['create_datetime']['type'] != 'datetime'
          ) {
            $errors[] = "[{$modelRef}] `create_datetime` is not defined or is not a datetime.";
          }

          if (
            !isset($columns['id_updated_by'])
            || $columns['id_updated_by']['type'] != 'lookup'
          ) {
            $errors[] = "[{$modelRef}] `id_updated_by` is not defined or is not a lookup.";
          }

          if (
            !isset($columns['update_datetime'])
            || $columns['update_datetime']['type'] != 'datetime'
          ) {
            $errors[] = "[{$modelRef}] `update_datetime` is not defined or is not a datetime.";
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
