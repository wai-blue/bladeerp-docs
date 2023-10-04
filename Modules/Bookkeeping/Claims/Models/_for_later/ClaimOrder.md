# Model Bookkeeping/Claims/ClaimOrder

REVIEW DD: Tato tabulka by mala byt v module, ktory bude spravovat Objednavky.

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávok s objednávkami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                    |
| :-------------------- | :--------------------------------------- |
| isJunctionTable       | TRUE                                     |
| storeRecordInfo       | FALSE                                    |
| sqlName               | bkp_claim_orders                         |
| urlBase               | bookkeeping/claims/{id_bkp_claim}/orders |
| lookupSqlValue        | {%TABLE%}.name                           |
| tableTitle            | Claim Orders                             |
| formTitleForInserting | New Claim Order                          |
| formTitleForEditing   | Claim Order                              |

## Data Structure

| Column       | Title | ADIOS Type | Length | Required | Notes            |
| :----------- | ----- | :--------: | :----: | :------: | :--------------- |
| id           |       |    int     |   8    |   TRUE   | Unique record ID |
| id_bkp_claim | Claim |   lookup   |   8    |   TRUE   | ID pohľadávky    |
| id_crm_order | Order |   lookup   |   8    |   TRUE   | ID objednávky    |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column       | Model                                       | Relation | OnUpdate | OnDelete |
| :----------- | :------------------------------------------ | :------: | -------- | -------- |
| id_bkp_claim | App/Widgets/Bookkeeping/Claims/Models/Claim |   1:N    | Cascade  | Cascade  |
| id_crm_order | App/Widgets/Warehouse/Order/Models/Order    |   1:N    | Cascade  | Restrict |

### Indexes

| Name         | Type    |        Column + Order |
| :----------- | :------ | --------------------: |
| id           | PRIMARY |                id ASC |
| id_bkp_claim | INDEX   | id_bkp_claim_item ASC |
| id_crm_order | INDEX   |    id_ser_service ASC |

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
