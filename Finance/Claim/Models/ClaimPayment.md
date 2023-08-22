# Model Finance/Claim/ClaimPayment

## Introduction

Tabuľka bude slúžiť na evidenciu úhrad pohľadávok.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                 |
| :-------------------- | :------------------------------------ |
| sqlName               | fin_claim_payments                    |
| urlBase               | finance/claim/{id_fin_claim}/payments |
| lookupSqlValue        | {%TABLE%}.name                        |
| tableTitle            | Payments                              |
| formTitleForInserting | New Payment                           |
| formTitleForEditing   | Payment                               |

## Data Structure

| Column       | Title         | ADIOS Type | Length | Required | Notes                |
| :----------- | ------------- | :--------: | :----: | :------: | :------------------- |
| id           |               |    int     |   8    |   TRUE   | Jedinečné ID záznamu |
| id_fin_claim | Claim         |   lookup   |   8    |   TRUE   | ID pohľadávky        |
| date         | Payment Date  |    date    |   8    |   TRUE   | Dátum úhrady         |
| price        | Payment Price |  decimal   |  15,2  |   TRUE   | Uhradená suma        |

REVIEW DD: Namiesto price navrhujem `amount` (Payment Amount)

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column       | Model                                  | Relation | OnUpdate | OnDelete |
| :----------- | :------------------------------------- | :------: | -------- | -------- |
| id_fin_claim | App/Widgets/Finance/Claim/Models/Claim |   1:N    | Cascade  | Restrict |

### Indexes

| Name         | Type    |        Column + Order |
| :----------- | :------ | --------------------: |
| id           | PRIMARY |                id ASC |
| id_fin_claim | INDEX   | id_fin_claim_item ASC |


## Callbacks

### onBeforeInsert

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu pohľadávky.

### onAfterInsert

Not used.

### onBeforeUpdate

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu pohľadávky.

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
