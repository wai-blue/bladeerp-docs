# ContactAddress

## Introduction
Model slúži na evidenciu fakturačných a doručovacích a doručovacích pre kontakty z adresára.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                                 |
| :-------------------- | :------------------------------------ |
| isCrossTable          | FALSE                                 |
| sqlName               | com_contact_addresses                 |
| urlBase               | common/address-book/contact-addresses |
| lookupSqlValue        | {%TABLE%}.name                        |
| tableTitle            | Contact Addresses                     |
| formTitleForInserting | New Contact Address                   |
| formTitleForEditing   | Contact Address                       |

## SQL Structure

| Column         | Description      |  Type   | Length | NULL     | Default |
| :------------- | :--------------- | :-----: | :----: | :------- | :-----: |
| id             | ID záznamu       |   INT   |   8    | NOT NULL |         |
| id_com_contact | ID kontaktu      |   INT   |   8    | NOT NULL |         |
| is_active      | Aktívna?         | BOOLEAN |   1    | NOT NULL |    1    |
| is_billing     | Ako fakturačná?  | BOOLEAN |   1    | NOT NULL |    1    |
| is_active      | Ako doručovacia? | BOOLEAN |   1    | NOT NULL |    1    |
| first_name     | Krstné meno      | VARCHAR |  200   | NOT NULL |         |
| last_name      | Priezvisko       | VARCHAR |  200   | NOT NULL |         |
| address        | Ulica a číslo    | VARCHAR |  200   | NULL     |         |
| city           | Mesto            | VARCHAR |  200   | NULL     |         |
| postal_code    | PSČ              | VARCHAR |   20   | NULL     |         |
| country_id     | ID krajiny       |   INT   |   8    | NULL     |         |
| website        | WEB              | VARCHAR |  255   | NULL     |         |
| gps_longitude  | GPS dĺžka        | VARCHAR |  300   | NULL     |         |
| gps_latitude   | GPS šírka        | VARCHAR |  300   | NULL     |         |

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

| Column         | Parent table | Relation | OnUpdate | OnDelete |
| :------------- | :----------- | :------: | -------- | -------- |
| id_com_contact | com_contacts |   1:N    | Cascade  | Cascade  |


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

Nepovoliť vymazanie, ak je adresa použitá na niektorom kontakte (tbl: **com_contact_has_address**)

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
