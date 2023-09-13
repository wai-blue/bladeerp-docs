# Action Common/AddressBook/Addresses

## Description

List of all addresses related to selected contact from address book.

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
* Zobrazí sa iba na aktívnom riadku (`is_active=TRUE`)
* Po stlačení tlačidla sa nastaví `is_active` daného riadka na FALSE.

### rowButtons.activate
* Zobrazí sa iba na neaktívnom riadku (`is_active=FALSE`)
* Po stlačení tlačidla sa nastaví `is_active` daného riadka na TRUE.

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. If the parameter `idContact != NULL` then show only addresses for given contact (`id_com_contact = idContact`).
  