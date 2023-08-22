# BankTransaction

TODO: V GoogleDocs sa toto volalo BankDocument. Treba to v yml prerobit na BankTransaction.

## Introduction

...

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                     |
| :-------------------- | :------------------------ |
| sqlName               | fin_bank_transactions     |
| urlBase               | finance/bank/transactions |
| lookupSqlValue        | -                         |
| tableTitle            | Bank Transaction          |
| formTitleForInserting | New Transaction           |
| formTitleForEditing   | Bank Transaction          |

## SQL Structure

REVIEW DD: V Google Docs bola struktura tejto tabulka ina, ako v napr. v MainBook.

| Názov                    | Title           | Popis                                         | Typ     | Dĺžka | Povinný |
| :----------------------- | :-------------- | :-------------------------------------------- | :------ | :---- | :------ |
| id                       | ID              | Jedinečné ID záznamu                          | INT     | 11    | Y       |
| id_fin_bank_account      | Name            | ID bankového účtu                             | INT     | 11    | Y       |
| id_fin_accounting_period | Account Period  | ID účtovného obdobia                          | INT     | 11    | Y       |
| id_com_numeric_sequence  | Document Type   | ID číselnej rady                              | INT     | 11    | Y       |
| id_com_address           | Partner         | ID adresára                                   | INT     | 11    | Y       |
| id_adios_user            | User            | ID užívateľa, ktorý doklad vystavil           | INT     | 11    | Y       |
| date                     | Creation Date   | Dátum vystavenia dokladu                      | DATE    | 8     | Y       |
| number                   | Number          | Poradové číslo dokladu                        | INT     | 8     | Y       |
| description              | Description     | Popis dokladu                                 | TEXT    |       | N       |
| amount                   | Amount          | Suma                                          | DECIMAL | 15,2  | Y       |
| amount_currency          | Amount Currency | Celková suma transakcie v inej mene           | DECIMAL | 15,2  | Y       |
| exchange_rate            | Exchange Rate   | Kurz meny voči hlavnej mene účtovného obdobia | DECIMAL | 15,2  | Y       |
| id_fin_currency          | Currency        | ID meny                                       | INT     | 11    | Y       |
| id_fin_transaction       | Transaction     | ID v denníku hlavnej knihy                    | INT     | 11    | Y       |

## Foreign Keys

| Stĺpec                   | Parent tabuľka         | Väzba | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :---- | :------- | :------- |
| id_fin_currency          | fin_currencies         | 1:N   | Cascade  | Restrict |
| id_fin_bank_account      | fin_bank_accounts      | 1:N   | Cascade  | Restrict |
| id_fin_accounting_period | fin_accounting_periods | 1:N   | Cascade  | Restrict |
| id_com_numeric_sequence  | com_numeric_sequences  | 1:N   | Cascade  | Restrict |
| id_com_address           | com_address            | 1:N   | Cascade  | Restrict |
| id_adios_user            | adios_user             | 1:N   | Cascade  | Restrict |
| id_fin_transaction       | fin_transaction        | 1:N   | Cascade  | Restrict |

## Indexes

| Názov                                                | Typ     | Stĺpec                   | Zoradenie |
| :--------------------------------------------------- | :------ | :----------------------- | :-------- |
| id                                                   | PRIMARY | id                       | ASC       |
| date                                                 | INDEX   | date                     | ASC       |
| id_fin_accounting_period_id_fin_document_type_number | UNIQUE  | id_fin_accounting_period | ASC       |
|                                                      |         | id_fin_document_type     | ASC       |
|                                                      |         | number                   | ASC       |

## Columns

REVIEW DD: V Google Docs nebola definicia ADIOS columns.

## Callbacks

### onBeforeInsert
Novu transakciu je možné pridať iba s dátumom po poslednej závierke. 

### onAfterInsert
Pri vytváraní novej transakcie je potrebné vytvoriť aj záznam v tabuľke fin_transactions a doklad v nej podrobne rozúčtovať.

### onBeforeUpdate
Transakciu po uzávierke nie je možné upraviť.

### onAfterUpdate
Pri zmene transakcie skontrolovať, či je doklad správne rozúčtovaný v denníku. Ak nie, otvoriť záznam v denníku.

### onBeforeDelete
Transakciu po uzávierke nie je možné vymazať.

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
