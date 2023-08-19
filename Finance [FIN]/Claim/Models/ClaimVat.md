# ClaimVat

## Introduction

Tabuľka bude slúžiť na ukladanie DPH k pohľadávke.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property       | Value                             |
| -------------- | --------------------------------- |
| sqlName        | fin_claim_vats                    |
| urlBase        | finance/claim/{id_fin_claim}/vats |
| lookupSqlValue | {%TABLE%}.name                    |
| tableTitle     | VATs                              |

## SQL Structure

| Column         | Description          |  Type   | Length |   NULL   | Default |
| :------------- | :------------------- | :-----: | :----: | :------: | ------- |
| id             | Jedinečné ID záznamu |   INT   |   8    | NOT NULL |         |
| id_fin_claim   | ID pohľadávky        |   INT   |   8    | NOT NULL |         |
| id_fin_vat     | ID sadzby DPH        |   INT   |   8    | NOT NULL |         |
| price_excl_vat | Suma bez DPH         | DECIMAL |  15,2  | NOT NULL |         |
| price_vat      | Suma DPH             | DECIMAL |  15,2  | NOT NULL |         |
| price_incl_vat | Suma s DPH           | DECIMAL |  15,2  | NOT NULL |         |

## Columns

* id_fin_claim:
    * required: true
    * type: lookup
    * title: Claim
    * model: Widgets/Finance/Claim/Models/Claim
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* id_fin_vat:
    * required: true
    * type: lookup
    * title: VAT Rate
    * model: Widgets/Finance/MainBook/Models/Vat
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* price_excl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price Excl VAT
    * showColumn: true
* price_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price VAT
    * showColumn: true
* price_incl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price Incl VAT
    * showColumn: true

## Foreign Keys

| Column       | Parent table | Relation | OnUpdate | OnDelete |
| :----------- | :----------- | :------: | :------: | :------: |
| id_fin_claim | fin_claims   | 1:N      | Cascade  | Cascade  |
| id_fin_vat   | fin_vats     | 1:N      | Cascade  | Restrict |

## Indexes

| Name                    | Type    | Column + Order                   |
| :---------------------- | :-----: | :------------------------------- |
| id                      | PRIMARY | id                               |
| id_fin_claim_id_fin_vat | UNIQUE  | id_fin_claim ASC, id_fin_vat ASC |

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
