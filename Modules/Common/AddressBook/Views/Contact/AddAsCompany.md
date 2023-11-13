# View Common/AddressBook/Views/Contact/AddAsCompany

## Description

Get data to create new contact - company. Natural person data are related to primary contact person from the company.

## Input Parameters

No input parameters.

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)
* displayMode: window
* template:
    * tabs:
      * Company Data
        * company_name
        * company_business_number
        * company_tax_number
        * company_vat_number
        * id_bkp_currency
        * language_code
        * website
        * notes
        * group:
          * title: Company Address
          * items:
            * id_com_address:LOOKUP:street_1
            * id_com_address:LOOKUP:street_2
            * id_com_address:LOOKUP:city
            * id_com_address:LOOKUP:postal_code
            * id_com_address:LOOKUP:id_com_country
            * id_com_address:LOOKUP:notes
            * id_com_address:LOOKUP:location
        * group:
            * title: Primary Contact Person
            * items:
              * id_com_person:LOOKUP:title_before
              * id_com_person:LOOKUP:first_name
              * id_com_person:LOOKUP:middle_name
              * id_com_person:LOOKUP:last_name
              * id_com_person:LOOKUP:title_after
              * id_com_person:LOOKUP:email
              * id_com_person:LOOKUP:phone
      * Categories
        * ADIOS/Core/View/Input/Tags:
          * title: Categories of the contact
          * description: In what categories the contact is?
          * inputParams:
            * model: * model: $input['contact_categories]
* defaultValues:
  * is_active = TRUE
  * is_company = TRUE
  * id_com_person:LOOKUP:is_active = TRUE
  * id_com_address:LOOKUP:is_active = TRUE
  * id_com_address:LOOKUP:id_com_country: settings_com_address_book_default_country_id
  * id_bkp_currency: settings_bkp_default_currency_code
  * language_code: settings_com_default_language_code

## Parameters Post-processing

  1. OnChange of `company_business_number` search all available company data on FINSTAT WEB via API and fill them to related input fields. 