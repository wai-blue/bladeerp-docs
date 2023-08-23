# TransactionEntry

## Introduction

Táto tabuľka slúži na ukladanie informácií o jednotlivých položkách transakcie. Každá položka bude odkazovať na konkrétny účet. Súčet na kreditných a debetných účtoch v rámci dokladu musí byť 0. 

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                 |
| :-------------------- | :------------------------------------ |
| sqlName               | bkp_transaction_entries               |
| urlBase               | bookkeeping/main-book/transaction-entries |
| lookupSqlValue        | -                                     |
| tableTitle            | Transaction Entries                   |
| formTitleForInserting | New Transaction Entry                 |
| formTitleForEditing   | Transaction Entry                     |
| formAddButtonText     | Add Transaction Entry                 |
| formAddButtonText     | Update Transaction Entry              |

## SQL Structure

| Column              | Description                            | Type    | Length | NULL     | Default |
| :------------------ | :------------------------------------- | :-----: | :----: | :------: | :-----: |
| id                  | Unique record ID                       | INT     | 8      | NOT NULL | 0       |
| amount              | Suma položky transakcie v hlavnej mene | DECIMAL | 15,2   | NOT NULL | 0       |
| amount_currency     | Suma položky transakcie v inej mene    | DECIMAL | 15,2   | NOT NULL | 0       |
| id_bkp_transaction  | ID dokladu                             | INT     | 8      | NOT NULL | 0       |
| id_bkp_book_account | ID účtu z účtovnej osnovy              | INT     | 8      | NOT NULL | 0       |

## Columns

* amount:
  * type: float
  * title: Amount
  * byte_size: 15
  * decimals: 2
  * required: true
  * showColumn: true
* amount_currency:
  * type: float
  * title: Amount Currency
  * byte_size: 15
  * decimals: 2
  * required: true
* id_bkp_transaction:
  * type: lookup
  * title: Transaction
  * model: App/Widgets/Bookkeeping/MainBook/Models/Transaction
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE
* id_bkp_book_account:
  * type: lookup
  * title: Account
  * model: App/Widgets/Bookkeeping/MainBook/Models/BookAccount
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT

## Foreign Keys

| Column              | Parent table      | Relation | OnUpdate | OnDelete |
| :------------------ | :---------------- | :------: | :------: | :------: |
| id_bkp_transaction  | bkp_transactions  | 1:N      | Cascade  | Cascade  |
| id_bkp_book_account | bkp_book_accounts | M:N      | Cascade  | Restrict |

## Indexes

| Name               | Type    | Column + Order         |
| :----------------- | :-----: | :--------------------- |
| id                 | PRIMARY | id ASC                 |
| id_bkp_transaction | INDEX   | id_bkp_transaction ASC |

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
