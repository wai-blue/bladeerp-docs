# View Warehouse/Stockrooms/Views/Package/AddOrEdit

## Description

Add new stockroom package or edit it.

## Input Parameters

| Parameter         | PHP Data type | Default value | Description               |
| ----------------- | ------------- | ------------- | ------------------------- |
| stockroom_package | array         | []            | Stockroom package to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Package](../../Models/Package.md)
* dataset: $input['stockroom_package']
* displayMode: window
* template:
  * columns:
    * name
    * description
    * id_com_unit

## View Parameters Post-processing

1. Edit existing package if $input['stockroom_package'] is NOT empty. Otherwise create new one.