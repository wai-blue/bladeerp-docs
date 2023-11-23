# Controller Common/CodeLists/Unit/AddOrEdit

## Description

Add new unit or edit it.

## Input Parameters

| Parameter | PHP Data type | Default value | Description  |
| --------- | ------------- | ------------- | ------------ |
| unit      | array         | []            | Unit to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/CodeLists/Models/Unit](../../Models/Unit.md)
* dataset: $input['unit']
* template:
  * columns:
    * name
    * symbol

## View Data Post-processing

1. Edit existing unit if $input['unit'] is NOT empty. Otherwise create new one.