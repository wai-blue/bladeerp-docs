# Common/AddressBook/Contact/AddPerson

## Description

Vytvorenie nového kontaktu - fyzická osoba.

## Main View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Contact
* cssClass: -
* displayMode: window
* template:
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
    * select
    * zoznam krajín (tab: **com_countries**)
  * com_contact_addresses.gps_longitude
  * com_contact_addresses.gps_latitude
  * com_contact_addresses.description
  
* defaultValues:
  * is_active = TRUE
  * com_contact_addresses.is_active = TRUE

## Parameters Post-processing

[No post-processing of default parameters is necessary.]