# Contact

## Introduction
Model slúži na evidenciu a správu kontaktov.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                        |
| :-------------------- | :--------------------------- |
| isCrossTable          | FALSE                        |
| sqlName               | com_contacts                 |
| urlBase               | common/address-book/contacts |
| lookupSqlValue        | {%TABLE%}.last_name          |
| tableTitle            | Contacts                     |
| formTitleForInserting | New Contact                  |
| formTitleForEditing   | Contact                      |

## SQL Structure

| Column                 | Description          |  Type   | Length | NULL     | Default |
| :--------------------- | :------------------- | :-----: | :----: | :------- | :-----: |
| id                     | ID záznamu           |   INT   |   8    | NOT NULL |         |
| is_active              | Aktívny kontakt?     | BOOLEAN |   1    | NOT NULL |    1    |
| id_com_contact_user    | ID kontaktnej osoby  |   INT   |   8    | NOT NULL |         |
| id_com_contact_company | ID spoločnosti       |   INT   |   8    | NULL     |         |
| id_com_contact_address | ID primárnej adresy  |   INT   |   8    | NULL     |         |
| id_fin_currency        | ID používanej meny   |   INT   |   8    | NULL     |         |
| language_code          | Preferovaný jazyk    | VARCHAR |   10   | NULL     |         |
| description            | Poznámka ku kontaktu |  TEXT   |        | NULL     |         |

## Columns
TODO: Nahradiť vzorové údaje
* name:
  * required: true
  * type: varchar
  * title: Name
  * byte_size: 100
  * showColumn: true
* description:
  * required: false
  * type: text
  * title: Description
  * showColumn: true
* maturity_date:
  * required: true
  * type: date
  * title: Maturity Date
  * showColumn: true
* is_open:
  * required: true
  * type: boolean
  * title: Is open
  * description: Is the document open or not?
  * showColumn: true
* state_sequence:
  * required: true
  * type: int
  * title: Order In Selects
  * description: Order of the item in input lists.
  * byte_size: 6
  * showColumn: true
* balance:
  * required: false
  * type: float
  * title: Balance
  * byte_size: 15
  * decimals: 2
  * showColumn: true
* id_fin_accounting_period:
  * required: true
  * type: lookup
  * title: Previous Accounting Period
  * model: Widgets/Finance/MainBook/Models/AccountingPeriod
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE


## Foreign Keys

| Column                  | Parent table          | Relation | OnUpdate | OnDelete |
| :---------------------- | :-------------------- | :------: | -------- | -------- |
| id_com_contact_company  | com_contact_companies |   1:N    | Cascade  | Cascade  |
| id_com_contact_category | com_contact_category  |   1:N    | Cascade  | Restrict |
| id_fin_currency         | fin_currencies        |   1:1    | Cascade  | Restrict |

## Indexes

| Name       |  Type   | Column + Order |
| :--------- | :-----: | -------------: |
| id         | PRIMARY |         id ASC |
| first_name |  INDEX  | first_name ASC |
| last_name  |  INDEX  |  last_name ASC |

## Callbacks

### onBeforeInsert

Nepoužíva sa.

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
