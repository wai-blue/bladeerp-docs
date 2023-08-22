# Model Finance/Claim/ClaimVat

## Introduction

Tabuľka bude slúžiť na ukladanie DPH k pohľadávke.

## Constants

No constants are defined for this model.

## Properties

| Property       | Value                             |
| -------------- | --------------------------------- |
| sqlName        | fin_claim_vats                    |
| urlBase        | finance/claim/{id_fin_claim}/vats |
| lookupSqlValue | {%TABLE%}.name                    |
| tableTitle     | VATs                              |

## Data Structure

| Column         | Title          | ADIOS Type | Length | Required | Notes                |
| :------------- | -------------- | :--------: | :----: | :------: | :------------------- |
| id             |                |    int     |   8    |   TRUE   | Jedinečné ID záznamu |
| id_fin_claim   | Claim          |   lookup   |   8    |   TRUE   | ID pohľadávky        |
| id_fin_vat     | VAT Rate       |   lookup   |   8    |   TRUE   | ID sadzby DPH        |
| price_excl_vat | Price Excl VAT |  decimal   |  15,2  |   TRUE   | Suma bez DPH         |
| price_vat      | Price VAT      |  decimal   |  15,2  |   TRUE   | Suma DPH             |
| price_incl_vat | Price Incl VAT |  decimal   |  15,2  |   TRUE   | Suma s DPH           |

### ADIOS Parameters

| Column         | Parameter | Value |
| :------------- | :-------- | ----- |
| price_excl_vat | unit      | €     |
| price_vat      | unit      | €     |
| price_incl_vat | unit      | €     |

### Foreign Keys

| Column       | Model                                   | Relation | OnUpdate | OnDelete |
| :----------- | :-------------------------------------- | :------: | -------- | -------- |
| id_fin_claim | App/Widgets/Finance/Claim/Models/Claim  |   1:N    | Cascade  | Cascade  |
| id_fin_vat   | App/Widgets/Finance/MainBook/Models/Vat |   1:N    | Cascade  | Restrict |

### Indexes

| Name                      |  Type   | Column + Order   |
| :------------------------ | :-----: | :--------------- |
| id                        | PRIMARY | id               |
| id_fin_claim              |  INDEX  | id_fin_claim ASC |
| id_fin_vat                |  INDEX  | id_fin_claim ASC |
| id_fin_claim___id_fin_vat | UNIQUE  | id_fin_claim ASC |
|                           | UNIQUE  | id_fin_vat ASC   |

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
