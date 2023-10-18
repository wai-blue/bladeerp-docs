# Model Bookkeeping/CashRegisters/ReceiptItem

## Introduction

Položky pohybu na pokladni.

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                                            |
| :--------------------- | :----------------------------------------------- |
| storeRecordInfo        | TRUE                                             |
| sqlName                | bkp_cash_register_receipt_items                  |
| urlBase                | bookkeeping/cash-registers/receipt/items         |
| lookupSqlValue         |                                                  |
| tableTitle             | Cashdesk Receipt Items                           |
| formTitleForInserting  | New Cashdesk Receipt Item                        |
| formTitleForEditing    | Cashdesk Receipt Item                            |
| formAddButtonText      | Add Receipt Item                                 |
| formSaveButtonText     | Update Receipt Item                              |
| crud/browse/controller | Bookkeeping/CashRegisters/Receipt/Items          |
| crud/add/controller    | Bookkeeping/CashRegisters/Receipt/Item/AddOrEdit |
| crud/edit/controller   | Bookkeeping/CashRegisters/Receipt/Item/AddOrEdit |

## Data Structure

| Column                       | Title            | ADIOS Type | Length | Required | Notes                     |
| :--------------------------- | ---------------- | :--------: | :----: | :------: | :------------------------ |
| id                           | ID               |    int     |   11   |   TRUE   | Unique record ID          |
| record_info                  | Record Info      |    json    |        |   TRUE   |                           |
| id_bkp_cash_register_receipt | Cashdesk Receipt |   lookup   |   11   |   TRUE   | ID pokladničného dokladu  |
| id_bkp_book_account          | Book Account     |   lookup   |   11   |   TRUE   | ID účtu z účtovnej osnovy |
| amount                       | Amount           |  decimal   |  15,2  |  FALSE   | Suma položky transakcie   |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                      | Model                                                   | Relation | OnUpdate | OnDelete |
| :-------------------------- | :------------------------------------------------------ | :------: | -------- | -------- |
| id_bkp_cash_register_receipt | App/Widgets/Bookkeeping/CashRegisters/Models/Receipt |   1:N    | Cascade  | Restrict |
| id_bkp_book_account         | App/Widgets/Bookkeeping/Books/Models/Account            |   1:N    | Cascade  | Restrict |

### Indexes

| Name                        |  Type   |                  Column + Order |
| :-------------------------- | :-----: | ------------------------------: |
| id                          | PRIMARY |                          id ASC |
| id_bkp_cash_register_receipt |  INDEX  | id_bkp_cash_register_receipt ASC |
| id_bkp_book_account         |  INDEX  |         id_bkp_book_account ASC |

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
