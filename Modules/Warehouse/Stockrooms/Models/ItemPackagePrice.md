# Model Warehouse/Stockrooms/ItemPackagePrice

## Introduction

Prices of stockrooms items for certain package.
**Rules:**
* Current price of the item's package is the one which is valid TODAY (e.g. `valid_from_datetime < now() AND valid_to_datetime==NULL`).
* When new price entered the previous one should NOT be deleted but only its end validity (`valid_to_datetime`) should be properly set. 

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                         |
| :-------------------- | :---------------------------------------------------------------------------- |
| isJunctionTable       | TRUE                                                                          |
| storeRecordInfo       | TRUE                                                                          |
| sqlName               | whs_item_package_prices                                                       |
| urlBase               | warehouse/stockrooms/item/{id_whs_item}/prices                                |
| tableTitle            | Item Package Prices                                                           |
| formTitleForInserting | New Item Package Price                                                        |
| formTitleForEditing   | Item Package Price                                                            |
| crud/browse/action    | Warehouse/Stockrooms/ItemPackagePrices                                        |
| crud/add/action       | Warehouse/Stockrooms/ItemPackagePrice/Add                                     |
| crud/edit/action      | Warehouse/Stockrooms/ItemPackagePrice/Edit                                    |
| junctions             | `json`                                                                        |
|                       | `{`                                                                           |
|                       | `  "ItemPackagePrice": {`                                                     |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Stockrooms/Models/ItemPackage",` |
|                       | `    "optionsModel": "App/Widgets/Warehouse/Stockrooms/Models/Item",`         |
|                       | `    "masterKeyColumn": "id_whs_item_package",`                               |
|                       | `    "optionKeyColumn": "id",`                                                |
|                       | `  }`                                                                         |
|                       | `}`                                                                           |

## Data Structure

| Column              | Title           | ADIOS Type | Length | Required | Notes            |
| :------------------ | --------------- | :--------: | :----: | :------: | :--------------- |
| id                  |                 |    int     |   8    |   TRUE   | Unique record ID |
| id_whs_item         | Stockrooms Item |   lookup   |   8    |   TRUE   |                  |
| id_whs_item_package | Item Package    |   lookup   |   8    |   TRUE   |                  |
| sell_price          | Sell Price      |  decimal   |   8    |   TRUE   |                  |
| valid_from_datetime | Valid From      |  datetime  |        |   TRUE   |                  |
| valid_to_datetime   | Valid Till      |  datetime  |        |  FALSE   |                  |

TODO: Prices base on price levels (e.g. customers in levels), packages

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                                                   | Relation | OnUpdate | OnDelete |
| :------------------ | :---------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_item         | [App/Widgets/Warehouse/Stockrooms/Models/Item](./Item.md)               |   1:N    | Cascade  | Restrict |
| id_whs_item_package | [App/Widgets/Warehouse/Stockrooms/Models/ItemPackage](./ItemPackage.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |           Column + Order |
| :------------------ | :-----: | -----------------------: |
| id                  | PRIMARY |                   id ASC |
| id_whs_item         |  INDEX  |          id_whs_item ASC |
| id_whs_item_package |  INDEX  |  id_whs_item_package ASC |
| valid_from_datetime |  INDEX  | valid_from_datetime DESC |
| valid_to_datetime   |  INDEX  |   valid_to_datetime DESC |
| id_com_contact      |  INDEX  |       id_com_contact ASC |

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
