# Model Common/AddressBook/Country

## Introduction
Model slúži na evidenciu krajín.

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                           |
| :-------------------- | :------------------------------ |
| isJunctionTable          | FALSE                           |
| storeRecordInfo       | TRUE                            |
| sqlName               | com_countries                   |
| urlBase               | common/address-book/countries   |
| lookupSqlValue        | concat(name, " (", code, ")")   |
| tableTitle            | Countries                       |
| formTitleForInserting | New Country                     |
| formTitleForEditing   | Country                         |
| crud/browse/action    | Common/AddressBook/Countries    |
| crud/add/action       | Common/AddressBook/Country/Add  |
| crud/edit/action      | Common/AddressBook/Country/Edit |

## Data Structure
| Column      | Title                | ADIOS Type | Length | Required | Notes                                      |
| :---------- | :------------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |                      |    int     |   8    |   TRUE   | ID záznamu                                 |
| record_info | Record Info          |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Contry Name          |  varchar   |   50   |   TRUE   | Názov krajiny                              |
| full_name   | Offical Country Name |  varchar   |  200   |   TRUE   | Oficiálny názov krajiny                    |
| code        | Alpha-3 Code         |  varchar   |   3    |   TRUE   | Skratka krajiny                            |

### ADIOS Parameters
No additional ADIOS parameters needs to be defined

## Foreign Keys
Model does not contain foreign keys.
## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| name      | UNIQUE  |       name ASC |
| full_name | UNIQUE  |  full_name ASC |
| code      | UNIQUE  |       code ASC |

## Callbacks

### onBeforeInsert
Not used.

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
