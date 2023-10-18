# Controller Common/CodeLists/Medias

## Description

List of all medias placed in the application.

## View

Table

## Default View Parameters

* model: App/Widgets/Common/CodeLists/Models/Media
* showColumns:
  * id_com_media_type
  * media
  * description
* orderBy: 
  * media ASC

## Parameters Post-processing
1. If the parameter `idMediaType != NULL` then show only medias of given type (`id_com_media_type = idMediaType`). Otherwise show all the medias.

