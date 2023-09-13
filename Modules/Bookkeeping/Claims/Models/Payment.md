# Model Bookkeeping/Payment

## Introduction

Tabuľka bude slúžiť na evidenciu úhrad pohľadávok.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                      |
| :-------------------- | :----------------------------------------- |
| isJunctionTable       | FALSE                                      |
| storeRecordInfo       | TRUE                                       |
| sqlName               | bkp_claim_payments                         |
| urlBase               | bookkeeping/claims/{id_bkp_claim}/payments |
| lookupSqlValue        | {%TABLE%}.name                             |
| tableTitle            | Payments                                   |
| formTitleForInserting | New Payment                                |
| formTitleForEditing   | Payment                                    |
| crud/browse/action    | Bookkeeping/Claims/Payments                |
| crud/add/action       | Bookkeeping/Claims/Payment/AddOrEdit       |
| crud/edit/action      | Bookkeeping/Claims/Payment/AddOrEdit       |

## Data Structure

| Column         | Title          | ADIOS Type | Length | Required | Notes            |
| :------------- | -------------- | :--------: | :----: | :------: | :--------------- |
| id             |                |    int     |   8    |   TRUE   | Unique record ID |
| record_info    | Record Info    |    json    |        |   TRUE   |                  |
| id_bkp_claim   | Claim          |   lookup   |   8    |   TRUE   | ID pohľadávky    |
| payment_date   | Payment Date   |    date    |   8    |   TRUE   | Dátum úhrady     |
| payment_amount | Payment Amount |  decimal   |  15,2  |   TRUE   | Uhradená suma    |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column       | Model                                       | Relation | OnUpdate | OnDelete |
| :----------- | :------------------------------------------ | :------: | -------- | -------- |
| id_bkp_claim | App/Widgets/Bookkeeping/Claims/Models/Claim |   1:N    | Cascade  | Restrict |

### Indexes

| Name         | Type    |        Column + Order |
| :----------- | :------ | --------------------: |
| id           | PRIMARY |                id ASC |
| id_bkp_claim | INDEX   | id_bkp_claim_item ASC |
| payment_date | INDEX   |      payment_date ASC |

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
