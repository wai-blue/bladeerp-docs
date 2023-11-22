# View Common/AddressBook/Views/Countries

## Description

List of all countries which can be used in address book. 

## Input Parameters

| Parameter | PHP Data type | Default value | Description           |
| --------- | ------------- | ------------- | --------------------- |
| countries | array         | []            | List of all countries |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Country](../Models/Country.md)
* showColumns:
  * name
  * full_name
  * code
* orderBy: 
  * name ASC
* leftTitleButtons:
  * addCountry:
    * text: "New Country"
    * controller: [Common/AddressBook/Country/Add](../Controllers/Country/AddOrEdit.md)

## View Data Post-processing

No post-processing of view data is necessary.

