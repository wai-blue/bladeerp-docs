# Action Common/AddressBook/ContactPersons

## Description

List of all natural persons related to selected contact from address book.

## View

Table

## Default View Parameters

* model: AApp/Widgets/Common/AddressBook/Models/ContactPerson
* showColumns:
  * title_before
  * first_name
  * middle_name
  * last_name
  * title_after
  * email
  * phone
  * url_linkedin
* orderBy: settings_com_address_book_default_person_name_ordering ASC
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
  