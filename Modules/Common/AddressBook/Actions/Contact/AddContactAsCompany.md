# Common/AddressBook/Contact/AddContactAsCompany

## Description

Create new contact - company. Natural person data are related to primary contact person from the company.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Contact
* displayMode: window
* template:
  * com_contact_companies.company_name
  * com_contact_companies.business_number
  * com_contact_companies.tax_number
  * com_contact_companies.vat_number
  * com_contact_companies.description
  * com_contact_persons.title_before
  * com_contact_persons.first_name
  * com_contact_persons.middle_name
  * com_contact_persons.last_name
  * com_contact_persons.title_after
  * com_contact_persons.email
  * com_contact_persons.phone
  * com_contact_addresses.street_1
  * com_contact_addresses.street_2
  * com_contact_addresses.city
  * com_contact_addresses.postal_code
  * com_contact_addresses.id_com_country
  * com_contact_addresses.gps_longitude
  * com_contact_addresses.gps_latitude
* defaultValues:
  * is_active = TRUE
  * com_contact_addresses.is_active = TRUE

## Parameters Post-processing

  1. Create new contact and its related new company (`id_com_contact_company`), new person (`id_com_contact_person`) and new address (`id_com_contact_address`) all togeher (= in one transaction).
  2. Search all available company data on FINSTAT WEB via API onChange of `com_contact_companies.business_number`