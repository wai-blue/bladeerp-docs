# Model Common/AddressBook/Contact

## Introduction
Model slúži na evidenciu a správu kontaktov. Ak v kontakte neexistuje referencia na spoločnosť (col: **id_com_contact_company** je NULL), v tom prípade sa jedná o kontakt na fyzickú osobu. Fyzická osoba (col: **id_com_contact_person**) slúži na evidenciu fyzickej osoby (nie spoločnosť) alebo primárnej kontaktnej osoby pre spoločnosť (napr. konateľ, obchodník a pod.). Primárna adresa kontaktu (cod: id_com_contact_address) slúži ako fakturačná adresa a všetky prepojené adresy (tab:com_contact_addresses, col: id_com_contact) môžu slúžiť ako doručovacie (aj vrátane fakturačnej). Všetky fyzické osoby (tab: **com_contact_persons**) a adresy (tab: **com_contact_addresses**), tie sú s kontaktom prepojené cez referenciu (viď. modely **ContactPerson** a **ContactAddress**).

## Constants
No constants are defined for this model.

## Properties
| Property              | Value                        |
| :-------------------- | :--------------------------- |
| isCrossTable          | FALSE                        |
| sqlName               | com_contacts                 |
| urlBase               | common/address-book/contacts |
| lookupSqlValue        | -                            |
| tableTitle            | Contacts                     |
| formTitleForInserting | New Contact                  |
| formTitleForEditing   | Contact                      |

## Data Structure
| Column                 | Title            | ADIOS Type | Length | Required | Notes                                    |
| :--------------------- | :--------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id                     |                  |    int     |   8    |   TRUE   | ID záznamu                               |
| id_created_by          | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime        | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by          | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime        | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| is_active              | Is Active        |  boolean   |   1    |   TRUE   | Aktívny kontakt?                         |
| id_com_contact_company | Company          |    int     |   8    |  FALSE   | ID spoločnosti                           |
| id_com_contact_person  | Person           |    int     |   8    |   TRUE   | ID fyzickej osoby                        |
| id_com_contact_address | Primary Address  |    int     |   8    |  FALSE   | ID primárnej adresy                      |
| id_bkp_currency        | Currency         |    int     |   8    |  FALSE   | ID používanej meny                       |
| language_code          | Primary Language |  varchar   |   10   |  FALSE   | Preferovaný jazyk                        |
| website                | WEB page         |  varchar   |  255   |  FALSE   | WEB stránka                              |
| description            | Comment          |    TEXT    |        |  FALSE   | Poznámka ku kontaktu                     |

### ADIOS Parameters
| Column    | Parameter   | Value                          |
| :-------- | :---------- | ------------------------------ |
| is_active | description | Is this contact active or not? |
|           | default     | 1                              |
| website   | description | URL address of contact         |

## Foreign Keys
| Column                 | Model                                                                                                        | Relation | OnUpdate | OnDelete |
| :--------------------- | :----------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_created_by          | ADIOS/Core/User                                                                                              |   1:N    | Cascade  | Cascade  |
| id_updated_by          | ADIOS/Core/User                                                                                              |   1:N    | Cascade  | Cascade  |
| id_com_contact_company | [App/Widgets/Common/AddressBook/Models/ContactCompany](../../../Common/AddressBook/Models/ContactCompany.md) |   1:1    | Cascade  | Restrict |
| id_com_contact_person  | [App/Widgets/Common/AddressBook/Models/ContactPerson](../../../Common/AddressBook/Models/ContactPerson.md)   |   1:1    | Cascade  | Restrict |
| id_com_contact_address | [App/Widgets/Common/AddressBook/Models/ContactAddress](../../../Common/AddressBook/Models/ContactAddress.md) |   1:1    | Cascade  | Restrict |
| id_bkp_currency        | [App/Widgets/Bookkeeping/ExchangeRate/Models/Currency](../../../Bookkeeping/ExchangeRate/Models/Currency.md) |   1:1    | Cascade  | Restrict |

## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |

## Callbacks

### onBeforeInsert
Ak je kontakt spoločnosťou, musí mať vyplnené a previazané údaje o spoločnosti (col: id_com_contact_company)

### onAfterInsert
Not used.

### onBeforeUpdate
Not used.

### onAfterUpdate
Not used.

### onBeforeDelete
Not used.

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
