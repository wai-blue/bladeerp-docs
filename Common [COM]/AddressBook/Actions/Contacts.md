# Common/AddressBook/Contacts

## Description

Zoznam všetkých aktívnych kontaktov adresára

## Main View

Table

## Parameters

* columns:
  * com_contact_companies.company_name
  * com_contact_companies.business_number
  * com_contact_companies.tax_number
  * CONCAT(com_contact_persons.first_name, ' ', com_contact_persons.last_name)
  * com_contact_persons.email
  * com_contact_persons.phonel
  * fin_currencies.acronym
  * language_code
* orderBy: 
  * com_contacts.is_active DESC
  * com_contact_companies.company_name ASC
  * com_contact_persons.last_name ASC
  * com_contact_persons.first_name ASC
