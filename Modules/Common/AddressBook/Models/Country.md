# Country

## Introduction
Model slúži na evidenciu krajín.

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                         |
| :-------------------- | :---------------------------- |
| isCrossTable          | FALSE                         |
| sqlName               | com_countries                 |
| urlBase               | common/address-book/countries |
| lookupSqlValue        | concat(name, " (", code, ")") |
| tableTitle            | Countries                     |
| formTitleForInserting | New Country                   |
| formTitleForEditing   | Country                       |

## SQL Structure
| Column      | Description             |  Type   | Length | NULL     | Default |
| :---------- | :---------------------- | :-----: | :----: | :------- | :-----: |
| id          | ID záznamu              |   INT   |   8    | NOT NULL |         |
| name        | Názov krajiny           | VARCHAR |   50   | NOT NULL |         |
| full_name   | Oficiálny názov krajiny | VARCHAR |  200   | NOT NULL |         |
| code        | Skratka krajiny         | VARCHAR |   3    | NOT NULL |         |

## Foreign Keys
Model neobsahuje cudzie kľúče.

## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| name      | UNIQUE  |       name ASC |
| full_name |  INDEX  |  full_name ASC |
| code      | UNIQUE  |       code ASC |

## Columns
* name:
  * required: true
  * type: varchar
  * title: Country Name
  * byte_size: 50
  * showColumn: true
* full_name:
  * required: true
  * type: varchar
  * title: Official State Name
  * byte_size: 200
  * showColumn: true
* code:
  * required: true
  * type: varchar
  * title: Alpha-3 Code
  * byte_size: 3
  * showColumn: true

## Callbacks

### onBeforeInsert
Nepovoliť vloženie duplicitnej krajiny podlľa mena (col: **name**) a ani podľa skratky (col: **code**).

### onAfterInsert
Not used.

### onBeforeUpdate
Nepovoliť uloženie duplicitnej krajiny podlľa mena (col: **name**) a ani podľa skratky (col: **code**).

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
