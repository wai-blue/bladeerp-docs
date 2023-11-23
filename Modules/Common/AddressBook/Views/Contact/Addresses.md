# View Common/AddressBook/Views/Contact/Addresses

## Description

List of all addresses for selected contact.

## Input Parameters

| Parameter      | PHP Data type | Default value | Description                  |
| -------------- | ------------- | ------------- | ---------------------------- |
| id_com_contact | integer       | 0             | ID of current contact        |
| addresses      | array         | []            | Addresses related to Contact |

## Parent View

Table

## Parent View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Address](../.././Models/Address.md)
* dataset: $input['addresses'] 
* showColumns:
  * street_1
  * street_2
  * city
  * postal_code
  * id_com_country
  * email
  * phone
  * location
  * notes
* orderBy: id ASC
* rowButtons:
  * deactivate
  * activate
* leftTitleButtons:
  * addOrEditAddress:
    * text: "New Address"
    * controller: [Common/AddressBook/Contact/AddOrEditAddress](../../Controllers/Contact/AddOrEditAddress.md)
    * inputParams:
      * id_com_contact = $input['id_com_contact']

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## View Parameters Post-processing

No post-processing of view parameters is necessary.
  