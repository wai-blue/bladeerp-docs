# Controller Common/CodeLists/MediaType/AddOrEdit

## Description

Add new media type or edit it.

## Input Parameters

| Parameter | PHP Data type | Default value | Description        |
| --------- | ------------- | ------------- | ------------------ |
| mediatype | array         | []            | Media Type to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/CodeLists/Models/MediaType](../../Models/MediaType.md)
* template:
  * columns:
    * name
    * description

## View Data Post-processing

1. Edit existing media type if $input['mediatype'] is NOT empty. Otherwise create new one.