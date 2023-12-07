# View Warehouse/Stockrooms/View/Packages

## Description

List of all stockrooms packages.

## Input Parameters

| Parameter          | PHP Data type | Default value | Description                    |
| ------------------ | ------------- | ------------- | ------------------------------ |
| stockroom_packages | array         | []            | List of all stockroom packages |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Package](../Models/Package.md)
* dataset: $input['stockroom_packages']
* showColumns:    
  * name
  * description
  * id_com_unit
* orderBy:
  * name ASC
* leftTitleButtons:
  * addNew:
    * text: "New Package"
    * controller: [Common/Warehouse/Stockrooms/Package/AddOrEdit](../Controllers/Package/AddOrEdit.md)

## Parameters Post-processing

No post-processing of default parameters is necessary.
