# Contact

## Introduction
Model slúži na evidenciu a správu kontaktov.
Primárna adresa kontaktu (cod: id_com_contact_address) slúži ako fakturačná adresa a všetky prepojené adresy (tab:com_contact_addresses, col: id_com_contact) môžu slúžiť ako doručovacie (aj vrátane fakturačnej).

## Constants
V modeli nie sú použité konštanty.

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

## SQL Structure
| Column                 | Description          |  Type   | Length | NULL     | Default |
| :--------------------- | :------------------- | :-----: | :----: | :------- | :-----: |
| id                     | ID záznamu           |   INT   |   8    | NOT NULL |         |
| is_active              | Aktívny kontakt?     | BOOLEAN |   1    | NOT NULL |    1    |
| id_com_contact_company | ID spoločnosti       |   INT   |   8    | NULL     |         |
| id_com_contact_address | ID primárnej adresy  |   INT   |   8    | NULL     |         |
| id_fin_currency        | ID používanej meny   |   INT   |   8    | NULL     |         |
| language_code          | Preferovaný jazyk    | VARCHAR |   10   | NULL     |         |
| website                | WEB stránka          | VARCHAR |  255   | NULL     |         |
| description            | Poznámka ku kontaktu |  TEXT   |        | NULL     |         |

## Foreign Keys
| Column                 | Parent table          | Relation | OnUpdate | OnDelete |
| :--------------------- | :-------------------- | :------: | -------- | -------- |
| id_com_contact_company | com_contact_companies |   1:1    | Cascade  | Restrict |
| id_com_contact_address | com_contact_addresses |   1:1    | Cascade  | Restrict |
| id_fin_currency        | fin_currencies        |   1:1    | Cascade  | Restrict |

## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |

## Columns
* is_active:
  * required: true
  * type: boolean
  * title: Is active
  * description: Is contact active or not?
  * showColumn: true
* id_com_contact_company:
  * required: false
  * type: lookup
  * title: Company
  * model: Widgets/Common/AddressBook/Models/ContactCompany
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* id_com_contact_address:
  * required: false
  * type: lookup
  * title: Primary Address
  * model: Widgets/Common/AddressBook/Models/ContactAddress
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* id_fin_currency:
  * required: false
  * type: lookup
  * title: Primary Currency
  * model: Widgets/Finance/ExchangeRate/Models/Currency
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* language_code:
  * required: true
  * type: varchar
  * title: Primary Language
  * byte_size: 20
  * showColumn: true
* website:
  * required: false
  * type: varchar
  * title: Website
  * description: URL address of contact.
  * byte_size: 255
  * showColumn: false
* description:
  * required: false
  * type: text
  * title: Description
  * showColumn: false

## Callbacks

### onBeforeInsert
Ak je kontakt spoločnosťou, musí mať vyplnené a previazané údaje o spoločnosti (col: id_com_contact_company)

### onAfterInsert
Nepoužíva sa.

### onBeforeUpdate
Nepoužíva sa.

### onAfterUpdate
Nepoužíva sa.

### onBeforeDelete
Nepoužíva sa.

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
