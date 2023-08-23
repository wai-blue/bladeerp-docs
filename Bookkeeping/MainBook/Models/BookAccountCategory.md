# BookAccountCategory

## Introduction

Táto tabuľka bude slúžiť na definíciu druhov účtov.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                     |
| :-------------------- | :---------------------------------------- |
| sqlName               | bkp_book_account_categories               |
| urlBase               | bookkeeping/main-book/book-account-categories |
| lookupSqlValue        | {%TABLE%}.name                            |
| tableTitle            | Book Account Categories                   |
| formTitleForInserting | New Category                              |
| formTitleForEditing   | Account Category                          |

## SQL Structure

| Column | Description      | Type    | Length | NULL     | Default |
| :----- | :--------------- | :-----: | :----: | :------: | :-----: |
| id     | Unique record ID | INT     | 8      | NOT NULL | 0       |
| name   | Názov druhu      | VARCHAR | 100    | NOT NULL | ""      |

## Columns

* name:
  * type: varchar
  * title: Name
  * byte_size: 100
  * required: true
  * showColumn: true


## Foreign Keys

| Column | Parent table | Relation | OnUpdate | OnDelete |
| ------ | ------------ | -------- | -------- | -------- |
|        |              |          |          |          |

## Indexes

| Name | Type    | Column + Order |
| :--- | :-----: | :------------: |
| id   | PRIMARY | id ASC         |
| name | UNIQUE  | name ASC       |

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