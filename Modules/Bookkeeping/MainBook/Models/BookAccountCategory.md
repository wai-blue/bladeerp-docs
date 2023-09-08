# Model Bookkeeping/MainBook/BookAccountCategory

## Introduction

Táto tabuľka bude slúžiť na definíciu druhov účtov.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                         |
| :-------------------- | :-------------------------------------------- |
| storeRecordInfo       | TRUE                                          |
| sqlName               | bkp_book_account_categories                   |
| urlBase               | bookkeeping/main-book/book-account-categories |
| lookupSqlValue        | {%TABLE%}.name                                |
| tableTitle            | Book Account Categories                       |
| formTitleForInserting | New Category                                  |
| formTitleForEditing   | Account Category                              |
| crud/browse/action    | Bookkeeping/MainBook/BookAccountCategories    |
| crud/add/action       | Bookkeeping/MainBook/BookAccountCategory/Add  |
| crud/edit/action      | Bookkeeping/MainBook/BookAccountCategory/Edit |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRIE   | Názov druhu                                |

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

Ak existujú záznamy na tento druh v tabuľke **bkp_book_account**, nie je možné druh vymazať.

### onAfterDelete

Not used.

## Formatters

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
