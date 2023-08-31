# Model Bookkeeping/Bank/BankAccount

## Introduction

Zoznam bankových účtov, ktoré má klient zahrnuté v účtovníctve.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                     |
| :-------------------- | :------------------------ |
| sqlName               | bkp_bank_accounts         |
| urlBase               | bookkeeping/bank/accounts |
| lookupSqlValue        | {%TABLE%}.name            |
| tableTitle            | Bank Accounts             |
| formTitleForInserting | New Bank Account          |
| formTitleForEditing   | Bank Account              |
| formAddButtonText     | Add Account               |
| formSaveButtonText    | Update Account            |
| crud/browse/action    | Bank/Accounts             |
| crud/add/action       | Bank/Account/AddOrEdit    |
| crud/edit/action      | Bank/Account/AddOrEdit    |

## Data Structure

| Column              | Title            | ADIOS Type | Length | Required | Notes                                                      |
| :------------------ | ---------------- | :--------: | :----: | :------: | :--------------------------------------------------------- |
| id                  | ID               |    int     |   11   |   TRUE   | Jedinečné ID záznamu                                       |
| name                | Name             |  varchar   |  100   |   TRUE   | Názov bankového účtu                                       |
| acronym             | Acronym          |  varchar   |   5    |   TRUE   | Skratka  bankového účtu                                    |
| bank                | Bank Name        |  varchar   |  100   |   TRUE   | Názov banky                                                |
| iban                | IBAN             |  varchar   |   34   |   TRUE   | IBAN účtu                                                  |
| swift               | SWIFT            |  varchar   |   11   |   TRUE   | SWIFT banky                                                |
| id_bkp_currency     | Currency         |   lookup   |   11   |   TRUE   | ID meny v ktorej je bankový účet vedený                    |
| id_bkp_book_account | Analytic Account |   lookup   |   11   |   TRUE   | ID analytického účtu na ktorom je bankový účet vedený      |
| is_open             | Is Open          |  boolean   |   1    |  FALSE   | Príznak, či je bankový účet otvorený a môže sa naň účtovať |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                                    | Relation | OnUpdate | OnDelete |
| :------------------ | :------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_currency     | App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod |   1:N    | Cascade  | Restrict |
| id_bkp_book_account | App/Widgets/Bookkeeping/MainBook/Models/BookAccount      |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |
| id_bkp_currency     |  INDEX  |     id_bkp_currency ASC |
| id_bkp_book_account |  INDEX  | id_bkp_book_account ASC |
| iban                | UNIQUE  |                iban ASC |
| name                |  INDEX  |                name ASC |
| is_open             |  INDEX  |            is_open DESC |

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
Účet na ktorý obsahuje záznamy v tabuľke bkp_bank_transactions nie je možné vymazať.

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
