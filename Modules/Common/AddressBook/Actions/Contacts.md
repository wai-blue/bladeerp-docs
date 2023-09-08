# Common/AddressBook/Contacts

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
  * id_com_contact_person
  * id_com_contact_address
  * id_bkp_currency
  * language_code
  * is_active
* orderBy: 
  * is_active DESC
  * company_name ASC
  * `id_com_contact_person:LOOKUP`.last_name ASC
  * `id_com_contact_person:LOOKUP`.first_name ASC
* rowButtons:
  * deactivate
  * activate

### rowButtons.deactivate

Zobrazí sa iba na aktívnom riadku (`is_active=TRUE`)
Po stlačení tlačidla sa nastaví `is_active` daného kontaktu na FALSE.

### rowButtons.activate

Zobrazí sa iba na neaktívnom riadku (`is_active=FALSE`)
Po stlačení tlačidla sa nastaví `is_active` daného kontaktu na TRUE.
