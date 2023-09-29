# Model Warehouse/Stockrooms/ClaimItem

## Introduction

Junction model between stockrooms item and claim item.

## Constants

No constants are defined for this model.

## Properties
| Property              | Value                                                                       |
| :-------------------- | :-------------------------------------------------------------------------- |
| isJunctionTable       | TRUE                                                                        |
| storeRecordInfo       | FALSE                                                                       |
| sqlName               | whs_claim_items                                                             |
| urlBase               | warehouse/stockrooms/item/{id_whs_item}/claim-items                         |
| tableTitle            | Claim Items                                                                 |
| formTitleForInserting | New Claim Item                                                              |
| formTitleForEditing   | Claim Item                                                                  |
| crud/browse/action    | Warehouse/Stockrooms/ClaimItem                                              |
| crud/add/action       | Warehouse/Stockrooms/ClaimItem/Add                                          |
| crud/edit/action      | Warehouse/Stockrooms/ClaimItem/Edit                                         |
| junctions             | `json`                                                                      |
|                       | `{`                                                                         |
|                       | `  "ClaimItem": {`                                                          |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Stockrooms/Models/ClaimItem",` |
|                       | `    "optionsModel": "App/Bookkeeping/Claims/Models/Item",`                 |
|                       | `    "masterKeyColumn": "id_whs_item",`                                     |
|                       | `    "optionKeyColumn": "id_bkp_claims_item",`                              |
|                       | `  }`                                                                       |
|                       | `}`                                                                         |

## Data Structure

| Column             | Title          | ADIOS Type | Length | Required | Notes            |
| :----------------- | -------------- | :--------: | :----: | :------: | :--------------- |
| id                 |                |    int     |   8    |   TRUE   | Unique record ID |
| id_whs_item        | Stockroom Item |   lookup   |   8    |   TRUE   |                  |
| id_bkp_claims_item | Claim Item     |   lookup   |   8    |   TRUE   |                  |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column             | Model                                                                                    | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_item        | [App/Widgets/Warehouse/Stockrooms/Models/Item](./Item.md)                                |   1:N    | Cascade  | Restrict |
| id_bkp_claims_item | [App/Widgets/Bookkeeping/Claims/Models/Item](../../../Bookkeeping/Claims/Models/Item.md) |   1:N    | Cascade  | Cascade  |


### Indexes

| Name               |  Type   |         Column + Order |
| :----------------- | :-----: | ---------------------: |
| id                 | PRIMARY |                 id ASC |
| id_whs_item        |  INDEX  |        id_whs_item ASC |
| id_bkp_claims_item |  INDEX  | id_bkp_claims_item ASC |

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
