# Model Common/AddressBook/Country

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

## Data Structure
| Column          | Title                | ADIOS Type | Length | Required | Notes                                    |
| :-------------- | :------------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id              |                      |    int     |   8    |   TRUE   | ID záznamu                               |
| id_created_by   | Created By           |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime | Created Datetime     |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by   | Updated By           |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime | Updated Datetime     |  datetime  |   8    |   TRUE   | When the record was updated              |
| name            | Contry Name          |  varchar   |   50   |   TRUE   | Názov krajiny                            |
| full_name       | Offical Country Name |  varchar   |  200   |   TRUE   | Oficiálny názov krajiny                  |
| code            | Alpha-3 Code         |  varchar   |   3    |   TRUE   | Skratka krajiny                          |

### ADIOS Parameters
No additional ADIOS parameters needs to be defined

## Foreign Keys
| Column        | Model           | Relation | OnUpdate | OnDelete |
| :------------ | :-------------- | :------: | -------- | -------- |
| id_created_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |
| id_updated_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |

## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| name      | UNIQUE  |       name ASC |
| full_name |  INDEX  |  full_name ASC |
| code      | UNIQUE  |       code ASC |

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
