# Model Bookkeeping/Books/TransactionItemAccount

## Introduction

Táto tabuľka slúži na ukladanie prepojenia medzi položkou účtovného denníka a účtu v účtovnej osnove M:N. Pri pridávaní položky v podvojnom účtovníctve musí byť definovaný účet, ku ktorému sa položka bude účtovať. 

## Constants

No constants are defined for this model.

## Properties

| Property        | Value                        |
| :-------------- | :--------------------------- |
| isJunctionTable | TRUE                         |
| storeRecordInfo | FALSE                        |
| sqlName         | bkp_transaction_item_account |

## Data Structure

| Column                  | Title            | ADIOS Type | Length | Required | Notes                     |
| :---------------------- | ---------------- | :--------: | :----: | :------: | :------------------------ |
| id                      |                  |    int     |   8    |   TRUE   | Unique record ID          |
| id_bkp_transaction_item | Transaction Item |   lookup   |   8    |   TRUE   | ID položky dokladu        |
| id_bkp_book_account     | Account          |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                  | Model                                            | Relation | OnUpdate | OnDelete |
| :---------------------- | :----------------------------------------------- | :------: | -------- | -------- |
| id_bkp_transaction_item | App/Widgets/Bookkeeping/Books/Models/Transaction |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account     | App/Widgets/Bookkeeping/Books/Models/Account     |   M:N    | Cascade  | Restrict |

### Indexes

[Model does not contain indexes.]

| Name                    |  Type   |              Column + Order |
| :---------------------- | :-----: | --------------------------: |
| id                      | PRIMARY |                      id ASC |
| id_bkp_transaction_item |  INDEX  | id_bkp_transaction_item ASC |
| id_bkp_book_account     |  INDEX  |     id_bkp_book_account ASC |

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
