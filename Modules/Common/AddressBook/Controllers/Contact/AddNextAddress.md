# Controller Common/AddressBook/Contact/AddNextAddress

## Description

Add additional address to existing contact.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/ContactAddress
* displayMode: window
* template:
  * id_com_contact
  * id_com_address:LOOKUP:street_1
  * id_com_address:LOOKUP:street_2
  * id_com_address:LOOKUP:city
  * id_com_address:LOOKUP:postal_code
  * id_com_address:LOOKUP:id_com_country
  * id_com_address:LOOKUP:email
  * id_com_address:LOOKUP:phone
  * id_com_address:LOOKUP:notes
  * id_com_address:LOOKUP:location
* defaultValues:
  * id_com_address:LOOKUP:is_active = TRUE
  * id_com_country: settings_com_address_book_default_country_id

## Parameters Post-processing

  1. Only active contacts are available for `id_com_contact`. If the parameter `idContact != NULL` then the field is disabled and value is preselected (`id_com_contact = idContact`).