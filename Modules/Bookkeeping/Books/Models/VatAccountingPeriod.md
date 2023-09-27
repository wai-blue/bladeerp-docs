# Model Bookkeeping/Books/VatAccountingPeriod

## Introduction

Táto tabuľka slúži na ukladanie informácií o sadzbách DPH používaných v účtovnom období.

## Constants

### Vat Levels
| Constant                             | Value | Description         |
| :----------------------------------- | :---: | :------------------ |
| BKP_BOOK_ACCOUNT_VAT_LEVEL_ZERO      |   0   | Zero Vat Level      |
| BKP_BOOK_ACCOUNT_VAT_LEVEL_REDUCED   |   1   | Reduced Vat Level   |
| BKP_BOOK_ACCOUNT_VAT_LEVEL_STANDARD  |   2   | Standard Vat Level  |
| BKP_BOOK_ACCOUNT_VAT_LEVEL_SPECIAL_A |   3   | Special Vat Level A |
| BKP_BOOK_ACCOUNT_VAT_LEVEL_SPECIAL_B |   4   | Special Vat Level B |
| BKP_BOOK_ACCOUNT_VAT_LEVEL_SPECIAL_C |   5   | Special Vat Level C |

## Properties

| Property              | Value                      |
| --------------------- | -------------------------- |
| storeRecordInfo       | TRUE                       |
| sqlName               | bkp_vats                   |
| urlBase               | bookkeeping/books/vats     |
| lookupSqlValue        | -                          |
| tableTitle            | Vats                       |
| formTitleForInserting | New Vat                    |
| formTitleForEditing   | Vat                        |
| crud/browse/action    | Bookkeeping/Books/Vats     |
| crud/add/action       | Bookkeeping/Books/Vat/Add  |
| crud/edit/action      | Bookkeeping/Books/Vat/Edit |

## Data Structure

| Column                   | Title             | ADIOS Type | Length | Required | Notes                                      |
| :----------------------- | ----------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                       |                   |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info              | Record Info       |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| level                    | VAT Level         |    int     |   2    |   TRUE   | Level of VAT                               |
| ratio                    | VAT ratio         |  decimal   |  5,2   |   TRUE   | How much percent has this VAT              |
| id_bkp_accounting_period | Accounting period |   lookup   |   8    |   TRUE   | ID účtovného obdobia                       |
| id_bkp_book_account      | Book account      |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy                  |

### ADIOS Parameters

| Column | Parameter   | Value                        |
| :----- | :---------- | ---------------------------- |
| level  | enum_values | BKP_BOOK_ACCOUNT_VAT_LEVEL_* |

### Foreign Keys

| Column                   | Model                                                 | Relation | OnUpdate | OnDelete |
| :----------------------- | :---------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_accounting_period | App/Widgets/Bookkeeping/Books/Models/AccountingPeriod |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account      | App/Widgets/Bookkeeping/Books/Models/Account          |   M:N    | Cascade  | Restrict |

### Indexes

| Name                             |  Type   |               Column + Order |
| :------------------------------- | :-----: | ---------------------------: |
| id                               | PRIMARY |                       id ASC |
| level                            |  INDEX  |                    level ASC |
| ratio                            |  INDEX  |                    ratio ASC |
| id_bkp_accounting_period         |  INDEX  | id_bkp_accounting_period ASC |
| id_bkp_book_account              |  INDEX  |      id_bkp_book_account ASC |
| id_bkp_accounting_period___ratio | UNIQUE  | id_bkp_accounting_period ASC |
|                                  | UNIQUE  |                    ratio ASC |

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
