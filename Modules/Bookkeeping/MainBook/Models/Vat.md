# Model Bookkeeping/MainBook/Vat

## Introduction

Táto tabuľka slúži na ukladanie informácií o sadzbách DPH používaných v účtovnom období.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                               |
| --------------------- | ----------------------------------- |
| storeRecordInfo       | TRUE                                |
| sqlName               | bkp_vats                            |
| urlBase               | bookkeeping/main-book/vats          |
| lookupSqlValue        | -                                   |
| tableTitle            | Vats                                |
| formTitleForInserting | New Vat                             |
| formTitleForEditing   | Vat                                 |
| crud/browse/action    | Bookkeeping/MainBook/Vats (plural) |
| crud/add/action       | Bookkeeping/MainBook/Vat/Add       |
| crud/edit/action      | Bookkeeping/MainBook/Vat/Edit      |

## Data Structure

| Column                   | Title             | ADIOS Type | Length | Required | Notes                                      |
| :----------------------- | ----------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                       |                   |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info              | Record Info       |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| ratio                    | VAT ratio         |  decimal   |  5,2   |   TRUE   | Percento DPH                               |
| id_bkp_accounting_period | Accounting period |   lookup   |   8    |   TRUE   | ID účtovného obdobia                       |
| id_bkp_book_account      | Book account      |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy                  |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                    | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_accounting_period | App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account      | App/Widgets/Bookkeeping/MainBook/Models/BookAccount      |   M:N    | Cascade  | Restrict |

### Indexes

| Name                             |  Type   |               Column + Order |
| :------------------------------- | :-----: | ---------------------------: |
| id                               | PRIMARY |                       id ASC |
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
