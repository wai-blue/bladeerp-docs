# Model Warehouse/Inventory/ItemPrice

## Introduction

Prices of inventory items.
**Rules:**
* Current price of the item is the one which is valid TODAY (e.g. `valid_from_datetime < now() AND valid_to_datetime==NULL AND id_com_contact==NULL`).
* There can exist additional current price(s) but only for given customer(s). (`id_com_contact!=NULL`) 
* When new price entered the previous one should NOT be deleted but only its end validity (`valid_to_datetime`) should be properly set. 

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                     |
| :-------------------- | :------------------------------------------------------------------------ |
| isJunctionTable       | TRUE                                                                      |
| storeRecordInfo       | TRUE                                                                      |
| sqlName               | whs_inventory_item_prices                                                 |
| urlBase               | warehouse/inventory/item/{id_whs_inventory_item}/prices                   |
| lookupSqlValue        | -                                                                         |
| tableTitle            | Item Prices                                                               |
| formTitleForInserting | New Item Price                                                            |
| formTitleForEditing   | Item Price                                                                |
| crud/browse/action    | Warehouse/Inventory/ItemPrices                                            |
| crud/add/action       | Warehouse/Inventory/ItemPrice/Add                                         |
| crud/edit/action      | Warehouse/Inventory/ItemPrice/Edit                                        |
| junctions             | `json`                                                                    |
|                       | `{`                                                                       |
|                       | `  "ContactCategory": {`                                                  |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Inventory/Models/Item",`     |
|                       | `    "optionsModel": "App/Widgets/Warehouse/Inventory/Models/ItemPrice",` |
|                       | `    "masterKeyColumn": "id_whs_inventory_item",`                         |
|                       | `    "optionKeyColumn": "id",`                                            |
|                       | `  }`                                                                     |
|                       | `}`                                                                       |

## Data Structure

| Column                | Title              | ADIOS Type | Length | Required | Notes                      |
| :-------------------- | ------------------ | :--------: | :----: | :------: | :------------------------- |
| id                    |                    |    int     |   8    |   TRUE   | Unique record ID           |
| id_whs_inventory_item | Inventory Item     |   lookup   |   8    |   TRUE   |                            |
| sell_price            | Sell Price         |  decimal   |   8    |   TRUE   |                            |
| valid_from_datetime   | Valid From         |  datetime  |        |   TRUE   |                            |
| valid_to_datetime     | Valid Till         |  datetime  |        |  FALSE   |                            |
| id_com_contact        | Price For Customer |   lookup   |        |  FALSE   | Special price for customer |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                | Model                                                                                                  | Relation | OnUpdate | OnDelete |
| :-------------------- | :----------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_inventory_item | [App/Widgets/Warehouse/Inventory/Models/Item](./Item.md)                                               |   1:N    | Cascade  | Restrict |
| id_com_contact        | [App/Widgets/Common/AddressBook/Models/Contact](../../../Common/AddressBook/Models/Contact.md/Unit.md) |   1:N    | Cascade  | Cascade  |

### Indexes

| Name                  |  Type   |            Column + Order |
| :-------------------- | :-----: | ------------------------: |
| id                    | PRIMARY |                    id ASC |
| id_whs_inventory_item |  INDEX  | id_whs_inventory_item ASC |
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
