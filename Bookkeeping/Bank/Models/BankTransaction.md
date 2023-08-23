# Model Bookkeeping/Bank/BankTransaction

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

TODO: V GoogleDocs sa toto volalo BankDocument. Treba to v yml prerobit na BankTransaction.

## Introduction

...

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                     |
| :-------------------- | :------------------------ |
| sqlName               | bkp_bank_transactions     |
| urlBase               | bookkeeping/bank/transactions |
| lookupSqlValue        |                           |
| tableTitle            | Bank Transaction          |
| formTitleForInserting | New Transaction           |
| formTitleForEditing   | Bank Transaction          |

## Data Structure

| Column                   | Title           | ADIOS Type | Length | Required | Notes                                         |
| :----------------------- | --------------- | :--------: | :----: | :------: | :-------------------------------------------- |
| id                       | ID              |    int     |   11   |   TRUE   | Jedinečné ID záznamu                          |
| id_bkp_bank_account      | Name            |   lookup   |   11   |   TRUE   | ID bankového účtu                             |
| id_bkp_accounting_period | Account Period  |   lookup   |   11   |   TRUE   | ID účtovného obdobia                          |
| id_com_numeric_sequence  | Document Type   |   lookup   |   11   |   TRUE   | ID číselnej rady                              |
| id_com_address           | Partner         |   lookup   |   11   |   TRUE   | ID adresára                                   |
| id_user                  | User            |   lookup   |   11   |   TRUE   | ID užívateľa, ktorý doklad vystavil           |
| date                     | Creation Date   |    date    |   8    |   TRUE   | Dátum vystavenia dokladu                      |
| number                   | Number          |    int     |   8    |   TRUE   | Poradové číslo dokladu                        |
| description              | Description     |    text    |        |  FALSE   | Popis dokladu                                 |
| amount                   | Amount          |  decimal   |  15,2  |   TRUE   | Suma                                          |
| amount_currency          | Amount Currency |  decimal   |  15,2  |   TRUE   | Celková suma transakcie v inej mene           |
| exchange_rate            | Exchange Rate   |  decimal   |  15,2  |   TRUE   | Kurz meny voči hlavnej mene účtovného obdobia |
| id_bkp_currency          | Currency        |   lookup   |   11   |   TRUE   | ID meny                                       |
| id_bkp_transaction       | Transaction     |   lookup   |   11   |   TRUE   | ID v denníku hlavnej knihy                    |

REVIEW DD: id_adios_user premenovany na id_user
REVIEW DD: `number` je velmi vseobecny nazov, zle sa s takym pracuje (vyhladava alebo refaktoruje). Navrhujem 'transaction_number'.

TODO: `date` stlpec lepsie pomenovat

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                         | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------ | :------: | -------- | -------- |
| id_bkp_currency          | [App/Widgets/Bookkeeping/ExchangeRate/Models/Currency](../../../Bookkeeping/Bank/Models/BankAccount.md)bkp_currencies |   1:N    | Cascade  | Restrict |
| id_bkp_bank_account      | [App/Widgets/Bookkeeping/Bank/Models/BankAccount](../../../Bookkeeping/Bank/Models/BankAccount.md)                    |   1:N    | Cascade  | Restrict |
| id_bkp_accounting_period | [App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod](../../../Bookkeeping/MainBook/Models/AccountingPeriod.md)  |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence  | com_numeric_sequences                                                                                         |   1:N    | Cascade  | Restrict |
| id_com_address           | com_address                                                                                                   |   1:N    | Cascade  | Restrict |
| id_user                  | ADIOS/Core/User                                                                                               |   1:N    | Cascade  | Restrict |
| id_bkp_transaction       | bkp_transaction                                                                                               |   1:N    | Cascade  | Restrict |

TODO: dokoncit com_numeric_sequences a com_address
TODO: bkp_transaction - z nazvu tabulky nie je presne jasny model

### Indexes

| Name                                                   |  Type   |               Column + Order |
| :----------------------------------------------------- | :-----: | ---------------------------: |
| id                                                     | PRIMARY |                       id ASC |
| number                                                 |  INDEX  |                   number ASC |
| id_bkp_bank_account                                    |  INDEX  |      id_bkp_bank_account ASC |
| id_bkp_accounting_period                               |  INDEX  | id_bkp_accounting_period ASC |
| id_com_numeric_sequence                                |  INDEX  |  id_com_numeric_sequence ASC |
| id_com_address                                         |  INDEX  |           id_com_address ASC |
| id_user                                                |  INDEX  |                  id_user ASC |
| id_bkp_currency                                        |  INDEX  |          id_bkp_currency ASC |
| id_bkp_transaction                                     |  INDEX  |       id_bkp_transaction ASC |
| id_bkp_accounting_period___id_bkp_document_type_number | UNIQUE  | id_bkp_accounting_period ASC |
|                                                        |         |     id_bkp_document_type ASC |
|                                                        |         |                   number ASC |

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
