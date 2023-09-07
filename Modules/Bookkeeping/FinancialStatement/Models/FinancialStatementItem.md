# Model Bookkeeping/FinancialStatement/FinancialStatementItems

NOTE: DD pretukal.
NOTE: PA skontroloval - chyby opravene

## Introduction

Zostatky na účtoch pri účtovnej závierke.

Pre tabuľku neexistuje CRUD, napĺňa sa automaticky pri vytvorení účtovnej závierky. Záznamy je možné iba zobraziť a nie je ich možné meniť.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                      |
| --------------------- | ---------------------------------------------------------- |
| sqlName               | bkp_financial_statement_items                              |
| urlBase               | bookkeeping/financial-statement-items                      |
| lookupSqlValue        |                                                            |
| tableTitle            | Account Balances                                           |
| formTitleForInserting |                                                            |
| formTitleForEditing   |                                                            |
| formAddButtonText     |                                                            |
| formSaveButtonText    |                                                            |
| crud/browse/action    | Bookkeeping/FinancialStatement/FinancialStatementItems     |
| crud/add/action       | Bookkeeping/FinancialStatement/FinancialStatementItem/Add  |
| crud/edit/action      | Bookkeeping/FinancialStatement/FinancialStatementItem/Edit |

## Data Structure

| Column                     | Title               | ADIOS Type | Length | Required | Notes               |
| :------------------------- | ------------------- | :--------: | :----: | :------: | :------------------ |
| id                         |                     |    int     |   8    |   TRUE   | Unique record ID    |
| record_info                | Record Info         |    json    |        |   TRUE   |                     |
| balance                    | Balance             |  decimal   |  15,2  |  FALSE   | Balance             |
| id_bkp_book_account        | Book Account        |   lookup   |   8    |   TRUE   | Book Account        |
| id_bkp_financial_statement | Financial Statement |   lookup   |   8    |   TRUE   | Financial Statement |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                     | Model                                                                                                                                        | Relation | OnUpdate | OnDelete |
| :------------------------- | :------------------------------------------------------------------------------------------------------------------------------------------- | :------: | :------: | :------: |
| id_bkp_book_account        | [App/Widgets/Bookkeeping/MainBook/Models/BookAccount](../../MainBook/Models/BookAccount.md)                                   |   1:N    | Cascade  | Restrict |
| id_bkp_financial_statement | [App/Widgets/Bookkeeping/FinancialStatement/Models/FinancialStatement](./FinancialStatement.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                       |  Type   |                 Column + Order |
| :------------------------- | :-----: | -----------------------------: |
| id                         | PRIMARY |                         id ASC |
| id_bkp_book_account        |  INDEX  |        id_bkp_book_account ASC |
| id_bkp_financial_statement |  INDEX  | id_bkp_financial_statement ASC |

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
