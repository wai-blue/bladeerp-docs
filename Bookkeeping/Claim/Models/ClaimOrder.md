# Model Bookkeeping/Claim/ClaimOrder

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávok s objednávkami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                               |
| :-------------------- | :---------------------------------- |
| sqlName               | bkp_claim_orders                    |
| urlBase               | bookkeeping/claim/{id_bkp_claim}/orders |
| lookupSqlValue        | {%TABLE%}.name                      |
| tableTitle            | Claim Orders                        |
| formTitleForInserting | New Claim Order                     |
| formTitleForEditing   | Claim Order                         |
| isCrossTable          | TRUE                                                          |

REVIEW DD: Pridal som property isCrossTable = TRUE

## Data Structure

| Column       | Title | ADIOS Type | Length | Required | Notes         |
| :----------- | ----- | :--------: | :----: | :------: | :------------ |
| id_bkp_claim | Claim |   lookup   |   8    |   TRUE   | ID pohľadávky |
| id_crm_order | Order |   lookup   |   8    |   TRUE   | ID objednávky |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column       | Model                                    | Relation | OnUpdate | OnDelete |
| :----------- | :--------------------------------------- | :------: | -------- | -------- |
| id_bkp_claim | App/Widgets/Bookkeeping/Claim/Models/Claim   |   1:N    | Cascade  | Cascade  |
| id_crm_order | App/Widgets/Warehouse/Order/Models/Order |   1:N    | Cascade  | Restrict |

### Indexes

| Name         | Type  |        Column + Order |
| :----------- | :---- | --------------------: |
| id_bkp_claim | INDEX | id_bkp_claim_item ASC |
| id_crm_order | INDEX |    id_ser_service ASC |

## Callbacks

V tomto modeli nie sú použité formátery.

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