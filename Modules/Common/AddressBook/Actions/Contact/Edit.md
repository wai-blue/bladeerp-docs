# Common/AddressBook/Contact/Edit

## Description

Detail kontaktu.

## Main View

Form

## Default View Parameters

REVIEW DD: upravene pocas telefonatu, treba skontrolovat

* model: App/Widgets/Common/AddressBook/Models/Contact
* displayMode: window
* template:
  * tabs:
    * Contact Detail
      * company_name
      * company_business_number
      * company_tax_number
      * company_vat_number
      * company_description

      * id_com_contact_person:LOOKUP:title_before
      * id_com_contact_person:LOOKUP:first_name
      * id_com_contact_person:LOOKUP:middle_name
      * id_com_contact_person:LOOKUP:last_name
      * id_com_contact_person:LOOKUP:title_after
      * id_com_contact_person:LOOKUP:email
      * id_com_contact_person:LOOKUP:phone

      * id_com_contact_address:LOOKUP:street
      * id_com_contact_address:LOOKUP:street_2
      * id_com_contact_address:LOOKUP:city
      * id_com_contact_address:LOOKUP:postal_code
      * id_com_contact_address:LOOKUP:id_com_country
      * id_com_contact_address:LOOKUP:gps_longitude
      * id_com_contact_address:LOOKUP:gps_latitude
      * id_com_contact_address:LOOKUP:description

      * ADIOS/Core/View/Input/Tags:
        * title: Categories of the contact
        * description: In what categories the contact is?
        * inputParams:
          * model: Widgets/Products/Models/ProductDomainAssignment",
          * initialTags: ...
    * Persons
      * action: Widgets/Common/AddressBook/Actions/ContactPersons
TODO: JG doplniť neexistujúcu akciu
      * parameters:
        * idContact = $data[‘id’]
    * Addresses
      * action: Widgets/Common/AddressBook/Actions/ContactAddresses
TODO: JG doplniť neexistujúcu akciu
      * parameters:
        * idContact = $data[‘id’]
    * Categories
      * action: Widgets/Common/AddressBook/Actions/ContactCategories
TODO: JG doplniť neexistujúcu akciu
      * parameters:
        * idContact = $data[‘id’]

## Parameters Post-processing
  1. Hide all company columns (`com_contact_companies.*`) when contact is person (`id_com_contact_company = NULL`).