# Controller Common/CodeLists/Medias

## Description

List of all medias placed in the application.

## Input Parameters

| Parameter | PHP Data type | Default value | Description        |
| --------- | ------------- | ------------- | ------------------ |
| medias    | array         | []            | List of all medias |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Common/CodeLists/Models/Media](../Models/Media.md)
* showColumns:
  * id_com_media_type
  * media
  * description
* orderBy: 
  * media ASC
* leftTitleButtons:
  * addMedia:
    * text: "New Media"
    * controller: [Common/CodeLists/Media/AddOrEdit](../Controllers/Media/AddOrEdit.md)

## View Data Post-processing

No post-processing of view data is necessary.

