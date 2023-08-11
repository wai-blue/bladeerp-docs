# ContactCompany

## Introduction
Model slúži na evidenciu firemných údajov pre kotakty z adresára.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                                 |
| :-------------------- | :------------------------------------ |
| isCrossTable          | FALSE                                 |
| sqlName               | com_contact_companies                 |
| urlBase               | common/address-book/contact-companies |
| lookupSqlValue        | {%TABLE%}.name                        |
| tableTitle            | Contact Companies                     |
| formTitleForInserting | New Contact Company                   |
| formTitleForEditing   | Contact Company                       |

## SQL Structure

| Column          | Description          |  Type   | Length | NULL     | Default |
| :-------------- | :------------------- | :-----: | :----: | :------- | :-----: |
| id              | ID záznamu           |   INT   |   8    | NOT NULL |         |
| company_name    | Názov spoločnosti    | VARCHAR |  150   | NOT NULL |   “”    |
| business_number | IČO                  | VARCHAR |   50   | NULL     |         |
| tax_number      | DIČ                  | VARCHAR |   50   | NULL     |         |
| vat_number      | DIČ DPH              | VARCHAR |   50   | NULL     |         |
| description     | Poznámka spoločnosti |  TEXT   |        | NULL     |         |

## Columns
TODO

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

Model neobsahuje cudzie kľúče.

## Indexes

| Name            |  Type   |      Column + Order |
| :-------------- | :-----: | ------------------: |
| id              | PRIMARY |              id ASC |
| company_name    | UNIQUE  |    company_name ASC |
| business_number | UNIQUE  | business_number ASC |
| tax_number      | UNIQUE  |      tax_number ASC |

## Callbacks

### onBeforeInsert

Nepovoliť vloženie, ak hodnota **company_name** alebo **business_number** alebo **tax_number** už tabuľke existuje.

### onAfterInsert

Nepoužíva sa.

### onBeforeUpdate

Nepovoliť úpravu, ak hodnota **company_name** alebo **business_number** alebo **tax_number** už tabuľke existuje.

### onAfterUpdate

Nepoužíva sa.

### onBeforeDelete

Nepovoliť vymazanie, ak je firma použitá na niektorom kontakte (tbl: com_contacts)

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
