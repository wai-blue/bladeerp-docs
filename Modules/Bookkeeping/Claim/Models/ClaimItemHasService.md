# Model Bookkeeping/Claim/ClaimItemHasService

REVIEW DD: Tato tabulka by mala byt v module, ktory bude spravovat Sluzby.

## Introduction

Tabuľka bude slúžiť na prepojenie položiek pohľadávok so službami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                             |
| :-------------------- | :---------------------------------------------------------------- |
| storeRecordInfo       | FALSE                                                             |
| sqlName               | bkp_claim_item_has_services                                       |
| urlBase               | bookkeeping/claim/{id_bkp_claim}/item/{id_bkp_claim_item}/service |
| lookupSqlValue        | {%TABLE%}.name                                                    |
| tableTitle            | Claim Item Services                                               |
| formTitleForInserting | New Claim Item Service                                            |
| formTitleForEditing   | Claim Item Service                                                |
| isCrossTable          | TRUE                                                              |

## Data Structure

| Column            | Title         | ADIOS Type | Length | Required | Notes                 |
| :---------------- | ------------- | :--------: | :----: | :------: | :-------------------- |
| id_bkp_claim_item | ID Claim Item |   lookup   |   8    |   TRUE   | ID položky pohľadávky |
| id_ser_service    | Service       |   lookup   |   8    |   TRUE   | ID produktu           |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column            | Model                                          | Relation | OnUpdate | OnDelete |
| :---------------- | :--------------------------------------------- | :------: | -------- | -------- |
| id_bkp_claim_item | App/Widgets/Bookkeeping/Claim/Models/ClaimItem |   1:N    | Cascade  | Cascade  |
| id_ser_service    | App/Widgets/Warehouse/Products/Models/Service  |   1:N    | Cascade  | Restrict |

### Indexes

| Name              | Type    |        Column + Order |
| :---------------- | :------ | --------------------: |
| id_bkp_claim_item | INDEX   | id_bkp_claim_item ASC |
| id_ser_service    | INDEX   |    id_ser_service ASC |

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

V tomto modeli nie sú použité formátery.

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
