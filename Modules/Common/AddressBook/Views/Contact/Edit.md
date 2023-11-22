# View Common/AddressBook/Views/Contact/Edit

## Description

Detail kontaktu.

## Input Parameters

| Parameter          | PHP Data type | Default value | Description                  |
| ------------------ | ------------- | ------------- | ---------------------------- |
| contact            | array         | []            | Contact                      |
| contact_categories | array         | []            | Categories of Contact        |
| persons            | array         | []            | Persons related to Contact   |
| addresses          | array         | []            | Addresses related to Contact |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../../../Modules/Common/AddressBook/Models/Contact.md)
* dataset: $input['contact']
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
            * [id_bkp_currency](./../../../../Bookkeeping/ExchangeRate/Models/Currency.md)
            * language_code
            * website
            * notes
      * Categories
        * ADIOS/Core/View/Input/Tags:
          * title: Categories of the contact
          * description: In what categories the contact is?
          * inputParams:
            * initialTags: $input[contact_categories]
            * allTags: [App/Widgets/Common/AddressBook/Models/Category]
      * All Contact Persons
        * inputParams:
          * id_com_contact = $input[contact['id']]
          * persons = $input[persons]          
        * view: [App/Widgets/Common/AddressBook/Views/Contact/Persons](./../../Views/Contact/Persons.md)
      * All Addresses
        * inputParams:
          * id_com_contact = $input[contact['id']]
          * addresses = $input[addresses]          
        * view: [App/Widgets/Common/AddressBook/Views/Contact/Addresses](./../../Views/Contact/Addresses.md)

## View Data Post-processing

  1. Hide all Company Detail data (`company_*`) when the contact is natural person (`is_company=FALSE`). Show all of them otherwise (`is_company=TRUE`)