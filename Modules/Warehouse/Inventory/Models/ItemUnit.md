# Model Warehouse/Inventory/ItemUnit

## Introduction

List of available units for given inventory item

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                 |
| :-------------------- | :-------------------------------------------------------------------- |
| isJunctionTable       | TRUE                                                                  |
| storeRecordInfo       | FALSE                                                                 |
| sqlName               | whs_inventory_item_units                                              |
| urlBase               | warehouse/inventory/item/{id_whs_inventory_item}/units                |
| lookupSqlValue        | -                                                                     |
| tableTitle            | Item Units                                                            |
| formTitleForInserting | New Item Unit                                                         |
| formTitleForEditing   | Item Unit                                                             |
| crud/browse/action    | Warehouse/Inventory/ItemUnits                                         |
| crud/add/action       | Warehouse/Inventory/ItemUnit/Add                                      |
| crud/edit/action      | Warehouse/Inventory/ItemUnit/Edit                                     |
| junctions             | `json`                                                                |
|                       | `{`                                                                   |
|                       | `  "ContactCategory": {`                                              |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Inventory/Models/Item",` |
|                       | `    "optionsModel": "App/Widgets/Warehouse/Inventory/Models/Unit",`  |
|                       | `    "masterKeyColumn": "id_whs_inventory_item",`                     |
|                       | `    "optionKeyColumn": "id_whs_unit",`                               |
|                       | `  }`                                                                 |
|                       | `}`                                                                   |

## Data Structure

| Column                   | Title                      | ADIOS Type | Length | Required | Notes            |
| :----------------------- | -------------------------- | :--------: | :----: | :------: | :--------------- |
| id                       |                            |    int     |   8    |   TRUE   | Unique record ID |
| id_whs_inventory_item    | Inventory Item             |   lookup   |   8    |   TRUE   |                  |
| id_whs_unit              | Claim Item                 |   lookup   |   8    |   TRUE   |                  |


### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                | Model                                                    | Relation | OnUpdate | OnDelete |
| :-------------------- | :------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_inventory_item | [App/Widgets/Warehouse/Inventory/Models/Item](./Item.md) |   1:N    | Cascade  | Restrict |
| id_whs_unit           | [App/Widgets/Warehouse/Inventory/Models/Unit](./Unit.md) |   1:N    | Cascade  | Cascade  |

### Indexes

| Name                  |  Type   |            Column + Order |
| :-------------------- | :-----: | ------------------------: |
| id                    | PRIMARY |                    id ASC |
| id_whs_inventory_item |  INDEX  | id_whs_inventory_item ASC |
| id_whs_unit           |  INDEX  |           id_whs_unit ASC |

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
