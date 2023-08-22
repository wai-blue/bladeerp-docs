# Model Finance/AccountingStatement/FinancialStatementEntry

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

## Introduction

Zostatky na účtoch pri účtovnej závierke. 

Pre tabuľku neexistuje CRUD, napĺňa sa automaticky pri vytvorení účtovnej závierky. Záznamy je možné iba zobraziť a nie je ich možné meniť.

## Constants

No constants are defined for this model.

## Properties

TODO: Je tableTitle spravne? Poznámka: Chýbali tu taktiež posledné dva riadky, ale ešte poprípade to odkontrolovať, ak by sa jednalo o úmyselnú úpravu

| Property              | Value                               |
| --------------------- | ----------------------------------- |
| sqlName               | fin_financial_statement_entries     |
| urlBase               | finance/financial-statement-entries |
| lookupSqlValue        |                                     |
| tableTitle            | Account Balances                    |
| formTitleForInserting |                                     |
| formTitleForEditing   |                                     |
| formAddButtonText     |                                     |
| formSaveButtonText    |                                     |

## Data Structure

TODO: Tabuľka je v nesúlade s tou na Google Docs, odkontrolovať prosím.

| Column                     | Title               | ADIOS Type | Length | Required | Notes               |
| :------------------------- | ------------------- | :--------: | :----: | :------: | :------------------ |
| id                         |                     |    int     |   8    |   TRUE   | Unique record ID    |
| balance                    | Balance             |  decimal   |  1,52  |  FALSE   | Balance             |
| id_fin_book_account        | Book Account        |   lookup   |   11   |   TRUE   | Book Account        |
| id_fin_financial_statement | Financial Statement |   lookup   |   11   |   TRUE   | Financial Statement |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                     | Model                                                                                                                                  | Relation | OnUpdate | OnDelete |
| :------------------------- | :------------------------------------------------------------------------------------------------------------------------------------- | :------: | :------: | :------: |
| id_fin_book_account        | [App/Widgets/Finance/MainBook/Models/BookAccount](../../../Finance/MainBook/Models/BookAccount.md)                                     |   1:N    | Cascade  | Restrict |
| id_fin_financial_statement | [App/Widgets/Finance/AccountingStatement/Models/FinancialStatement](../../../Finance/AccountingStatement/Models/FinancialStatement.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                       |  Type   |                 Column + Order |
| :------------------------- | :-----: | -----------------------------: |
| id                         | PRIMARY |                         id ASC |
| id_fin_book_account        |  INDEX  |        id_fin_book_account ASC |
| id_fin_financial_statement |  INDEX  | id_fin_financial_statement ASC |

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
