# View Warehouse/Stockrooms/View/Stockrooms

## Description

List of all stockrooms.

## Input Parameters

| Parameter  | PHP Data type | Default value | Description            |
| ---------- | ------------- | ------------- | ---------------------- |
| stockrooms | array         | []            | List of all stockrooms |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Warehouse/Stockrooms/Models/Stockroom](../Models/Stockroom.md)
* dataset: $input['stockrooms']
* showColumns:  
  * name
  * description
  * street_1
  * street_2
  * city
  * postal_code
  * id_com_country
  * location
* orderBy:
  * name ASC
* rowButtons:
  * deactivate
  * activate
* leftTitleButtons:
  * addNew:
    * text: "New Stockroom"
    * controller: [Common/Warehouse/Stockrooms/Stockroom/AddOrEdit](../Controllers/Stockroom/AddOrEdit.md)

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## Parameters Post-processing

No post-processing of default parameters is necessary.
