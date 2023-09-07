# Model Bookkeeping/Claim/ClaimItemHasProduct

## Introduction

Tabuľka bude slúžiť na prepojenie položiek pohľadávok s produktami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                             |
| :-------------------- | :---------------------------------------------------------------- |
| sqlName               | bkp_claim_item_has_products                                       |
| urlBase               | bookkeeping/claim/{id_bkp_claim}/item/{id_bkp_claim_item}/product |
| lookupSqlValue        | {%TABLE%}.name                                                    |
| tableTitle            | Claim Item Products                                               |
| formTitleForInserting | New Claim Item Product                                            |
| formTitleForEditing   | Claim Item Product                                                |
| isCrossTable          | TRUE                                                              |

## Data Structure

| Column            | Title         | ADIOS Type | Length | Required | Notes                 |
| :---------------- | ------------- | :--------: | :----: | :------: | :-------------------- |
| record_info       | Record Info   |    json    |        |   TRUE   |                       |
| id_bkp_claim_item | ID Claim Item |   lookup   |   8    |   TRUE   | ID položky pohľadávky |
| id_whs_product    | Product       |   lookup   |   8    |   TRUE   | ID produktu           |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column            | Model                                          | Relation | OnUpdate | OnDelete |
| :---------------- | :--------------------------------------------- | :------: | -------- | -------- |
| id_bkp_claim_item | App/Widgets/Bookkeeping/Claim/Models/ClaimItem |   1:N    | Cascade  | Cascade  |
| id_whs_product    | App/Widgets/Warehouse/Products/Models/Product  |   1:N    | Cascade  | Restrict |

### Indexes

| Name              | Type    |        Column + Order |
| :---------------- | :------ | --------------------: |
| id_bkp_claim_item | INDEX   | id_bkp_claim_item ASC |
| id_whs_product    | INDEX   |    id_whs_product ASC |

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
