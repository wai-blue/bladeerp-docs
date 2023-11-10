# View Common/AddressBook/Views/Contact/AddAsPerson

## Description

Get data to create new contact - natural person.

## Input Parameters

| Parameter          | How  | PHP Data type | Default value | Description                  |
| ------------------ | ---- | ------------- | ------------- | ---------------------------- |
| currencies         | POST | array         | []            | List of available currencies |

## Parent View

Form

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)
* displayMode: window
* template:
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
  * id_bkp_currency
  * language_code
  * website
  * notes
* defaultValues:
  * is_active = TRUE
  * is_company = FALSE
  * id_com_person:LOOKUP:is_active = TRUE
  * id_com_address:LOOKUP:is_active = TRUE
  * id_com_address:LOOKUP:id_com_country: settings_com_address_book_default_country_id
  * id_bkp_currency: settings_bkp_default_currency_code
  * language_code: settings_com_address_book_default_language_code

## Parameters Post-processing

[No post-processing of default parameters is necessary.]