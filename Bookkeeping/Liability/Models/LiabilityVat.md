# LiabilityVat

## Introduction

Tabuľka bude slúžiť na ukladanie hodnôt pre jednotlivé úrovne DPH k záväzkom.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property       | Value                                     |
| :------------- | :---------------------------------------- |
| sqlName        | bkp_liability_vats                        |
| urlBase        | bookkeeping/liability/{id_bkp_liability}/vats |
| lookupSqlValue | {%TABLE%}.name                            |
| tableTitle     | VATs                                      |

## SQL Structure

| Column           | Description          | Type    | Length | NULL     | Default |
| :--------------- | :------------------- | :-----: | :----: | :------: | :------ |
| id               | Jedinečné ID záznamu | INT     | 8      | NOT NULL |         |
| id_bkp_liability | ID záväzku           | INT     | 8      | NOT NULL |         |
| id_bkp_vat       | ID sadzby DPH        | INT     | 8      | NOT NULL |         |
| price_excl_vat   | Suma bez DPH         | DECIMAL | 15,2   | NOT NULL |         |
| price_vat        | Suma DPH             | DECIMAL | 15,2   | NOT NULL |         |
| price_incl_vat   | Suma s DPH           | DECIMAL | 15,2   | NOT NULL |         |

## Columns

* id_bkp_liability:
    * required: true
    * type: lookup
    * title: Liability
    * model: App/Widgets/Bookkeeping/Liability/Models/Liability
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* id_bkp_vat:
    * required: true
    * type: lookup
    * title: VAT Rate
    * model: App/Widgets/Bookkeeping/MainBook/Models/Vat
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
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

| Column | Parent table | Relation | OnUpdate | OnDelete |
| :--------------- | :-------------- | :-- | :------ | :------- |
| id_bkp_liability | bkp_liabilities | 1:N | Cascade | Cascade  |
| id_bkp_vat       | bkp_vats        | 1:N | Cascade | Restrict |

## Indexes

| Name                        | Type    | Column + Order                       |
| :-------------------------- | :------ | :----------------------------------- |
| id                          | PRIMARY | id ASC                               |
| id_bkp_liability_id_bkp_vat | UNIQUE  | id_bkp_liability ASC, id_bkp_vat ASC |

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
