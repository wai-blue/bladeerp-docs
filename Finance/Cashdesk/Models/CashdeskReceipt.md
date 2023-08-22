# CashdeskReceipt

TODO: V yml prerobit z CashdeskDocument.

## Introduction

Pohyby na pokladnicnych uctoch.

## Constants
V modeli nie sú použité konštanty.

## Properties

| Property              | Value                     |
| :-------------------- | :------------------------ |
| sqlName               | fin_cashdesk_receipts     |
| urlBase               | finance/cashdesk/receipts |
| lookupSqlValue        | -                         |
| tableTitle            | Cashdesk Receipt          |
| formTitleForInserting | New Cashdesk Receipt      |
| formTitleForEditing   | Cashdesk Receipt          |
| formAddButtonText     | Add Receipt               |
| formSaveButtonText    | Update Receipt            |

## SQL Structure

| Názov                    | Title              | Popis                                         | Typ     | Dĺžka | Povinný |
| :----------------------- | :----------------- | :-------------------------------------------- | :------ | :---- | :------ |
| id                       | ID                 | Jedinečné ID záznamu                          | INT     | 11    | Y       |
| id_fin_cashdesk_account  | Cashdesk Account   | ID pokladne                                   | INT     | 11    | Y       |
| id_fin_accounting_period | Account Period     | ID účtovného obdobia                          | INT     | 11    | Y       |
| id_com_numeric_sequence  | Document Type      | ID typu dokumentu                             | INT     | 11    | Y       |
| id_com_address           | Partner            | ID adresára                                   | INT     | 11    | Y       |
| id_adios_user            | User               | ID užívateľa, ktorý doklad vystavil           | INT     | 11    | Y       |
| date                     | Creation Date      | Dátum vystavenia pokladničného dokladu        | DATE    | 8     | Y       |
| number                   | Number             | Poradové číslo dokladu                        | INT     | 8     | Y       |
| description              | Description        | Popis dokladu                                 | TEXT    |       | N       |
| amount_without_vat       | Amount Without VAT | Suma bez DPH                                  | DECIMAL | 15,2  | Y       |
| amount_vat               | Amount VAT         | DPH                                           | DECIMAL | 15,2  | N       |
| amount_total             | Amount Total       | Celková hodnota dokladu                       | DECIMAL | 15,2  | Y       |
| exchange_rate            | Exchange Rate      | Kurz meny voči hlavnej mene účtovného obdobia | DECIMAL | 15,2  | Y       |
| id_fin_currency          | Currency           | ID meny                                       | INT     | 11    | Y       |
| id_fin_receipt           | Receipt            | ID v denníku hlavnej knihy                    | INT     | 11    | Y       |
| is_accounted             | Is Accounted       | Je doklad zaúčtovaný                          | BOOL    | 1     | N       |


## Foreign Keys

| Stĺpec                   | Parent tabuľka         | Väzba | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :---- | :------- | :------- |
| id_fin_cashdesk_account  | fin_cashdesk_accounts  | 1:N   | Cascade  | Restrict |
| id_fin_accounting_period | fin_accounting_periods | 1:N   | Cascade  | Restrict |
| id_com_numeric_sequence  | com_numeric_sequence   | 1:N   | Cascade  | Restrict |
| id_com_address           | com_address            | 1:N   | Cascade  | Restrict |
| id_adios_user            | adios_user             | 1:N   | Cascade  | Restrict |
| id_fin_currency          | fin_currencies         | 1:N   | Cascade  | Restrict |
| id_fin_receipt           | fin_receipt            | 1:N   | Cascade  | Restrict |

## Indexes

| Názov                                                    | Typ     | Stĺpec                    | Zoradenie |
| :------------------------------------------------------- | :------ | :------------------------ | :-------- |
| id                                                       | PRIMARY | id                        | ASC       |
| date                                                     | INDEX   | date                      | ASC       |
| id_fin_accounting_periods_id_com_numeric_sequence_number | UNIQUE  | id_fin_accounting_periods | ASC       |
|                                                          |         | id_com_numeric_sequence   | ASC       |
|                                                          |         | number                    | ASC       |

## Columns


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
