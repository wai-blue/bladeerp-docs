# Controller Common/AddressBook/Contacts

## Description

Zoznam všetkých kontaktov adresára

## View

Table

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Contacts
* showColumns:
  * company_name
    * empty when `is_company=FALSE`
  * company_business_number
    * empty when `is_company=FALSE`
  * id_com_person
  * id_com_address
  * id_bkp_currency
  * language_code
  * is_active
* orderBy: 
  * is_active DESC
  * company_name ASC
  * `id_com_person:LOOKUP`.last_name ASC
  * `id_com_person:LOOKUP`.first_name ASC
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

No post-processing of default parameters is necessary.
