# View Warehouse/Stockrooms/Views/Item/AddOrEdit

## Description

Add new stockroom item or edit it.

## Input Parameters

| Parameter     | PHP Data type | Default value | Description            |
| ------------- | ------------- | ------------- | ---------------------- |
| stockroomItem | array         | []            | Stockroom item to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Item](../../Models/Item.md)
* dataset: $input['stockroomItem']
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

1. Edit existing item if $input['stockroomItem'] is NOT empty. Otherwise create new one.