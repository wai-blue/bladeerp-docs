# Model Warehouse/Inventory/ClaimItem

## Introduction

Junction model between inventory item and claim item.

## Constants

No constants are defined for this model.

## Properties
| Property              | Value                                                              |
| :-------------------- | :----------------------------------------------------------------- |
| isJunctionTable       | TRUE                                                               |
| storeRecordInfo       | FALSE                                                              |
| sqlName               | whs_claim_items                                                    |
| urlBase               | warehouse/inventory/item/{id_whs_inventory_item}/claim-items       |
| lookupSqlValue        | -                                                                  |
| tableTitle            | Claim Items                                                        |
| formTitleForInserting | New Claim Item                                                     |
| formTitleForEditing   | Claim Item                                                         |
| crud/browse/action    | Warehouse/Inventory/ClaimItem                                      |
| crud/add/action       | Warehouse/Inventory/ClaimItem/Add                                  |
| crud/edit/action      | Warehouse/Inventory/ClaimItem/Edit                                 |
| junctions             | `json`                                                             |
|                       | `{`                                                                |
|                       | `  "ClaimItem": {`                                                 |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Inventory/Models/ClaimItem",` |
|                       | `    "optionsModel": "App/Bookkeeping/Claims/Models/Item",`        |
|                       | `    "masterKeyColumn": "id_whs_inventory_item",`                  |
|                       | `    "optionKeyColumn": "id_bkp_claim_item",`                      |
|                       | `  }`                                                              |
|                       | `}`                                                                |

## Data Structure

| Column                | Title          | ADIOS Type | Length | Required | Notes            |
| :-------------------- | -------------- | :--------: | :----: | :------: | :--------------- |
| id                    |                |    int     |   8    |   TRUE   | Unique record ID |
| id_whs_inventory_item | Inventory Item |   lookup   |   8    |   TRUE   |                  |
| id_bkp_claim_item     | Claim Item     |   lookup   |   8    |   TRUE   |                  |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                | Model                                                                                    | Relation | OnUpdate | OnDelete |
| :-------------------- | :--------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_inventory_item | [App/Widgets/Warehouse/Inventory/Models/Item](./Item.md)                                 |   1:N    | Cascade  | Restrict |
| id_bkp_claim_item     | [App/Widgets/Bookkeeping/Claims/Models/Item](../../../Bookkeeping/Claims/Models/Item.md) |   1:N    | Cascade  | Cascade  |


### Indexes

| Name                  |  Type   |            Column + Order |
| :-------------------- | :-----: | ------------------------: |
| id                    | PRIMARY |                    id ASC |
| id_whs_inventory_item |  INDEX  | id_whs_inventory_item ASC |
| id_bkp_claim_item     |  INDEX  |     id_bkp_claim_item ASC |

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
