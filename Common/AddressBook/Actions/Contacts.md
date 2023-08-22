# Common/AddressBook/Contacts

## Description

Zoznam všetkých aktívnych kontaktov adresára

## Main View

Table

## Parameters

* model: App/Widgets/Common/AddressBook/Models/Contacts
* columns:
  * id_com_contact_company
  * id_com_contact_person
  * id_com_contact_address
  * id_fin_currency
  * language_code
* orderBy: 
  * com_contacts.is_active DESC
  * `id_com_contact_company:LOOKUP`.company_name ASC
  * `id_com_contact_person:LOOKUP`.last_name ASC
  * `id_com_contact_person:LOOKUP`.first_name ASC
