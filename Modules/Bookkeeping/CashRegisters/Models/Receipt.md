# Model Bookkeeping/CashRegisters/Receipt

## Introduction

Pohyby na pokladnicnych uctoch.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                               |
| :-------------------- | :---------------------------------- |
| storeRecordInfo       | TRUE                                |
| sqlName               | bkp_cash_register_receipts           |
| urlBase               | bookkeeping/cash-registers/receipts |
| lookupSqlValue        |                                     |
| tableTitle            | Cashdesk Receipt                    |
| formTitleForInserting | New Cashdesk Receipt                |
| formTitleForEditing   | Cashdesk Receipt                    |
| formAddButtonText     | Add Receipt                         |
| formSaveButtonText    | Update Receipt                      |
| crud/browse/action    | Bookkeeping/CashRegisters/Receipts       |
| crud/add/action       | Bookkeeping/CashRegisters/Receipt/Add    |
| crud/edit/action      | Bookkeeping/CashRegisters/Receipt/Edit   |

## Data Structure

| Column                      | Title              | ADIOS Type | Length | Required | Notes                                         |
| :-------------------------- | ------------------ | :--------: | :----: | :------: | :-------------------------------------------- |
| id                          | ID                 |    int     |   11   |   TRUE   | Unique record ID                              |
| record_info                 | Record Info        |    json    |        |   TRUE   |                                               |
| id_bkp_cash_register_account | Cashdesk Account   |   lookup   |   11   |   TRUE   | ID pokladne                                   |
| id_bkp_accounting_period    | Account Period     |   lookup   |   11   |   TRUE   | ID účtovného obdobia                          |
| id_com_numeric_sequence     | Document Type      |   lookup   |   11   |   TRUE   | ID typu dokumentu                             |
| id_com_contact              | Partner            |   lookup   |   11   |   TRUE   | ID adresára                                   |
| id_user                     | User               |   lookup   |   11   |   TRUE   | ID užívateľa, ktorý doklad vystavil           |
| issue_date                  | Issue Date         |    date    |   8    |   TRUE   | Dátum vystavenia pokladničného dokladu        |
| receipt_number              | Number             |    int     |   8    |   TRUE   | Poradové číslo dokladu                        |
| description                 | Description        |    text    |        |  FALSE   | Popis dokladu                                 |
| amount_without_vat          | Amount Without VAT |  decimal   |  15,2  |   TRUE   | Suma bez DPH                                  |
| amount_vat                  | Amount VAT         |  decimal   |  15,2  |  FALSE   | DPH                                           |
| amount_total                | Amount Total       |  decimal   |  15,2  |   TRUE   | Celková hodnota dokladu                       |
| exchange_rate               | Exchange Rate      |  decimal   |  15,2  |   TRUE   | Kurz meny voči hlavnej mene účtovného obdobia |
| id_bkp_currency             | Currency           |   lookup   |   11   |   TRUE   | ID meny                                       |
| id_bkp_receipt              | Receipt            |   lookup   |   11   |   TRUE   | ID v denníku hlavnej knihy                    |
| is_accounted                | Is Accounted       |  boolean   |   1    |  FALSE   | Je doklad zaúčtovaný                          |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                      | Model                                                   | Relation | OnUpdate | OnDelete |
| :-------------------------- | :------------------------------------------------------ | :------: | -------- | -------- |
| id_bkp_cash_register_account | App/Widgets/Bookkeeping/CashRegisters/Models/Account |   1:N    | Cascade  | Restrict |
| id_bkp_accounting_period    | App/Widgets/Bookkeeping/Books/Models/AccountingPeriod   |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence     | com_numeric_sequence                                    |   1:N    | Cascade  | Restrict |
| id_com_contact              | com_contact                                             |   1:N    | Cascade  | Restrict |
| id_user                     | ADIOS/Core/Models/User                                  |   1:N    | Cascade  | Restrict |
| id_bkp_currency             | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency    |   1:N    | Cascade  | Restrict |
| id_bkp_receipt              | bkp_receipt                                             |   1:N    | Cascade  | Restrict |

REVIEW DD: Neviem, aky model pre id_bkp_receipt.

### Indexes

| Name                                                                 |  Type   |                  Column + Order |
| :------------------------------------------------------------------- | :-----: | ------------------------------: |
| id                                                                   | PRIMARY |                          id ASC |
| issue_date                                                           |  INDEX  |                  issue_date ASC |
| receipt_number                                                       |  INDEX  |              receipt_number ASC |
| is_accounted                                                         |  INDEX  |                is_accounted ASC |
| id_bkp_cash_register_account                                          |  INDEX  | id_bkp_cash_register_account ASC |
| id_bkp_accounting_period                                             |  INDEX  |    id_bkp_accounting_period ASC |
| id_com_numeric_sequence                                              |  INDEX  |     id_com_numeric_sequence ASC |
| id_com_contact                                                       |  INDEX  |              id_com_contact ASC |
| id_user                                                              |  INDEX  |                     id_user ASC |
| id_bkp_currency                                                      |  INDEX  |             id_bkp_currency ASC |
| id_bkp_receipt                                                       |  INDEX  |              id_bkp_receipt ASC |
| id_bkp_accounting_periods___id_com_numeric_sequence___receipt_number | UNIQUE  |   id_bkp_accounting_periods ASC |
|                                                                      |         |     id_com_numeric_sequence ASC |
|                                                                      |         |              receipt_number ASC |

## Callbacks

### onBeforeInsert

Novy blocek je možné pridať iba s dátumom po poslednej závierke. 

### onAfterInsert

Pri vytváraní noveho blocku je potrebné vytvoriť aj záznam v tabuľke bkp_receipts a doklad v nej podrobne rozúčtovať.

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
