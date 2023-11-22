# View Common/AddressBook/Views/Contact/AddOrEditPerson

## Description

Add additional contact person to existing contact or edit existing one.

## Input Parameters

| Parameter      | PHP Data type | Default value | Description                       |
| -------------- | ------------- | ------------- | --------------------------------- |
| id_com_contact | integer       | 0             | Id of contact to add next address |
| person         | array         | []            | Person to edit                    |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Person](../../Models/Person.md)
* dataset: $input['person']
* displayMode: window
* template:
  * title_before
  * first_name
  * middle_name
  * last_name
  * title_after
  * email
  * phone
  * url_linkedin
* defaultValues:
  * id_com_contact = $input['id_com_contact']

## View Data Post-processing

1. Edit existing person if $input['person'] is NOT empty. Otherwise create new one.