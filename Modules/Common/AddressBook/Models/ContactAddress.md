# Model Common/AddressBook/ContactAddress

## Introduction
Model slúži na evidenciu adries. Všetky adresy môžu slúžiť ako doručovacie. Ako fakturačná slúži primárna adresa (tab: **com_contacts**, col: **id_com_contact_address**)

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                                                                        |
| :-------------------- | :--------------------------------------------------------------------------- |
| isCrossTable          | FALSE                                                                        |
| storeRecordInfo       | TRUE                                                                         |
| sqlName               | com_contact_addresses                                                        |
| urlBase               | common/address-book/contact-addresses                                        |
| lookupSqlValue        | concat(street_1, " ", city, " ", postal_code), id_com_country.lookupSqlValue |
| tableTitle            | Contact Addresses                                                            |
| formTitleForInserting | New Contact Address                                                          |
| formTitleForEditing   | Contact Address                                                              |
| crud/browse/action    | Common/AddressBook/ContactAddresses                                          |
| crud/add/action       | Common/AddressBook/ContactAddress/Add                                        |
| crud/edit/action      | Common/AddressBook/ContactAddress/Edit                                       |

REVIEW: JG k lookupSqlValue - potrebné vyriešiť ako v ADIOSe vyriešiť použitie "externej" lookup hodnoty

## Data Structure
| Column         | Title            | ADIOS Type | Length | Required | Notes                                      |
| :------------- | :--------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id             |                  |    int     |   8    |   TRUE   | ID záznamu                                 |
| record_info    | Record Info      |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_com_contact | Contact          |    int     |   8    |   TRUE   | ID kontaktu                                |
| is_active      | Is Active?       |  boolean   |   1    |   TRUE   | Aktívny kontakt?                           |
| street_1       | Street - 1. line |  varchar   |  200   |  FALSE   | Ulica - 1. riadok                          |
| street_2       | Street - 2. line |  varchar   |  200   |  FALSE   | Ulica - 2. riadok                          |
| city           | City             |  varchar   |  200   |  FALSE   | Mesto                                      |
| postal_code    | ZIP              |  varchar   |   20   |  FALSE   | PSČ                                        |
| id_com_country | Country          |    int     |   8    |  FALSE   | ID krajiny                                 |
| email          | Contact Email    |  varchar   |  100   |  FALSE   | Kontaktný Email                            |
| phone          | Contact Phone    |  varchar   |   20   |  FALSE   | Kontaktný Telefón                          |
| notes          | Notes            |    text    |        |  FALSE   | Poznámka k adrese                          |
| location       | GPS Location     |  mapPoint  |        |  FALSE   | GPS location                               |

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
Nepovoliť vymazanie adresy, ktorá je uvedená ako primárna (tab: **com_contact**, col: **id_com_address**).

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
