# View Warehouse/Stockrooms/View/Items

## Description

List of all stockrooms items.

## Input Parameters

| Parameter      | PHP Data type | Default value | Description                 |
| -------------- | ------------- | ------------- | --------------------------- |
| warehouseItems | array         | []            | List of all warehouse items |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Item](../Models/Item.md)
* dataset: $input['warehouseItems']
* showColumns:  
  * id_com_media_default
  * name
  * description
  * vat_level
* orderBy:
  * name ASC
* rowButtons:
  * deactivate
  * activate
* leftTitleButtons:
  * addNew:
    * text: "New Item"
    * controller: [Common/Warehouse/Stockrooms/Item/AddOrEdit](../Controllers/Item/AddOrEdit.md)

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## Parameters Post-processing

No post-processing of default parameters is necessary.
