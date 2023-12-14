# View Warehouse/Stockrooms/Views/Item/AddOrEdit

## Description

Add new warehouse item or edit it.

## Input Parameters

| Parameter     | PHP Data type | Default value | Description                                            |
| ------------- | ------------- | ------------- | ------------------------------------------------------ |
| warehouseItem | array         | []            | Warehouse item to edit                                 |
| medias        | array         | []            | Pictures and other medias related to the stocroom item |
| packages      | array         | []            | Packages related to the stocroom item                  |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Item](../../Models/Item.md)
* dataset: $input['warehouseItem']
* displayMode: window
* template:
  * tabs:
      * Item Detail
        * is_active
        * name
        * description
        * vat_level
        * id_com_media_default
      * Pictures & Other Media
        * inputParams:
          * id_whs_item = $input[warehouseItem['id']]
          * medias = $input[medias]
        * view: [App/Widgets/Warehouse/Stockrooms/Views/Item/Medias](../../Views/Item/Medias)
      * Packages
        * inputParams:
          * id_whs_item = $input[warehouseItem['id']]
          * packages = $input[packages]
        * view: [App/Widgets/Warehouse/Stockrooms/Views/Packages](../../Views/Packages.md)
* defaultValues:
  * is_active = TRUE

## View Parameters Post-processing

1. Edit existing item if $input['warehouseItem'] is NOT empty. Otherwise create new one.