# View Common/AddressBook/Views/Contact/Edit

## Description

Detail kontaktu.

## Input Parameters

| Parameter          | How  | PHP Data type | Default value | Description                  |
| ------------------ | ---- | ------------- | ------------- | ---------------------------- |
| contact            | POST | array         | []            | Contact                      |
| contact_categories | POST | array         | []            | Categories of Contact        |
| persons            | POST | array         | []            | Persons related to Contact   |
| addresses          | POST | array         | []            | Addresses related to Contact |
| currencies         | POST | array         | []            | List of available currencies |

## Parent View

Form

## Default View Parameters

* model: $input['contact]
* displayMode: window
* template:
    * tabs:
      * Company Detail
        * company_name
        * company_business_number
        * company_tax_number
        * company_vat_number
        * company_description
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
            * id_com_person:LOOKUP:url_linkedin
        * group:
          * title: Primary Address
          * items:
            * id_com_address:LOOKUP:street_1
            * id_com_address:LOOKUP:street_2
            * id_com_address:LOOKUP:city
            * id_com_address:LOOKUP:postal_code
            * id_com_address:LOOKUP:id_com_country
            * id_com_address:LOOKUP:location
            * id_com_address:LOOKUP:description      
        * group:
          * title: Additional Contact Data
          * items:
            * id_bkp_currency
            * language_code
            * website
            * notes
      * Categories
        * ADIOS/Core/View/Input/Tags:
          * title: Categories of the contact
          * description: In what categories the contact is?
          * inputParams:
            * model: * model: $input['contact_categories]
      * All Contact Persons
        * model: $input['persons]
      * All Addresses
        * model: $input['addresses]

## Parameters Post-processing
  1. Hide all Company Detail data (`company_*`) when the contact is natural person (`is_company=FALSE`). Show all of them otherwise (`is_company=TRUE`)