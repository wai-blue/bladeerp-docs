# Model Warehouse/Stockrooms/StockroomItem

## Introduction

Physical placement of items in stockrooms.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                           |
| :-------------------- | :------------------------------------------------------------------------------ |
| isJunctionTable       | TRUE                                                                            |
| storeRecordInfo       | FALSE                                                                           |
| sqlName               | whs_stockroom_items                                                             |
| urlBase               | warehouse/stockrooms/stockroom/{id_whs_stockroom}/items                         |
| tableTitle            | Stockroom Items                                                                 |
| formTitleForInserting | New Stockroom Item                                                              |
| formTitleForEditing   | Stockroom Item                                                                  |
| crud/browse/action    | Warehouse/Stockrooms/StockroomItems                                             |
| crud/add/action       | Warehouse/Stockrooms/StockroomItem/Add                                          |
| crud/edit/action      | Warehouse/Stockrooms/StockroomItem/Edit                                         |
| junctions             | `json`                                                                          |
|                       | `{`                                                                             |
|                       | `  "StockroomItem": {`                                                          |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Stockrooms/Models/StockroomItem",` |
|                       | `    "optionsModel": "App/Widgets/Warehouse/Stockrooms/Models/Item",`           |
|                       | `    "masterKeyColumn": "id_whs_stockroom",`                                    |
|                       | `    "optionKeyColumn": "id_whs_item",`                                         |
|                       | `  }`                                                                           |
|                       | `}`                                                                             |

## Data Structure

| Column              | Title        | ADIOS Type | Length | Required | Notes                           |
| :------------------ | ------------ | :--------: | :----: | :------: | :------------------------------ |
| id                  |              |    int     |   8    |   TRUE   | Unique record ID                |
| id_whs_stockroom    | Stockroom    |   lookup   |   8    |   TRUE   |                                 |
| id_whs_item         | Item         |   lookup   |   8    |   TRUE   |                                 |
| id_whs_item_package | Item Package |   lookup   |        |   TRUE   |                                 |
| package_amount      | Amount       |  decimal   |  15,2  |   TRUE   | Amount of packages in stockroom |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                                                   | Relation | OnUpdate | OnDelete |
| :------------------ | :---------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_stockroom    | [App/Widgets/Warehouse/Stockrooms/Models/Stockroom](./Stockroom.md)     |   1:N    | Cascade  | Restrict |
| id_whs_item         | [App/Widgets/Warehouse/Stockrooms/Models/Item](./Item.md)               |   1:N    | Cascade  | Cascade  |
| id_whs_item_package | [App/Widgets/Warehouse/Stockrooms/Models/ItemPackage](./ItemPackage.md) |   1:N    | Cascade  | Cascade  |

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |
| id_whs_stockroom    |  INDEX  |    id_whs_stockroom ASC |
| id_whs_item         |  INDEX  |         id_whs_item ASC |
| id_whs_item_package |  INDEX  | id_whs_item_package ASC |

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
