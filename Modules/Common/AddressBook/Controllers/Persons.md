# Controller Common/AddressBook/Persons

## Description

List of all natural persons related to selected contact from address book.

## View

Table

## Default View Parameters

* model: AApp/Widgets/Common/AddressBook/Models/Person
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
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## Parameters Post-processing
1. If the parameter `idContact != NULL` then show only persons for given contact (`id_com_contact = idContact`).
  