# Model Bookkeeping/Claim/ClaimDelivery

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávky s konkrétnou dopravou.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                       |
| :-------------------- | :------------------------------------------ |
| storeRecordInfo       | TRUE                                        |
| sqlName               | bkp_claim_deliveries                        |
| urlBase               | bookkeeping/claim/{id_bkp_claim}/deliveries |
| lookupSqlValue        | {%TABLE%}.name                              |
| tableTitle            | Claim Deliveries                            |
| formTitleForInserting | New Claim Delivery                          |
| formTitleForEditing   | Claim Delivery                              |
| crud/browse/action    | Bookkeeping/Claim/ClaimDeliveries           |
| crud/add/action       | Bookkeeping/Claim/ClaimDelivery/Add         |
| crud/edit/action      | Bookkeeping/Claim/ClaimDelivery/Edit        |

## Data Structure

| Column          | Title          | ADIOS Type | Length | Required | Notes                                |
| :-------------- | -------------- | :--------: | :----: | :------: | :----------------------------------- |
| id              |                |    int     |   8    |   TRUE   | Jedinečné ID záznamu                 |
| record_info     | Record Info    |    json    |        |   TRUE   |                                      |
| id_bkp_claim    | Claim          |   lookup   |   8    |   TRUE   | ID pohľadávky                        |
| id_log_delivery | Delivery       |   lookup   |   8    |   TRUE   | ID dopravy                           |
| delivery_price  | Delivery Price |  decimal   |  15,2  |   TRUE   | Cena za dopravu                      |
| cash_fee        | Cash Fee       |  decimal   |  15,2  |  FALSE   | Poplatok za manipulaciu s hotovostou |

REVIEW DD: preco id_log_delivery a nie iba id_delivery?

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column          | Model                                          | Relation | OnUpdate | OnDelete |
| :-------------- | :--------------------------------------------- | :------: | -------- | -------- |
| id_bkp_claim    | App/Widgets/Bookkeeping/Claim/Models/Claim         |   1:N    | Cascade  | Cascade  |
| id_log_delivery | App/Widgets/Logistics/Delivery/Models/Delivery |   1:N    | Cascade  | Restrict |

### Indexes

| Name            |  Type   |      Column + Order |
| :-------------- | :-----: | ------------------: |
| id              | PRIMARY |              id ASC |
| id_bkp_claim    |  INDEX  |    id_bkp_claim ASC |
| id_log_delivery |  INDEX  | id_log_delivery ASC |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Nutné aktualizovať celkovú cenu pohľadávky - tab: **bkp_claims**, col: **price_total**.

### onBeforeUpdate

Not used.

### onAfterUpdate

Nutné aktualizovať celkovú cenu pohľadávky - tab: **bkp_claims**, col: **price_total**.

### onBeforeDelete

Not used.

### onAfterDelete

Nutné aktualizovať celkovú cenu pohľadávky - tab: **bkp_claims**, col: **price_total**.

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
