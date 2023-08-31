# Model Bookkeeping/Bank/BankTransaction

## Introduction

...

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                             |
| :-------------------- | :-------------------------------- |
| sqlName               | bkp_bank_transactions             |
| urlBase               | bookkeeping/bank/transactions     |
| lookupSqlValue        |                                   |
| tableTitle            | Bank Transaction                  |
| formTitleForInserting | New Transaction                   |
| formTitleForEditing   | Bank Transaction                  |
| crud/browse/action    | Bank/Actions/Transations          |
| crud/add/action       | Bank/Actions/Transation/AddOrEdit |
| crud/edit/action      | Bank/Actions/Transation/AddOrEdit |

## Data Structure

| Column                   | Title           | ADIOS Type | Length | Required | Notes                                         |
| :----------------------- | --------------- | :--------: | :----: | :------: | :-------------------------------------------- |
| id                       | ID              |    int     |   11   |   TRUE   | Jedinečné ID záznamu                          |
| id_bkp_bank_account      | Name            |   lookup   |   11   |   TRUE   | ID bankového účtu                             |
| id_bkp_accounting_period | Account Period  |   lookup   |   11   |   TRUE   | ID účtovného obdobia                          |
| id_com_numeric_sequence  | Document Type   |   lookup   |   11   |   TRUE   | ID číselnej rady                              |
| id_com_contact           | Partner         |   lookup   |   11   |   TRUE   | ID kontaktu                                   |
| id_user                  | User            |   lookup   |   11   |   TRUE   | ID užívateľa, ktorý doklad vystavil           |
| issue_date               | Issue Date      |    date    |   8    |   TRUE   | Dátum vystavenia dokladu                      |
| transaction_number       | Number          |    int     |   8    |   TRUE   | Poradové číslo dokladu                        |
| description              | Description     |    text    |        |  FALSE   | Popis dokladu                                 |
| transaction_amount       | Amount          |  decimal   |  15,2  |   TRUE   | Suma transakcie                               |
| amount_currency          | Amount Currency |  decimal   |  15,2  |   TRUE   | Celková suma transakcie v inej mene           |
| exchange_rate            | Exchange Rate   |  decimal   |  15,2  |   TRUE   | Kurz meny voči hlavnej mene účtovného obdobia |
| id_bkp_currency          | Currency        |   lookup   |   11   |   TRUE   | ID meny                                       |
| id_bkp_transaction       | Transaction     |   lookup   |   11   |   TRUE   | ID v denníku hlavnej knihy                    |

REVIEW DD: `transaction_amount` - v akej mene?
REVIEW DD: `amount_currency` - co je "ina mena"?

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                         | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------ | :------: | -------- | -------- |
| id_bkp_currency          | [App/Widgets/Bookkeeping/ExchangeRate/Models/Currency](../../../Bookkeeping/Bank/Models/BankAccount.md)bkp_currencies |   1:N    | Cascade  | Restrict |
| id_bkp_bank_account      | [App/Widgets/Bookkeeping/Bank/Models/BankAccount](../../../Bookkeeping/Bank/Models/BankAccount.md)                    |   1:N    | Cascade  | Restrict |
| id_bkp_accounting_period | [App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod](../../../Bookkeeping/MainBook/Models/AccountingPeriod.md)  |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence  | com_numeric_sequences                                                                                         |   1:N    | Cascade  | Restrict |
| id_com_contact           | com_contact                                                                                                   |   1:N    | Cascade  | Restrict |
| id_user                  | ADIOS/Core/User                                                                                               |   1:N    | Cascade  | Restrict |
| id_bkp_transaction       | bkp_transaction                                                                                               |   1:N    | Cascade  | Restrict |

REVIEW DD: dokoncit com_numeric_sequences a com_contact
REVIEW DD: bkp_transaction - z nazvu tabulky nie je presne jasny model

### Indexes

| Name                                                                  |  Type   |               Column + Order |
| :-------------------------------------------------------------------- | :-----: | ---------------------------: |
| id                                                                    | PRIMARY |                       id ASC |
| transasction_number                                                   |  INDEX  |      transasction_number ASC |
| issue_date                                                            |  INDEX  |               issue_date ASC |
| id_bkp_bank_account                                                   |  INDEX  |      id_bkp_bank_account ASC |
| id_bkp_accounting_period                                              |  INDEX  | id_bkp_accounting_period ASC |
| id_com_numeric_sequence                                               |  INDEX  |  id_com_numeric_sequence ASC |
| id_com_contact                                                        |  INDEX  |           id_com_contact ASC |
| id_user                                                               |  INDEX  |                  id_user ASC |
| id_bkp_currency                                                       |  INDEX  |          id_bkp_currency ASC |
| id_bkp_transaction                                                    |  INDEX  |       id_bkp_transaction ASC |
| id_bkp_accounting_period___id_bkp_document_type___transasction_number | UNIQUE  | id_bkp_accounting_period ASC |
|                                                                       |         |     id_bkp_document_type ASC |
|                                                                       |         |      transasction_number ASC |

## Callbacks

### onBeforeInsert

Novu transakciu je možné pridať iba s dátumom po poslednej závierke. 

### onAfterInsert

Pri vytváraní novej transakcie je potrebné vytvoriť aj záznam v tabuľke bkp_transactions a doklad v nej podrobne rozúčtovať.

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
