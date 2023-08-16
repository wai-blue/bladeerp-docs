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
| lookupSqlValue        | {%TABLE%}.company_name                |
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

## Foreign Keys
Model neobsahuje cudzie kľúče.

## Indexes
| Name            |  Type   |      Column + Order |
| :-------------- | :-----: | ------------------: |
| id              | PRIMARY |              id ASC |
| company_name    | UNIQUE  |    company_name ASC |
| business_number | UNIQUE  | business_number ASC |
| tax_number      | UNIQUE  |      tax_number ASC |

## Columns
* company_name:
  * required: true
  * type: varchar
  * title: Company Name
  * byte_size: 150
  * showColumn: true
* business_number:
  * required: false
  * type: varchar
  * title: Business Number
  * byte_size: 50
  * showColumn: true
* tax_number:
  * required: false
  * type: varchar
  * title: Tax Number
  * byte_size: 50
  * showColumn: true
* vat_number:
  * required: false
  * type: varchar
  * title: VAT Number
  * byte_size: 50
  * showColumn: true
* description:
  * required: false
  * type: text
  * title: Description
  * showColumn: true

## Callbacks
### onBeforeInsert
Nepovoliť vloženie, ak hodnota **company_name** alebo **business_number** alebo **tax_number** už tabuľke existuje.

### onAfterInsert
Not used.

### onBeforeUpdate
Nepovoliť úpravu, ak hodnota **company_name** alebo **business_number** alebo **tax_number** už tabuľke existuje.

### onAfterUpdate
Not used.

### onBeforeDelete
Nepovoliť vymazanie, ak je firma použitá na niektorom kontakte (tbl: com_contacts)

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
