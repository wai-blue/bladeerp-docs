# View Common/AddressBook/Country/AddOrEdit

## Description

Add new country or edit it.

## Input Parameters

| Parameter | PHP Data type | Default value | Description     |
| --------- | ------------- | ------------- | --------------- |
| country   | array         | []            | Country to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Country](../../Models/Country.md)
* dataset: $input['country']
* template:
  * columns:
    * name
    * full_name
    * code
* defaultValues:
  * is_active = TRUE

## View Parameters Post-processing

1. Edit existing country if $input['country'] is NOT empty. Otherwise create new one.