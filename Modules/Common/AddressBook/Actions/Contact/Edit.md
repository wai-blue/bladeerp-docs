# Common/AddressBook/Contact/Edit

## Description

Detail kontaktu.

## Main View

Form

## Parameters

* tabs:
  * Contact Detail:
    * view: Form
    * template:
      * com_contact_companies.company_name
        * hidden IF person
      * com_contact_companies.business_number
        * hidden IF person
      * com_contact_companies.tax_number
        *  hidden IF person
      * com_contact_companies.vat_number
        *  hidden IF person
      * com_contact_companies.description
        *  hidden IF person
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
        * select
        * zoznam krajín (tab: **com_countries**)
      * com_contact_addresses.gps_longitude
      * com_contact_addresses.gps_latitude
      * com_contact_addresses.description
  * Persons:
    * action: Widgets/Common/AddressBook/ContactPersons
    * parameters:
      * idContact = $data[‘id’]
  * Addresses:
    * action: Widgets/Common/AddressBook/ContactAddresses
    * parameters:
      * idContact = $data[‘id’]
  * Categories:
    * action: Widgets/Common/AddressBook/ContactCategories
    * parameters:
      * idContact = $data[‘id’]