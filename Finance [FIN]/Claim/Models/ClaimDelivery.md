# ClaimDelivery

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávky s konkrétnou dopravou.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                   |
| :-------------------- | :-------------------------------------- |
| sqlName               | fin_claim_deliveries                    |
| urlBase               | finance/claim/{id_fin_claim}/deliveries |
| lookupSqlValue        | {%TABLE%}.name                          |
| tableTitle            | Claim Deliveries                        |
| formTitleForInserting | New Claim Delivery                      |
| formTitleForEditing   | Claim Delivery                          |

## SQL Structure

| Column          | Description          | Type    | Length | NULL     | Default |
| :-------------- | :------------------- | :-----: | :----: | :------: | ------- |
| id_fin_claim    | ID pohľadávky        | INT     | 8      | NOT NULL |         |
| id_log_delivery | ID dopravy           | INT     | 8      | NOT NULL |         |
| price           | Cena za dopravu      | DECIMAL | 15,2   | NOT NULL |         |
| cash_fee        | Poplatok za dobierku | DECIMAL | 15,2   | NULL     |         |

## Columns

* id_fin_claim:
    * required: true
    * type: lookup
    * title: Claim
    * model: Widgets/Finance/Claim/Models/Claim
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* id_log_delivery:
    * required: true
    * type: lookup
    * title: Delivery
    * model: Widgets/Logistics/Delivery/Models/Delivery
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* price:
    * required: true
    * type: float
    * title: Delivery Price
    * byte_size: 15
    * decimals: 2
    * showColumn: true
* cash_fee:
    * required: false
    * type: float
    * title: Cash Fee
    * byte_size: 15
    * decimals: 2
    * showColumn: true

## Foreign Keys

| Column          | Parent table   | Relation | OnUpdate | OnDelete |
| :-------------- | :------------- | :------: | :------: | :------: |
| id_fin_claim    | fin_claims     | 1:N      | Cascade  | Cascade  |
| id_log_delivery | log_deliveries | 1:N      | Cascade  | Restrict |

## Indexes

Tabuľka nemá iné indexy.

| Name | Type    | Column + Order |
| ---- | ------- | -------------- |
| id   | PRIMARY | id ASC         |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Nutné aktualizovať celkovú cenu pohľadávky - tab: **fin_claims**, col: **price_total**.

### onBeforeUpdate

Not used.

### onAfterUpdate

Nutné aktualizovať celkovú cenu pohľadávky - tab: **fin_claims**, col: **price_total**.

### onBeforeDelete

Not used.

### onAfterDelete

Nutné aktualizovať celkovú cenu pohľadávky - tab: **fin_claims**, col: **price_total**.

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
