# View Warehouse/Stockrooms/Views/Stockroom/AddOrEdit

## Description

Add new warehouse item or edit it.

## Input Parameters

| Parameter | PHP Data type | Default value | Description            |
| --------- | ------------- | ------------- | ---------------------- |
| stockroom | array         | []            | Warehouse item to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Stockroom](../../Models/Stockroom.md)
* dataset: $input['stockroom']
* displayMode: window
* template:
  * columns:
    * is_active
    * name
    * description
    * vat_level
    * id_com_media_default
* defaultValues:
  * is_active = TRUE

## View Parameters Post-processing

1. Edit existing item if $input['stockroom'] is NOT empty. Otherwise create new one.