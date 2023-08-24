# Model Bookkeeping/MainBook/BookAccountCategory

## Introduction

Táto tabuľka bude slúžiť na definíciu druhov účtov.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                         |
| :-------------------- | :-------------------------------------------- |
| sqlName               | bkp_book_account_categories                   |
| urlBase               | bookkeeping/main-book/book-account-categories |
| lookupSqlValue        | {%TABLE%}.name                                |
| tableTitle            | Book Account Categories                       |
| formTitleForInserting | New Category                                  |
| formTitleForEditing   | Account Category                              |

## Data Structure

| Column          | Title            | ADIOS Type | Length | Required | Notes                                    |
| :-------------- | ---------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id              |                  |    int     |   8    |   TRUE   | Unique record ID                         |
| id_created_by   | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by   | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| name            | Name             |  varchar   |  100   |   TRIE   | Názov druhu                              |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column        | Model           | Relation | OnUpdate | OnDelete |
| :------------ | :-------------- | :------: | -------- | -------- |
| id_created_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |
| id_updated_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |

### Indexes

| Name            |  Type   |      Column + Order |
| :-------------- | :-----: | ------------------: |
| id              | PRIMARY |              id ASC |
| id_created_by   |  INDEX  |   id_created_by ASC |
| create_datetime |  INDEX  | create_datetime ASC |
| id_updated_by   |  INDEX  |   id_updated_by ASC |
| update_datetime |  INDEX  | update_datetime ASC |
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
