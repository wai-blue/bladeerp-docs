# View Common/CodeLists/Views/MediaTypes

## Description

List of all media types used in application.

## Input Parameters

| Parameter  | PHP Data type | Default value | Description             |
| ---------- | ------------- | ------------- | ----------------------- |
| mediatypes | array         | []            | List of all media types |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Common/CodeLists/Models/MediaType](../Models/MediaType.md)
* showColumns:
  * name
  * description
* orderBy: 
  * name ASC
* leftTitleButtons:
  * addMediaType:
    * text: "New Media Type"
    * controller: [Common/CodeLists/MediaType/AddOrEdit](../Controllers/MediaType/AddOrEdit.md)

## View Parameters Post-processing

No post-processing of view parameters is necessary.

