# Model Common/AddressBook/ContactAddress

## Introduction
Model slúži na evidenciu adries. Všetky adresy môžu slúžiť ako doručovacie. Ako fakturačná slúži primárna adresa (tab: **com_contacts**, col: **id_com_contact_address**)

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                                                                        |
| :-------------------- | :--------------------------------------------------------------------------- |
| isCrossTable          | FALSE                                                                        |
| sqlName               | com_contact_addresses                                                        |
| urlBase               | common/address-book/contact-addresses                                        |
| lookupSqlValue        | concat(street_1, " ", city, " ", postal_code), id_com_country.lookupSqlValue |
| tableTitle            | Contact Addresses                                                            |
| formTitleForInserting | New Contact Address                                                          |
| formTitleForEditing   | Contact Address                                                              |
TODO: DD vyriešiť ako v ADIOSe urobiť lookupSqlValue v tomto prípade (viď. tabuľka Properties)

## Data Structure
| Column          | Title            | ADIOS Type | Length | Required | Notes                                    |
| :-------------- | :--------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id              |                  |    int     |   8    |   TRUE   | ID záznamu                               |
| id_created_by   | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by   | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| id_com_contact  | Contact          |    int     |   8    |   TRUE   | ID kontaktu                              |
| is_active       | Is Active?       |  boolean   |   1    |   TRUE   | Aktívny kontakt?                         |
| street_1        | Street - 1. line |  varchar   |  200   |  FALSE   | Ulica - 1. riadok                        |
| street_2        | Street - 2. line |  varchar   |  200   |  FALSE   | Ulica - 2. riadok                        |
| city            | City             |  varchar   |  200   |  FALSE   | Mesto                                    |
| postal_code     | ZIP              |  varchar   |   20   |  FALSE   | PSČ                                      |
| id_com_country  | Country          |    int     |   8    |  FALSE   | ID krajiny                               |
| email           | Contact Email    |  varchar   |  100   |  FALSE   | Kontaktný Email                          |
| phone           | Contact Phone    |  varchar   |   20   |  FALSE   | Kontaktný Telefón                        |
| description     | Comment          |    text    |        |  FALSE   | Poznámka k adrese                        |
| gps_longitude   | GPS Longitude    |  varchar   |  300   |  FALSE   | GPS dĺžka                                |
| gps_latitude    | GPS Latitude     |  varchar   |  300   |  FALSE   | GPS šírka                                |

### ADIOS Parameters
| Column    | Parameter   | Value                          |
| :-------- | :---------- | ------------------------------ |
| is_active | description | Is this address active or not? |
|           | default     | 1                              |
| street_1  | description | 1st row for a address data     |
| street_2  | description | 2nd row for a address data     |

## Foreign Keys
| Column         | Model                                                                                          | Relation | OnUpdate | OnDelete |
| :------------- | :--------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_created_by  | ADIOS/Core/User                                                                                |   1:N    | Cascade  | Cascade  |
| id_updated_by  | ADIOS/Core/User                                                                                |   1:N    | Cascade  | Cascade  |
| id_com_contact | [App/Widgets/Common/AddressBook/Models/Contact](../../../Common/AddressBook/Models/Contact.md) |   1:N    | Cascade  | Restrict |
| id_com_country | [App/Widgets/Common/AddressBook/Models/Country](../../../Common/AddressBook/Models/Country.md) |   1:N    | Cascade  | Restrict |
## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |

## Callbacks

### onBeforeInsert
Not used.

### onAfterInsert
Not used.

### onBeforeUpdate
Nepovoliť deaktivovanie adresy (col: **is_active**), ktorá je uvedená ako primárna (tab: **com_contact**, col: **id_com_address**).

### onAfterUpdate
Not used.

### onBeforeDelete
* Nepovoliť vymazanie adresy, ktorá je uvedená ako primárna (tab: **com_contact**, col: **id_com_address**).

### onAfterDelete

Not used.
## Formatters

### tableCellHTMLFormatter
Not used.

### tableCellCSVFormatter
Not used.

### tableCellCSSFormatter
Not used.

### tableRowCSSFormatter
Not used.

### cardsCardHtmlFormatter
Not used.
