# Model Warehouse/Stockrooms/ItemPrice

## Introduction

Prices of stockrooms items.
**Rules:**
* Current price of the item is the one which is valid TODAY (e.g. `valid_from_datetime < now() AND valid_to_datetime==NULL`).
* When new price entered the previous one should NOT be deleted but only its end validity (`valid_to_datetime`) should be properly set. 

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                     |
| :-------------------- | :------------------------------------------------------------------------ |
| isJunctionTable       | TRUE                                                                      |
| storeRecordInfo       | TRUE                                                                      |
| sqlName               | whs_stockrooms_item_prices                                                 |
| urlBase               | warehouse/stockrooms/item/{id_whs_stockrooms_item}/prices                   |
| tableTitle            | Item Prices                                                               |
| formTitleForInserting | New Item Price                                                            |
| formTitleForEditing   | Item Price                                                                |
| crud/browse/action    | Warehouse/Stockrooms/ItemPrices                                            |
| crud/add/action       | Warehouse/Stockrooms/ItemPrice/Add                                         |
| crud/edit/action      | Warehouse/Stockrooms/ItemPrice/Edit                                        |
| junctions             | `json`                                                                    |
|                       | `{`                                                                       |
|                       | `  "ContactCategory": {`                                                  |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Stockrooms/Models/Item",`     |
|                       | `    "optionsModel": "App/Widgets/Warehouse/Stockrooms/Models/ItemPrice",` |
|                       | `    "masterKeyColumn": "id_whs_stockrooms_item",`                         |
|                       | `    "optionKeyColumn": "id",`                                            |
|                       | `  }`                                                                     |
|                       | `}`                                                                       |

## Data Structure

| Column                | Title              | ADIOS Type | Length | Required | Notes                      |
| :-------------------- | ------------------ | :--------: | :----: | :------: | :------------------------- |
| id                    |                    |    int     |   8    |   TRUE   | Unique record ID           |
| id_whs_stockrooms_item | Stockrooms Item     |   lookup   |   8    |   TRUE   |                            |
| sell_price            | Sell Price         |  decimal   |   8    |   TRUE   |                            |
| valid_from_datetime   | Valid From         |  datetime  |        |   TRUE   |                            |
| valid_to_datetime     | Valid Till         |  datetime  |        |  FALSE   |                            |

TODO: Prices base on price levels (e.g. customers in levels), packages

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                | Model                                                                                                  | Relation | OnUpdate | OnDelete |
| :-------------------- | :----------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_stockrooms_item | [App/Widgets/Warehouse/Stockrooms/Models/Item](./Item.md)                                               |   1:N    | Cascade  | Restrict |
| id_com_contact        | [App/Widgets/Common/AddressBook/Models/Contact](../../../Common/AddressBook/Models/Contact.md/Unit.md) |   1:N    | Cascade  | Cascade  |

### Indexes

| Name                  |  Type   |            Column + Order |
| :-------------------- | :-----: | ------------------------: |
| id                    | PRIMARY |                    id ASC |
| id_whs_stockrooms_item |  INDEX  | id_whs_stockrooms_item ASC |
| valid_from_datetime   |  INDEX  |  valid_from_datetime DESC |
| valid_to_datetime     |  INDEX  |    valid_to_datetime DESC |
| id_com_contact        |  INDEX  |        id_com_contact ASC |

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
