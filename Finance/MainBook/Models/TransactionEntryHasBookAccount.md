# TransactionEntryHasBookAccount

## Introduction

Táto tabuľka slúži na ukladanie prepojenia medzi položkou účtovného denníka a účtu v účtovnej osnove M:N. Pri pridávaní položky v podvojnom účtovníctve musí byť definovaný účet, ku ktorému sa položka bude účtovať. 

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property | Value                                  |
| :------- | :------------------------------------- |
| sqlName  | fin_transaction_entry_has_book_account |

## SQL Structure

| Column                   | Description               | Type | Length | NULL     | Default |
| :----------------------- | :------------------------ | :--: | :----: | :------: | :-----: |
| id                       | Unique record ID          | INT  | 8      | NOT NULL | 0       |
| id_fin_transaction_entry | ID položky dokladu        | INT  | 8      | NOT NULL | 0       |
| id_fin_book_account      | ID účtu z účtovnej osnovy | INT  | 8      | NOT NULL | 0       |

## Columns

* id_fin_transaction_entry:
  * type: lookup
  * title: Transaction
  * model: App/Widgets/Finance/MainBook/Models/Transaction
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE
* id_fin_book_account:
  * type: lookup
  * title: Account
  * model: App/Widgets/Finance/MainBook/Models/BookAccount
  * showColumn: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT


## Foreign Keys

| Column                   | Parent table          | Relation | OnUpdate | OnDelete |
| :----------------------- | :-------------------- | :------: | :------: | :------: |
| id_fin_transaction_entry | fin_transaction_entry | 1:N      | Cascade  | Cascade  |
| id_fin_book_account      | fin_book_accounts     | M:N      | Cascade  | Restrict |

## Indexes

| Name | Type    | Column + Order |
| ---- | ------- | -------------- |
| id   | PRIMARY | id ASC         |

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
