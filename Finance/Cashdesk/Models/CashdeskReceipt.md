# Model Finance/Cashdesk/CashdeskReceipt

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."
TODO: V yml prerobit z CashdeskDocument.

## Introduction

Pohyby na pokladnicnych uctoch.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                     |
| :-------------------- | :------------------------ |
| sqlName               | fin_cashdesk_receipts     |
| urlBase               | finance/cashdesk/receipts |
| lookupSqlValue        |                           |
| tableTitle            | Cashdesk Receipt          |
| formTitleForInserting | New Cashdesk Receipt      |
| formTitleForEditing   | Cashdesk Receipt          |
| formAddButtonText     | Add Receipt               |
| formSaveButtonText    | Update Receipt            |

## Data Structure

| Column                   | Title              | ADIOS Type | Length | Required | Notes                                         |
| :----------------------- | ------------------ | :--------: | :----: | :------: | :-------------------------------------------- |
| id                       | ID                 |    int     |   11   |   TRUE   | Jedinečné ID záznamu                          |
| id_fin_cashdesk_account  | Cashdesk Account   |   lookup   |   11   |   TRUE   | ID pokladne                                   |
| id_fin_accounting_period | Account Period     |   lookup   |   11   |   TRUE   | ID účtovného obdobia                          |
| id_com_numeric_sequence  | Document Type      |   lookup   |   11   |   TRUE   | ID typu dokumentu                             |
| id_com_address           | Partner            |   lookup   |   11   |   TRUE   | ID adresára                                   |
| id_user                  | User               |   lookup   |   11   |   TRUE   | ID užívateľa, ktorý doklad vystavil           |
| date                     | Creation Date      |    date    |   8    |   TRUE   | Dátum vystavenia pokladničného dokladu        |
| number                   | Number             |    int     |   8    |   TRUE   | Poradové číslo dokladu                        |
| description              | Description        |    text    |        |  FALSE   | Popis dokladu                                 |
| amount_without_vat       | Amount Without VAT |  decimal   |  15,2  |   TRUE   | Suma bez DPH                                  |
| amount_vat               | Amount VAT         |  decimal   |  15,2  |  FALSE   | DPH                                           |
| amount_total             | Amount Total       |  decimal   |  15,2  |   TRUE   | Celková hodnota dokladu                       |
| exchange_rate            | Exchange Rate      |  decimal   |  15,2  |   TRUE   | Kurz meny voči hlavnej mene účtovného obdobia |
| id_fin_currency          | Currency           |   lookup   |   11   |   TRUE   | ID meny                                       |
| id_fin_receipt           | Receipt            |   lookup   |   11   |   TRUE   | ID v denníku hlavnej knihy                    |
| is_accounted             | Is Accounted       |  boolean   |   1    |  FALSE   | Je doklad zaúčtovaný                          |

REVIEW DD: id_adios_user premenovane na id_user
REVIEW DD: `number` je velmi vseobecny nazov, zle sa s takym pracuje (vyhladava alebo refaktoruje). Navrhujem 'receipt_number'.

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                        | Relation | OnUpdate | OnDelete |
| :----------------------- | :----------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_fin_cashdesk_account  | [App/Widgets/Finance/Cashdesk/Models/CashdeskAccount](../../../Finance/Cashdesk/Models/CashdeskAccount.md)   |   1:N    | Cascade  | Restrict |
| id_fin_accounting_period | [App/Widgets/Finance/MainBook/Models/AccountingPeriod](../../../Finance/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence  | com_numeric_sequence                                                                                         |   1:N    | Cascade  | Restrict |
| id_com_address           | com_address                                                                                                  |   1:N    | Cascade  | Restrict |
| id_user                  | ADIOS/Core/User                                                                                              |   1:N    | Cascade  | Restrict |
| id_fin_currency          | [App/Widgets/Finance/ExchangeRate/Models/Currency](../../../Finance/ExchangeRate/Models/Currency.md)         |   1:N    | Cascade  | Restrict |
| id_fin_receipt           | fin_receipt                                                                                                  |   1:N    | Cascade  | Restrict |

REVIEW DD: Neviem, aky model pre id_fin_receipt.

### Indexes

| Name                                                         |  Type   |                Column + Order |
| :----------------------------------------------------------- | :-----: | ----------------------------: |
| id                                                           | PRIMARY |                        id ASC |
| date                                                         |  INDEX  |                      date ASC |
| number                                                       |  INDEX  |                    number ASC |
| is_accounted                                                 |  INDEX  |              is_accounted ASC |
| id_fin_cashdesk_account                                      |  INDEX  |   id_fin_cashdesk_account ASC |
| id_fin_accounting_period                                     |  INDEX  |  id_fin_accounting_period ASC |
| id_com_numeric_sequence                                      |  INDEX  |   id_com_numeric_sequence ASC |
| id_com_address                                               |  INDEX  |            id_com_address ASC |
| id_user                                                      |  INDEX  |                   id_user ASC |
| id_fin_currency                                              |  INDEX  |           id_fin_currency ASC |
| id_fin_receipt                                               |  INDEX  |            id_fin_receipt ASC |
| id_fin_accounting_periods___id_com_numeric_sequence___number | UNIQUE  | id_fin_accounting_periods ASC |
|                                                              |         |   id_com_numeric_sequence ASC |
|                                                              |         |                    number ASC |

## Callbacks

### onBeforeInsert

Novy blocek je možné pridať iba s dátumom po poslednej závierke. 

### onAfterInsert

Pri vytváraní noveho blocku je potrebné vytvoriť aj záznam v tabuľke fin_receipts a doklad v nej podrobne rozúčtovať.

### onBeforeUpdate

Blocek po uzávierke nie je možné upraviť.

### onAfterUpdate

Pri zmene blocku skontrolovať, či je doklad správne rozúčtovaný v denníku. Ak nie, otvoriť záznam v denníku.

### onBeforeDelete

Blocek po uzávierke nie je možné vymazať.

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
