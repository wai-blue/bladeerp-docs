# Controller Common/AddressBook/ContactAddresses

## Description

List of all addresses related to selected contact from address book.

## View

Table

## Default View Parameters

* model: AApp/Widgets/Common/AddressBook/Models/ContactAddress
* showColumns:
  * id_com_address:LOOKUP:street_1
  * id_com_address:LOOKUP:street_2
  * id_com_address:LOOKUP:city
  * id_com_address:LOOKUP:postal_code
  * id_com_address:LOOKUP:id_com_country
  * id_com_address:LOOKUP:email
  * id_com_address:LOOKUP:phone
  * id_com_address:LOOKUP:location
  * id_com_address:LOOKUP:notes
* orderBy: id ASC
* rowButtons:
  * deactivate
  * activate

### rowButtons.deactivate
* Shown only on active row (`id_com_address:LOOKUP:is_active=TRUE`).
* Row item is deactivated `id_com_address:LOOKUP:is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`id_com_address:LOOKUP:is_active=FALSE`).
* Row item is re-activated `id_com_address:LOOKUP:is_active=TRUE` onChange.

## Parameters Post-processing
1. If the parameter `idContact != NULL` then show only addresses for given contact (`id_com_contact = idContact`). Otherwise show all contact addresses.
  