# Action Common/AddressBook/Contact/AddNextContactAddress

## Description

Add additional address to existing contact.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/ContactAddress
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
  * description
  * gps_longitude
  * gps_latitude
* defaultValues:
  * is_active = TRUE

## Parameters Post-processing

  1. Only active contacts are available for `id_com_contact`.