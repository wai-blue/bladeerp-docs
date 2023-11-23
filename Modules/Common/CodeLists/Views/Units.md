# View Common/CodeLists/Views/Units

## Description

List of all units used in application.

## Input Parameters

| Parameter | PHP Data type | Default value | Description       |
| --------- | ------------- | ------------- | ----------------- |
| units     | array         | []            | List of all units |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Common/CodeLists/Models/Units](../Models/Unit.md)
* showColumns:
  * name
  * symbol
* orderBy: 
  * name ASC
* leftTitleButtons:
  * addUnit:
    * text: "New Unit"
    * controller: [Common/CodeLists/Unit/AddOrEdit](../Controllers/Unit/AddOrEdit.md)

## View Data Post-processing

No post-processing of view data is necessary.

