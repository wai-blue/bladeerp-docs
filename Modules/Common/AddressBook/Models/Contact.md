# Model Common/AddressBook/Contact

## Introduction
Model slúži na evidenciu a správu kontaktov. Ak v kontakte neexistuje referencia na spoločnosť (col: **id_com_contact_company** je NULL), v tom prípade sa jedná o kontakt na fyzickú osobu. Fyzická osoba (col: **id_com_contact_person**) slúži na evidenciu fyzickej osoby (nie spoločnosť) alebo primárnej kontaktnej osoby pre spoločnosť (napr. konateľ, obchodník a pod.). Primárna adresa kontaktu (cod: id_com_contact_address) slúži ako fakturačná adresa a všetky prepojené adresy (tab:com_contact_addresses, col: id_com_contact) môžu slúžiť ako doručovacie (aj vrátane fakturačnej). Všetky fyzické osoby (tab: **com_contact_persons**) a adresy (tab: **com_contact_addresses**), tie sú s kontaktom prepojené cez referenciu (viď. modely **ContactPerson** a **ContactAddress**).

## Constants
No constants are defined for this model.

## Properties
| Property              | Value                                               |
| :-------------------- | :-------------------------------------------------- |
| isCrossTable          | FALSE                                               |
| sqlName               | com_contacts                                        |
| urlBase               | common/address-book/contacts                        |
| lookupSqlValue        | concat(company_name, ', ', company_business_number) |
| tableTitle            | Contacts                                            |
| formTitleForInserting | New Contact                                         |
| formTitleForEditing   | Contact                                             |

REVIEW DD: Po novom bude potrebne definovat aj properties `crud/brows/action`, `crud/add/action` a `crud/edit/action`.

## Data Structure
| Column                  | Title                   | ADIOS Type | Length | Required | Notes                |
| :---------------------- | :---------------------- | :--------: | :----: | :------: | :------------------- |
| id                      |                         |    int     |   8    |   TRUE   |                      |
| record_info             | Record Info             |    json    |        |   TRUE   |                      |
| is_active               | Is Active               |  boolean   |   1    |   TRUE   | Aktívny kontakt?     |
| company_name            | Company Name            |  varchar   |  150   |   TRUE   | Názov spoločnosti    |
| company_business_number | Business Number         |  varchar   |   50   |  FALSE   | IČO                  |
| company_tax_number      | Tax Number              |  varchar   |   50   |  FALSE   | DIČ                  |
| company_vat_number      | VAT Bumber              |  varchar   |   50   |  FALSE   | DIČ DPH              |
| id_com_contact_person   | Primary Contact Person  |    int     |   8    |   TRUE   | ID fyzickej osoby    |
| id_com_contact_address  | Primary Address         |    int     |   8    |  FALSE   | ID primárnej adresy  |
| id_bkp_currency         | Primary Currency        |    int     |   8    |  FALSE   | ID používanej meny   |
| language_code           | Primary Language        |  varchar   |   10   |  FALSE   | Preferovaný jazyk    |
| website                 | WEB page                |  varchar   |  255   |  FALSE   | WEB stránka          |
| notes                   | Notes                   |    text    |        |  FALSE   | Poznámka ku kontaktu |
| is_company              | Is the contact company? |  boolean   |   1    |  FALSE   |                      |

### ADIOS Parameters
| Column    | Parameter   | Value                          |
| :-------- | :---------- | ------------------------------ |
| is_active | description | Is this contact active or not? |
|           | default     | 1                              |
| website   | description | URL address of contact         |
|           | default     | https://                       |

REVIEW DD: vid navrh pre website.default

## Foreign Keys
| Column                 | Model                                                                                                        | Relation | OnUpdate | OnDelete |
| :--------------------- | :----------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
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
