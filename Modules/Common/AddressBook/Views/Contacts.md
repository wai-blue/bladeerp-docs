# View Common/AddressBook/Views/Contacts

## Description

List of all contact in address book.

## Input Parameters

| Parameter | PHP Data type | Default value | Description              |
| --------- | ------------- | ------------- | ------------------------ |
| contacts  | array         | []            | List of contacts to show |

## Parent View

Table

## Parent View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Contact](../../Models/Contact.md)
* showColumns:
  * company_name
    * empty when `is_company=FALSE`
  * company_business_number
    * empty when `is_company=FALSE`
  * id_com_person
  * id_com_address
  * id_bkp_currency
  * language_code
  * is_active
* orderBy: 
  * is_active DESC
  * company_name ASC
  * `id_com_person:LOOKUP`.last_name ASC
  * `id_com_person:LOOKUP`.first_name ASC
* rowButtons:
  * deactivate
  * activate
* leftTitleButtons:
  * addAsCompany:
    * text: "New Company"
    * controller: [Common/AddressBook/Contact/AddAsCompany](../Controllers/Contact/AddAsCompany.md)
  * addAsPerson:
    * text: "New Person"
    * controller: [Common/AddressBook/Contact/AddAsPerson](../Controllers/Contact/AddAsPerson.md)

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## View Data Post-processing

No post-processing of view data is necessary.
