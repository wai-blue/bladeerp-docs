# Action Common/AddressBook/Contact/AddAsCompany

## Description

Create new contact - company. Natural person data are related to primary contact person from the company.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Contact
* displayMode: window
* template:
  * company_name
  * company_business_number
  * company_tax_number
  * company_vat_number
  * id_com_person:LOOKUP:title_before
  * id_com_person:LOOKUP:first_name
  * id_com_person:LOOKUP:middle_name
  * id_com_person:LOOKUP:last_name
  * id_com_person:LOOKUP:title_after
  * id_com_person:LOOKUP:email
  * id_com_person:LOOKUP:phone
  * id_com_address:LOOKUP:street_1
  * id_com_address:LOOKUP:street_2
  * id_com_address:LOOKUP:city
  * id_com_address:LOOKUP:postal_code
  * id_com_address:LOOKUP:id_com_country
  * id_com_address:LOOKUP:notes
  * id_com_address:LOOKUP:location
* defaultValues:
  * is_active = TRUE
  * is_company = TRUE
  * id_com_person:LOOKUP:is_active = TRUE
  * id_com_address:LOOKUP:is_active = TRUE
  * id_com_country: settings_com_address_book_default_country_id

## Parameters Post-processing

  1. OnChange of `company_business_number` search all available company data on FINSTAT WEB via API and fill them to related input fields. 
  2. Create new contact and its related new person (`id_com_person`) and new address (`id_com_address`) all togeher (= in one transaction).
  