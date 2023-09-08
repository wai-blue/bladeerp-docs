# Common/AddressBook/Contact/AddContactAsPerson

## Description

Create new contact - natural person.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Contact
* displayMode: window
* template:
* id_com_contact_person:LOOKUP:title_before
  * id_com_contact_person:LOOKUP:first_name
  * id_com_contact_person:LOOKUP:middle_name
  * id_com_contact_person:LOOKUP:last_name
  * id_com_contact_person:LOOKUP:title_after
  * id_com_contact_person:LOOKUP:email
  * id_com_contact_person:LOOKUP:phone
  * id_com_contact_address:LOOKUP:street_1
  * id_com_contact_address:LOOKUP:street_2
  * id_com_contact_address:LOOKUP:city
  * id_com_contact_address:LOOKUP:postal_code
  * id_com_contact_address:LOOKUP:id_com_country
  * id_com_contact_address:LOOKUP:notes
  * id_com_contact_address:LOOKUP:location
* defaultValues:
  * is_active = TRUE
  * is_company = FALSE
  * id_com_contact_person:LOOKUP:is_active = TRUE
  * id_com_contact_address:LOOKUP:is_active = TRUE

## Parameters Post-processing

  1. Create new contact and its related new person (`id_com_contact_person`) and new address (`id_com_contact_address`) all togeher (= in one transaction).