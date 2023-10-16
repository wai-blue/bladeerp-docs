# Controller Common/AddressBook/Addresses

## Description

List of all addresses.

## View

Table

## Default View Parameters

* model: AApp/Widgets/Common/AddressBook/Models/Address
* showColumns:
  * street_1
  * street_2
  * city
  * postal_code
  * id_com_country
  * email
  * phone
  * location
  * notes
* orderBy: id ASC
* rowButtons:
  * deactivate
  * activate

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## Parameters Post-processing
[No post-processing of default parameters is necessary.]
  