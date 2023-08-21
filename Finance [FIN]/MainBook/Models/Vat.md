# Vat

## Introduction

Táto tabuľka slúži na ukladanie informácií o sadzbách DPH používaných v účtovnom období.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                  |
| --------------------- | ---------------------- |
| sqlName               | fin_vats               |
| urlBase               | finance/main-book/vats |
| lookupSqlValue        | -                      |
| tableTitle            | Vats                   |
| formTitleForInserting | New Vat                |
| formTitleForEditing   | Vat                    |

## SQL Structure

| Column                   | Description               | Type    | Length | NULL     | Default |
| :----------------------- | :------------------------ | :-----: | :----: | :------: | :-----: |
| id                       | Unique record ID          | INT     | 8      | NOT NULL | 0       |
| ratio                    | Percento DPH              | DECIMAL | 5,2    | NOT NULL | 0       |
| id_fin_accounting_period | ID účtovného obdobia      | INT     | 8      | NOT NULL | 0       |
| id_fin_book_account      | ID účtu z účtovnej osnovy | INT     | 8      | NOT NULL | 0       |

## Columns

* ratio:
  * type: float
  * title: Ratio
  * byte_size: 5
  * decimals: 2
  * unit: "%"
  * required: true
  * showColumn: true
  * minValue: 0 
  * maxValue: 100
* id_fin_accounting_period:
  * type: lookup
  * title: Accounting Period
  * model: App/Widgets/Finance/MainBook/Models/AccountingPeriod
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE
* id_fin_book_account:
  * type: lookup
  * title: Account
  * model: App/Widgets/Finance/MainBook/Models/BookAccount
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT

## Foreign Keys

| Column                   | Parent table           | Relation | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :------: | :------: | :------: |
| id_fin_accounting_period | fin_accounting_periods | 1:N      | Cascade  | Cascade  |
| id_fin_book_account      | fin_book_accounts      | M:N      | Cascade  | Restrict |

## Indexes

| Name                           | Type    | Column + Order                          |
| :----------------------------- | :-----: | :-------------------------------------- |
| id                             | PRIMARY | id ASC                                  |
| id_fin_accounting_period_ratio | UNIQUE  | id_fin_accounting_period ASC, ratio ASC |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Not used.

### onBeforeUpdate

Ak je na účte v účtovnom období účtované, nie je možné zmeniť sadzbu DPH ani účtovné obdobie.

### onAfterUpdate

Not used.

### onBeforeDelete

Ak je na účte v účtovnom období účtované, nie je možné sadzbu DPH vymazať.

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
