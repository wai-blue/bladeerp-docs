# Common/AddressBook/Contact/Edit

## Description

Detail kontaktu.

## Main View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Contact
* displayMode: window
* template:
  * tabs:
    * Contact Detail:
      * view: Form
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
        * com_contact_addresses.street
        * com_contact_addresses.street_2
        * com_contact_addresses.city
        * com_contact_addresses.postal_code
        * com_contact_addresses.id_com_country
        * com_contact_addresses.gps_longitude
        * com_contact_addresses.gps_latitude
        * com_contact_addresses.description
    * Persons:
      * action: Widgets/Common/AddressBook/Models/ContactPerson
      * parameters:
        * idContact = $data[‘id’]
    * Addresses:
      * action: Widgets/Common/AddressBook/Models/ContactAddress
      * parameters:
        * idContact = $data[‘id’]
    * Categories:
      * action: Widgets/Common/AddressBook/Models/ContactCategory
      * parameters:
        * idContact = $data[‘id’]

## Parameters Post-processing
  1. Hide all company columns (`com_contact_companies.*`) when contact is person (`id_com_contact_company = NULL`).