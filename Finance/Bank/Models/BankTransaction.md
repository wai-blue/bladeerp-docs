# Model Finance/Bank/BankTransaction

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
| sqlName               | fin_bank_transactions     |
| urlBase               | finance/bank/transactions |
| lookupSqlValue        |                           |
| tableTitle            | Bank Transaction          |
| formTitleForInserting | New Transaction           |
| formTitleForEditing   | Bank Transaction          |

## Data Structure

| Column                   | Title           | ADIOS Type | Length | Required | Notes                                         |
| :----------------------- | --------------- | :--------: | :----: | :------: | :-------------------------------------------- |
| id                       | ID              |    int     |   11   |   TRUE   | Jedinečné ID záznamu                          |
| id_fin_bank_account      | Name            |   lookup   |   11   |   TRUE   | ID bankového účtu                             |
| id_fin_accounting_period | Account Period  |   lookup   |   11   |   TRUE   | ID účtovného obdobia                          |
| id_com_numeric_sequence  | Document Type   |   lookup   |   11   |   TRUE   | ID číselnej rady                              |
| id_com_address           | Partner         |   lookup   |   11   |   TRUE   | ID adresára                                   |
| id_adios_user            | User            |   lookup   |   11   |   TRUE   | ID užívateľa, ktorý doklad vystavil           |
| date                     | Creation Date   |    date    |   8    |   TRUE   | Dátum vystavenia dokladu                      |
| number                   | Number          |    int     |   8    |   TRUE   | Poradové číslo dokladu                        |
| description              | Description     |    text    |        |  FALSE   | Popis dokladu                                 |
| amount                   | Amount          |  decimal   |  15,2  |   TRUE   | Suma                                          |
| amount_currency          | Amount Currency |  decimal   |  15,2  |   TRUE   | Celková suma transakcie v inej mene           |
| exchange_rate            | Exchange Rate   |  decimal   |  15,2  |   TRUE   | Kurz meny voči hlavnej mene účtovného obdobia |
| id_fin_currency          | Currency        |   lookup   |   11   |   TRUE   | ID meny                                       |
| id_fin_transaction       | Transaction     |   lookup   |   11   |   TRUE   | ID v denníku hlavnej knihy                    |

TODO: `date` stlpec lepsie pomenovat

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                         | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------ | :------: | -------- | -------- |
| id_fin_currency          | [App/Widgets/Finance/ExchangeRate/Models/Currency](../../../Finance/Bank/Models/BankAccount.md)fin_currencies |   1:N    | Cascade  | Restrict |
| id_fin_bank_account      | [App/Widgets/Finance/Bank/Models/BankAccount](../../../Finance/Bank/Models/BankAccount.md)                    |   1:N    | Cascade  | Restrict |
| id_fin_accounting_period | [App/Widgets/Finance/MainBook/Models/AccountingPeriod](../../../Finance/MainBook/Models/AccountingPeriod.md)  |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence  | com_numeric_sequences                                                                                         |   1:N    | Cascade  | Restrict |
| id_com_address           | com_address                                                                                                   |   1:N    | Cascade  | Restrict |
| id_adios_user            | ADIOS/Core/User                                                                                               |   1:N    | Cascade  | Restrict |
| id_fin_transaction       | fin_transaction                                                                                               |   1:N    | Cascade  | Restrict |

TODO: dokoncit com_numeric_sequences a com_address
TODO: fin_transaction - z nazvu tabulky nie je presne jasny model

### Indexes

| Name                                                   |  Type   |               Column + Order |
| :----------------------------------------------------- | :-----: | ---------------------------: |
| id                                                     | PRIMARY |                       id ASC |
| date                                                   |  INDEX  |                     date ASC |
| id_fin_accounting_period___id_fin_document_type_number | UNIQUE  | id_fin_accounting_period ASC |
|                                                        |         |     id_fin_document_type ASC |
|                                                        |         |                   number ASC |

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
