# Model Finance/Claim/ClaimItemProduct

## Introduction

Tabuľka bude slúžiť na prepojenie položiek pohľadávok s produktami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                         |
| :-------------------- | :------------------------------------------------------------ |
| sqlName               | fin_claim_item_products                                       |
| urlBase               | finance/claim/{id_fin_claim}/item/{id_fin_claim_item}/product |
| lookupSqlValue        | {%TABLE%}.name                                                |
| tableTitle            | Claim Item Products                                           |
| formTitleForInserting | New Claim Item Product                                        |
| formTitleForEditing   | Claim Item Product                                            |
| isCrossTable          | TRUE                                                          |

REVIEW DD: Pridal som property isCrossTable = TRUE

## Data Structure

| Column            | Title         | ADIOS Type | Length | Required | Notes                 |
| :---------------- | ------------- | :--------: | :----: | :------: | :-------------------- |
| id_fin_claim_item | ID Claim Item |   lookup   |   8    |   TRUE   | ID položky pohľadávky |
| id_war_product    | Product       |   lookup   |   8    |   TRUE   | ID produktu           |

REVIEW DD: id_whs_product?

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column            | Model                                         | Relation | OnUpdate | OnDelete |
| :---------------- | :-------------------------------------------- | :------: | -------- | -------- |
| id_fin_claim_item | App/Widgets/Finance/Claim/Models/ClaimItem    |   1:N    | Cascade  | Cascade  |
| id_war_product    | App/Widgets/Warehouse/Products/Models/Product |   1:N    | Cascade  | Restrict |

### Indexes

| Name              | Type    |        Column + Order |
| :---------------- | :------ | --------------------: |
| id_fin_claim_item | INDEX   | id_fin_claim_item ASC |
| id_war_product    | INDEX   |    id_war_product ASC |

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
