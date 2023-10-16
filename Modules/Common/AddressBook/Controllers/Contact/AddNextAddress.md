# Controller Common/AddressBook/Contact/AddNextAddress

## Description

Add additional address to existing contact.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Address
* displayMode: window
* template:
  * id_com_contact
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
  * is_active = TRUE
  * id_com_country: settings_com_address_book_default_country_id

## Parameters Post-processing

  1. Only active contacts are available for `id_com_contact`. If the parameter `idContact != NULL` then the field is disabled and value is preselected (`id_com_contact = idContact`).