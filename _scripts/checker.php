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
    php checker.php <MODULE> <WIDGET> <ACTION>
    Checks everything inside the <MODULE> module, <WIDGET> widget, <ACTION> actions and all models.

  EXAMPLE 5:
    php checker.php <MODULE> <WIDGET> <ACTION> -
    Checks everything inside the <MODULE> module, <WIDGET> widget, <ACTION> actions. No model will be checked.

  EXAMPLE 6:
    php checker.php <MODULE> <WIDGET> <ACTION> <MODEL>
    Checks everything inside the <MODULE> module, <WIDGET> widget, <ACTION> actions and <MODEL> models.

  EXAMPLE 7:
    php checker.php <MODULE> <WIDGET> - <MODEL>
    Checks everything inside the <MODULE> module, <WIDGET> widget and <MODEL> models. No action will be checked.
*/


spl_autoload_register(function($className) {
  $classFile = __DIR__ . '/lib/' . str_replace('\\', '/', $className) . '.php';
  if (is_file($classFile)) {
    require_once $classFile;
  }
});

$moduleToCheck = $argv[1] ?? "";
$widgetToCheck = $argv[2] ?? "";
$actionToCheck = $argv[3] ?? "";
$modelToCheck = $argv[4] ?? "";

$modules = [
  'Common',
  'Warehouse',
  'Bookkeeping',
];

$errors = [];
$warnings = [];
$notices = [];

$allActions = [];
foreach ($modules as $module) {
  $moduleDir = __DIR__ . '/../Modules/' . $module;
  if (!is_dir($moduleDir)) continue;

  $widgets = scandir($moduleDir);
  foreach ($widgets as $widget) {
    $widgetDir = $moduleDir . '/' . $widget;
    if (!is_dir($widgetDir . '/Controllers')) continue;

    $actions = \HelperFunctions::scanDirRecursively($widgetDir . '/Controllers');
    foreach ($actions as $action) {
      $allActions[] = "{$module}/{$widget}/" . str_replace('.md', '', $action);
    }
  }
}

foreach ($modules as $module) {
  $moduleDir = __DIR__ . '/../Modules/' . $module;
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

    // Controllers
    if (!is_dir($widgetDir . '/Controllers')) {
      $warnings[] = "[{$widget}] Controllers are not specified.";
    } else if ($actionToCheck != '-') {

      $actions = \HelperFunctions::scanDirRecursively($widgetDir . '/Controllers');
      foreach ($actions as $action) {

        if (in_array($action, ['.', '..'])) continue;

        $actionRef = str_replace('\\', '/', realpath($widgetDir . '/Controllers/' . $action));

        if (!empty($actionToCheck) && strpos($actionRef, $actionToCheck) === FALSE) continue;

        echo "    Checking action {$action}...\n";

        $md = new \Markdown($widgetDir . '/Controllers/' . $action);

        // Document outline
        if (
          $md->hasH1('Controller') === FALSE
          || $md->hasH2('Description') === FALSE
          || $md->hasH2('View') === FALSE
          || $md->hasH2('Default View Parameters') === FALSE
          || $md->hasH2('Parameters Post-processing') === FALSE
        ) {
          $errors[] = "[{$actionRef}] Document outline is invalid.";
        }

      }
    }

    // Models
    if (!is_dir($widgetDir . '/Models')) {
      $warnings[] = "[{$widget}] Models are not specified.";
    } else if ($modelToCheck != '-') {
      $models = scandir($widgetDir . '/Models');
      foreach ($models as $model) {

        if (in_array($model, ['.', '..'])) continue;
        if (!is_file($widgetDir . '/Models/' . $model)) continue;

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

        if (!isset($properties['storeRecordInfo'])) {
          $errors[] = "[{$modelRef}] `storeRecordInfo` is not defined.";
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

          if (!in_array($row[2], ["varchar", "int", "date", "datetime", "lookup",
                                  "file", "image", "boolean", "decimal", "text",
                                  "json","mappoint"])) {
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
        if (
          $modelContainsLookup
          && ($foreignKeys === NULL || count($foreignKeys) === 0)
        ) {
          $warnings[] = "[{$modelRef}] Model contains lookups and foreign keys are not defined or table structure is invalid.";
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

        if (!is_array($indexes)) $indexes = [];

        foreach ($indexes as $row) {
          if (isset($columns[$row[0]])) {
            $columns[$row[0]]['index'] = $row;
          }
        }

        if ($indexes === NULL || count($indexes) === 0) {
          if ($modelContainsLookup) {
            $errors[] = "[{$modelRef}] Indexes are not defined or table structure is invalid and model contains lookups.";
          } else {
            $warnings[] = "[{$modelRef}] Indexes are not defined or table structure is invalid.";
          }
        } else if (count($indexes) === 1 && $indexes[0][0] ?? '' == 'id') {
          if ($modelContainsLookup) {
            $errors[] = "[{$modelRef}] Only one index for column `id` defined and model contains lookups.";
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

        if (!isset($columns['id'])) {
          $errors[] = "[{$modelRef}] Column `id` not found.";
        }

        // if (($properties['isJunctionTable'] ?? '') === 'TRUE') {
        //   if (isset($columns['id'])) {
        //     $errors[] = "[{$modelRef}] Cross-tables cannot contain `id`.";
        //   }
        // } else {
        //   if (!isset($columns['id'])) {
        //     $errors[] = "[{$modelRef}] Column `id` not found.";
        //   }
        // }

        // Miscelaneous

        if (
          ($properties['isJunctionTable'] ?? '') !== 'TRUE'
          && (
            empty($properties['crud/browse/controller'])
            || empty($properties['crud/add/controller'])
            || empty($properties['crud/edit/controller'])
          )
        ) {
          $errors[] = "[{$modelRef}] Browse/Add/Edit CRUD actions are not fully specified.";
        }

        // if (
        //   ($properties['isJunctionTable'] ?? '') === 'TRUE'
        //   && strpos($model, 'Has') === FALSE
        // ) {
        //   $warnings[] = "[{$modelRef}] Model is a junction table but does not contain 'Has' in it's name.";
        // }

        if (
          ($properties['storeRecordInfo'] ?? '') === 'TRUE'
          && (
            !isset($columns['record_info'])
            || $columns['record_info']['type'] != 'json'
          )
        ) {
          $errors[] = "[{$modelRef}] `record_info` is not defined or is not a JSON.";
        }

        if (
          ($properties['storeRecordInfo'] ?? '') !== 'TRUE'
          && isset($columns['record_info'])
        ) {
          $errors[] = "[{$modelRef}] `storeRecordInfo` = FALSE and `record_info` is defined.";
        }

        if (!empty($properties['crud/browse/controller']) && !in_array($properties['crud/browse/controller'], $allActions)) {
          $errors[] = "[{$modelRef}] crud/browse/controller `{$properties['crud/browse/controller']}` is not specified.";
        }

        if (!empty($properties['crud/add/controller']) && !in_array($properties['crud/add/controller'], $allActions)) {
          $errors[] = "[{$modelRef}] crud/add/controller `{$properties['crud/add/controller']}` is not specified.";
        }

        if (!empty($properties['crud/edit/controller']) && !in_array($properties['crud/edit/controller'], $allActions)) {
          $errors[] = "[{$modelRef}] crud/edit/controller `{$properties['crud/edit/controller']}` is not specified.";
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
