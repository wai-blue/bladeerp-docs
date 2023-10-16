# Action Common/AddressBook/Contact/AddNextPerson

## Description

Add additional contact person to existing contact.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Person
* displayMode: window
* template:
  * id_com_contact
  * title_before
  * first_name
  * middle_name
  * last_name
  * title_after
  * email
  * phone
  * url_linkedin

## Parameters Post-processing

1. Only active contacts are available for `id_com_contact`. If the parameter `idContact != NULL` then the field is disabled and value is preselected (`id_com_contact = idContact`).