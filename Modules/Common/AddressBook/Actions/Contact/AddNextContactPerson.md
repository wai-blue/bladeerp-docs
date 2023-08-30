# Action Common/AddressBook/Contact/AddNextContactPerson

## Description

Add additional contact person to existing contact.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/ContactPerson
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

## Parameters Post-processing

1. Only active contacts are available for `id_com_contact`.