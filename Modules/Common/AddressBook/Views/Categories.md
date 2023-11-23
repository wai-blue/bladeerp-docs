# View Common/AddressBook/Views/Categories

## Description

List of all categories which can be assigned to contacts. 

## Input Parameters

| Parameter  | PHP Data type | Default value | Description            |
| ---------- | ------------- | ------------- | ---------------------- |
| categories | array         | []            | List of all categories |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Category](./../Models/Category.md)
* showColumns:
  * name
  * notes
  * is_active
* orderBy: 
  * notes ASC
* rowButtons:
  * deactivate
  * activate
* leftTitleButtons:
  * addCategory:
    * text: "New Category"
    * controller: [Common/AddressBook/Category/AddOrEdit](../Controllers/Category/AddOrEdit.md)

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## View Data Post-processing

No post-processing of view data is necessary.