# Model Bookkeeping/MainBook/BookAccountType

## Introduction

Táto tabuľka bude slúžiť na definíciu typov účtov.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                    |
| :-------------------- | :--------------------------------------- |
| sqlName               | bkp_book_account_types                   |
| urlBase               | bookkeeping/main-book/book-account-types |
| lookupSqlValue        | {%TABLE%}.name                           |
| tableTitle            | Book Account Types                       |
| formTitleForInserting | New Type                                 |
| formTitleForEditing   | Account Type                             |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes            |
| :---------- | ----------- | :--------: | :----: | :------: | :--------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID |
| record_info | Record Info |    json    |        |   TRUE   |                  |
| name        | Name        |  varchar   |  100   | NOT NULL | Názov typu       |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name            |  Type   |      Column + Order |
| :-------------- | :-----: | ------------------: |
| id              | PRIMARY |              id ASC |
| name            | UNIQUE  |            name ASC |

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

Ak existujú záznamy na tento druh v tabuľke **bkp_book_accounts**, nie je možné druh vymazať.

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
