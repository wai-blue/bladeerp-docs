# Model Bookkeeping/Books/Book

## Introduction

The "book" in the bookkeeping.
Enables multi-book bookkeeping (https://www.deskera.com/blog/what-is-multi-book-accounting)

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                            |
| ---------------------- | -------------------------------- |
| storeRecordInfo        | TRUE                             |
| sqlName                | bkp_books                        |
| urlBase                | bookkeeping/books                |
| lookupSqlValue         | -                                |
| tableTitle             | Books                            |
| formTitleForInserting  | New Book                         |
| formTitleForEditing    | Book                             |
| crud/browse/controller | Bookkeeping/Books/Books          |
| crud/add/controller    | Bookkeeping/Books/Book/AddOrEdit |
| crud/edit/controller   | Bookkeeping/Books/Book/AddOrEdit |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRUE   |                                            |
| notes       | Notes       |  varchar   |  100   |   TRUE   |                                            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name |  Type   | Column + Order |
| :--- | :-----: | -------------: |
| id   | PRIMARY |         id ASC |

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
