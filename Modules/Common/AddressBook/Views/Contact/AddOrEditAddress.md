# View Common/AddressBook/Views/Contact/AddOrEditAddress

## Description

Add additional address to existing contact or edit existing one.

## Input Parameters

| Parameter      | PHP Data type | Default value | Description                       |
| -------------- | ------------- | ------------- | --------------------------------- |
| id_com_contact | integer       | 0             | Id of contact to add next address |
| address        | array         | []            | Address to edit                   |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Address](../../Models/Address.md)
* dataset: $input['address']
* displayMode: window
* template:
  * street_1
  * street_2
  * city
  * postal_code
  * id_com_country
  * email
  * phone
  * notes
  * location
* defaultValues:
  * id_com_contact = $input['id_com_contact']
  * is_active = TRUE
  * id_com_country: settings_com_address_book_default_country_id

## View Parameters Post-processing

1. Edit existing address if $input['address'] is NOT empty. Otherwise create new one.