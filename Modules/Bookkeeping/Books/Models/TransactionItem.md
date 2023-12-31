# Model Bookkeeping/Books/TransactionItem

## Introduction

Táto tabuľka slúži na ukladanie informácií o jednotlivých položkách transakcie. Každá položka bude odkazovať na konkrétny účet. Súčet na kreditných a debetných účtoch v rámci dokladu musí byť 0. 

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                   |
| :-------------------- | :-------------------------------------- |
| storeRecordInfo       | TRUE                                    |
| sqlName               | bkp_transaction_items                   |
| urlBase               | bookkeeping/books/transaction-items     |
| lookupSqlValue        |                                         |
| tableTitle            | Transaction Items                       |
| formTitleForInserting | New Transaction Item                    |
| formTitleForEditing   | Transaction Item                        |
| formAddButtonText     | Add Transaction Item                    |
| formAddButtonText     | Update Transaction Item                 |
| crud/browse/controller    | Bookkeeping/Books/Transaction/Items     |
| crud/add/controller       | Bookkeeping/Books/Transaction/Item/Add  |
| crud/edit/controller      | Bookkeeping/Books/Transaction/Item/Edit |

## Data Structure

| Column              | Title           | ADIOS Type | Length | Required | Notes                                      |
| :------------------ | --------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                  |                 |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info         | Record Info     |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| amount              | Amount          |  decimal   |  15,2  |   TRUE   | Suma položky transakcie v hlavnej mene     |
| amount_currency     | Amount Currency |  decimal   |  15,2  |   TRUE   | Suma položky transakcie v inej mene        |
| id_bkp_transaction  | Transaction     |   lookup   |   8    |   TRUE   | ID dokladu                                 |
| id_bkp_book_account | Book Account    |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy                  |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                            | Relation | OnUpdate | OnDelete |
| :------------------ | :----------------------------------------------- | :------: | -------- | -------- |
| id_bkp_transaction  | App/Widgets/Bookkeeping/Books/Models/Transaction |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account | App/Widgets/Bookkeeping/Books/Models/Account     |   M:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |
| id_bkp_transaction  |  INDEX  |  id_bkp_transaction ASC |
| id_bkp_book_account |  INDEX  | id_bkp_book_account ASC |

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
