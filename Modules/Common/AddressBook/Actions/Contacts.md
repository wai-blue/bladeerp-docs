# Common/AddressBook/Contacts

## Description

Zoznam všetkých aktívnych kontaktov adresára

## Main View

Table

## Parameters

* model: App/Widgets/Common/AddressBook/Models/Contacts
* showColumns:
  * id_com_contact_company
  * id_com_contact_person
  * id_com_contact_address
  * id_bkp_currency
  * language_code
  * is_active
* orderBy: 
  * com_contacts.is_active DESC
  * `id_com_contact_company:LOOKUP`.company_name ASC
  * `id_com_contact_person:LOOKUP`.last_name ASC
  * `id_com_contact_person:LOOKUP`.first_name ASC
* rowButtons:
  * deactivate

### rowButtons.deactivate

Po stlaceni tlacitka sa nastavi `is_active` daneho kontaktu na false.
