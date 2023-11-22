# View Common/AddressBook/View/Contact/Persons

## Description

List of all natural persons related to selected contact from address book.

## Input Parameters

| Parameter      | PHP Data type | Default value | Description                       |
| -------------- | ------------- | ------------- | --------------------------------- |
| id_com_contact | integer       | 0             | Id of contact to add next address |
| persons        | array         | []            | Persons related to Contact        |

## Parent View

Table

## Default View Parameters

* model: [App/Widgets/Common/AddressBook/Models/Person](./../.././Models/Person.md)
* dataset: $input['persons'] 
* showColumns:
  * title_before
  * first_name
  * middle_name
  * last_name
  * title_after
  * email
  * phone
  * url_linkedin
* orderBy: settings_com_address_book_default_person_name_ordering ASC
* rowButtons:
  * deactivate
  * activate
* leftTitleButtons:
  * addOrEditPerson:
    * text: "New Address"
    * controller: [Common/AddressBook/Contact/AddOrEditPerson](./../../Controllers/Contact/AddOrEditPerson.md)
    * inputParams:
      * id_com_contact = $input['id_com_contact']

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

## View Data Post-processing

No post-processing of view data is necessary.
  