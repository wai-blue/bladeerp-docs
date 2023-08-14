# ContactAddress

## Introduction
Model slúži na evidenciu adries. Všetky adresy môžu slúžiť ako doručovacie. Ako fakturačná slúži primárna adresa (tab: **com_contacts**, col: **id_com_contact_address**)

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                                 |
| :-------------------- | :------------------------------------ |
| isCrossTable          | FALSE                                 |
| sqlName               | com_contact_addresses                 |
| urlBase               | common/address-book/contact-addresses |
| lookupSqlValue        | {%TABLE%}.recepient                   |
| tableTitle            | Contact Addresses                     |
| formTitleForInserting | New Contact Address                   |
| formTitleForEditing   | Contact Address                       |

## SQL Structure
| Column         | Description       |  Type   | Length | NULL     | Default |
| :------------- | :---------------- | :-----: | :----: | :------- | :-----: |
| id             | ID záznamu        |   INT   |   8    | NOT NULL |         |
| id_com_contact | ID kontaktu       |   INT   |   8    | NOT NULL |         |
| is_active      | Aktívny kontakt?  | BOOLEAN |   1    | NOT NULL |    1    |
| email          | Kontaktný Email   | VARCHAR |  100   | NULL     |         |
| phone          | Kontaktný Telefón | VARCHAR |   20   | NULL     |         |
| recepient      | Adresát           | VARCHAR |  400   | NOT NULL |         |
| street_1       | Ulica - 1. riadok | VARCHAR |  200   | NULL     |         |
| street_2       | Ulica - 2. riadok | VARCHAR |  200   | NULL     |         |
| city           | Mesto             | VARCHAR |  200   | NULL     |         |
| postal_code    | PSČ               | VARCHAR |   20   | NULL     |         |
| id_com_country | ID krajiny        |   INT   |   8    | NULL     |         |
| description    | Poznámka k adrese |  TEXT   |        | NULL     |         |
| gps_longitude  | GPS dĺžka         | VARCHAR |  300   | NULL     |         |
| gps_latitude   | GPS šírka         | VARCHAR |  300   | NULL     |         |
## Foreign Keys
| Column         | Parent table  | Relation | OnUpdate | OnDelete |
| :------------- | :------------ | :------: | -------- | -------- |
| id_com_contact | com_contacts  |   1:N    | Cascade  | Restrict |
| id_com_country | com_countries |   1:N    | Cascade  | Restrict |
## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |
| recepient |  INDEX  |  recepient ASC |

## Columns
* id_com_contact:
  * required: true
  * type: lookup
  * title: Contact
  * model: Widgets/Common/AddressBook/Models/Contact
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* is_active:
  * required: true
  * type: boolean
  * title: Is active
  * description: Is this address active or not?
  * showColumn: true
* recepient:
  * required: true
  * type: varchar
  * title: Recepient
  * description: Full name of recepient.
  * byte_size: 400
  * showColumn: true
* street_1:
  * required: false
  * type: varchar
  * title: Street 1st Row
  * description: 1st row for a address data.
  * byte_size: 200
  * showColumn: true
* street_2:
  * required: true
  * type: varchar
  * title: Street 2nd Row
  * description: 2ndrow for a address data.
  * byte_size: 200
  * showColumn: true
* city:
  * required: false
  * type: varchar
  * title: City
  * byte_size: 200
  * showColumn: true
* postal_code:
  * required: false
  * type: varchar
  * title: Postal Code
  * byte_size: 20
  * showColumn: true
* id_com_country:
  * required: false
  * type: lookup
  * title: Contry
  * model: Widgets/Common/AddressBook/Models/Country
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* description:
  * required: false
  * type: text
  * title: Description
  * showColumn: false
* gps_longitude:
  * required: false
  * type: varchar
  * title: GPS Longitude
  * byte_size: 300
  * showColumn: false
* gps_latitude:
  * required: false
  * type: varchar
  * title: GPS Latitude
  * byte_size: 300
  * showColumn: false

## Callbacks

### onBeforeInsert
Nepoužíva sa.

### onAfterInsert
Nepoužíva sa.

### onBeforeUpdate
Nepovoliť deaktivovanie adresy, ktorá je uvedená ako primárna (tab: **com_contact**, col: **id_com_address**).

### onAfterUpdate
Nepoužíva sa.

### onBeforeDelete
* Nepovoliť vymazanie adresy, ktorá je uvedená ako primárna (tab: **com_contact**, col: **id_com_address**).

### onAfterDelete

Nepoužíva sa.
## Formatters

### tableCellHTMLlFormatter
Nepoužíva sa.

### tableCellCSVFormatter
Nepoužíva sa.

### tableCellCSSFormatter
Nepoužíva sa.

### tableRowCSSFormatter
Nepoužíva sa.

### cardsCardHtmlFormatter
Nepoužíva sa.
