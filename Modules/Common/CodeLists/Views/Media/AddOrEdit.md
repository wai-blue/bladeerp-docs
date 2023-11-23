# View Common/CodeLists/Views/Media/AddOrEdit

## Description

Add new media type or edit it.

## Input Parameters

| Parameter | PHP Data type | Default value | Description   |
| --------- | ------------- | ------------- | ------------- |
| media     | array         | []            | Media to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/CodeLists/Models/Media](../../Models/Media.md)
* dataset: $input['media']
* displayMode: window
* template:
  * columns:
    * id_com_media_type
    * media
    * description

## View Parameters Post-processing

1. Edit existing media if $input['media'] is NOT empty. Otherwise create new one.
