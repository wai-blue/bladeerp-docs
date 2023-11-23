# View Common/AddressBook/Views/Category/AddOrEdit

## Description

Add new category or edit it.

## Input Parameters

| Parameter | PHP Data type | Default value | Description      |
| --------- | ------------- | ------------- | ---------------- |
| category  | array         | []            | Category to edit |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Category](../../Models/Category.md)
* dataset: $input['category']
* displayMode: window
* template:
  * columns:
    * name
    * notes
* defaultValues:
  * is_active = TRUE

## View Parameters Post-processing

1. Edit existing category if $input['category'] is NOT empty. Otherwise create new one.