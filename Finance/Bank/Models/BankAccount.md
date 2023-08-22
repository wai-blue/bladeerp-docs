# BankAccount

## Introduction

Zoznam bankových účtov, ktoré má klient zahrnuté v účtovníctve.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                 |
| :-------------------- | :-------------------- |
| sqlName               | fin_bank_accounts     |
| urlBase               | finance/bank/accounts |
| lookupSqlValue        | {%TABLE%}.name        |
| tableTitle            | Bank Accounts         |
| formTitleForInserting | New Bank Account      |
| formTitleForEditing   | Bank Account          |
| formAddButtonText     | Add Account           |
| formSaveButtonText    | Update Account        |

## SQL Structure

REVIEW DD: V Google Docs bola struktura tejto tabulka ina, ako v napr. v MainBook.

| Názov               | Title            | Popis                                                      | Typ     | Dĺžka | Povinný |
| :------------------ | :--------------- | :--------------------------------------------------------- | :------ | :---- | :------ |
| id                  | ID               | Jedinečné ID záznamu                                       | INT     | 11    | Y       |
| name                | Name             | Názov bankového účtu                                       | VARCHAR | 100   | Y       |
| acronym             | Acronym          | Skratka  bankového účtu                                    | VARCHAR | 5     | Y       |
| bank                | Bank Name        | Názov banky                                                | VARCHAR | 100   | Y       |
| iban                | IBAN             | IBAN účtu                                                  | VARCHAR | 34    | Y       |
| swift               | SWIFT            | SWIFT banky                                                | VARCHAR | 11    | Y       |
| id_fin_currency     | Currency         | ID meny v ktorej je bankový účet vedený                    | INT     | 11    | Y       |
| id_fin_book_account | Analytic Account | ID analytického účtu na ktorom je bankový účet vedený      | INT     | 11    | Y       |
| is_open             | Is Open          | Príznak, či je bankový účet otvorený a môže sa naň účtovať | BOOLEAN | 1     | N       |

## Foreign Keys

| Column              | Parent table     | Relation | OnUpdate | OnDelete |
| :------------------ | :--------------- | :------: | -------- | -------- |
| id_fin_currency     | fin_currency     |   1:N    | Cascade  | Restrict |
| id_fin_book_account | fin_book_account |   1:N    | Cascade  | Restrict |

## Indexes

| Názov   | Typ     | Stĺpec  | Zoradenie |
| :------ | :------ | :------ | :-------- |
| id      | PRIMARY | id      | ASC       |
| iban    | UNIQUE  | iban    | ASC       |
| name    | INDEX   | name    | ASC       |
| is_open | INDEX   | is_open | DESC      |

## Columns

REVIEW DD: V Google Docs nebola definicia ADIOS columns.

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
Účet na ktorý obsahuje záznamy v tabuľke fin_bank_documents nie je možné vymazať.

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
