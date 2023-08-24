# Model Bookkeeping/MainBook/TransactionItem

## Introduction

Táto tabuľka slúži na ukladanie informácií o jednotlivých položkách transakcie. Každá položka bude odkazovať na konkrétny účet. Súčet na kreditných a debetných účtoch v rámci dokladu musí byť 0. 

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                     |
| :-------------------- | :---------------------------------------- |
| sqlName               | bkp_transaction_entries                   |
| urlBase               | bookkeeping/main-book/transaction-entries |
| lookupSqlValue        |                                           |
| tableTitle            | Transaction Entries                       |
| formTitleForInserting | New Transaction Item                      |
| formTitleForEditing   | Transaction Item                          |
| formAddButtonText     | Add Transaction Item                      |
| formAddButtonText     | Update Transaction Item                   |

## Data Structure

| Column              | Title            | ADIOS Type | Length | Required | Notes                                    |
| :------------------ | ---------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id                  |                  |    int     |   8    |   TRUE   | Unique record ID                         |
| id_created_by       | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime     | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by       | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime     | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| amount              | Amount           |  decimal   |  15,2  |   TRUE   | Suma položky transakcie v hlavnej mene   |
| amount_currency     | Amount Currency  |  decimal   |  15,2  |   TRUE   | Suma položky transakcie v inej mene      |
| id_bkp_transaction  | Transaction      |   lookup   |   8    |   TRUE   | ID dokladu                               |
| id_bkp_book_account | Book Account     |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy                |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                               | Relation | OnUpdate | OnDelete |
| :------------------ | :-------------------------------------------------- | :------: | -------- | -------- |
| id_created_by       | ADIOS/Core/User                                     |   1:N    | Cascade  | Cascade  |
| id_updated_by       | ADIOS/Core/User                                     |   1:N    | Cascade  | Cascade  |
| id_bkp_transaction  | App/Widgets/Bookkeeping/MainBook/Models/Transaction |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account | App/Widgets/Bookkeeping/MainBook/Models/BookAccount |   M:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |
| id_created_by       |  INDEX  |       id_created_by ASC |
| create_datetime     |  INDEX  |     create_datetime ASC |
| id_updated_by       |  INDEX  |       id_updated_by ASC |
| update_datetime     |  INDEX  |     update_datetime ASC |
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