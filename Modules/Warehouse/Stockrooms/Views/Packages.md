# View Warehouse/Stockrooms/View/Packages

## Description

List of all stockrooms packages.

## Input Parameters

| Parameter   | PHP Data type | Default value | Description                     |
| ----------- | ------------- | ------------- | ------------------------------- |
| packages    | array         | []            | List of all stockroom packages  |
| id_whs_item | integer       | 0             | Item for filtering and relation |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Package](../Models/Package.md)
* dataset: $input['packages']
* showColumns:    
  * name
  * description
  * id_com_unit
* orderBy:
  * name ASC
* leftTitleButtons:
  * addNew:    
    * hidden when warehouse item for filtering is given (input `id_whs_item > 0`)
    * text: "New Package"
    * controller: [Common/Warehouse/Stockrooms/Package/AddOrEdit](../Controllers/Package/AddOrEdit.md)
  * assignPackageToItem:    
    * hidden when warehouse item for filtering is NOT given (input `id_whs_item == 0`)
    * text: "Assign Package"
    * controller: [Common/Warehouse/Stockrooms/Item/AddOrEditPackage](../Controllers/Item/AddOrEditPackage.md)

## Parameters Post-processing

No post-processing of default parameters is necessary.
