# BankAccountStatement

## Introduction

Táto tabuľka slúži na ukladanie závierok na bankových účtoch. Závierky na bankových účtoch slúžia na kontrolu zostatku na bankovom účte voči zaúčtovanému zostatku. Môžu sa robiť na dennej aj na mesačnej báze.

## Constants
V modeli nie sú použité konštanty.

## Properties

| Property              | Value                           |
| :-------------------- | :------------------------------ |
| sqlName               | fin_bank_account_statements     |
| urlBase               | finance/bank/account-statements |
| lookupSqlValue        | -                               |
| tableTitle            | Bank Account Statements         |
| formTitleForInserting | -                               |
| formTitleForEditing   | -                               |
| formAddButtonText     | Create Statement                |
| formSaveButtonText    | -                               |

## SQL Structure

REVIEW DD: V Google Docs bola struktura tejto tabulka ina, ako v napr. v MainBook.

| Názov               | Title                   | Popis                                   | Typ      | Dĺžka | Povinný |
| :------------------ | :---------------------- | :-------------------------------------- | :------- | :---- | :------ |
| id                  | ID                      | Jedinečné ID záznamu                    | INT      | 11    | Y       |
| id_fin_bank_account | Bank Account            | ID bankového účtu                       | INT      | 11    | Y       |
| datetime_statement  | Date and Time Statement | Dátum a čas závierky                    | DATETIME |       | Y       |
| amount_found        | Found Amount            | Suma, ktorá bola pri závierke zistená   | DECIMAL  | 15,2  | N       |
| amount_expected     | Expected Amount         | Suma, ktorá bola pri závierke očakávaná | DECIMAL  | 15,2  | N       |
| credit              | Credit                  | Prebytok                                | DECIMAL  | 15,2  | N       |
| debet               | Debet                   | Manko                                   | DECIMAL  | 15,2  | N       |
| id_user             | User                    | ID užívateľa, ktorý závierku vykonall   | INT      | 11    | Y       |

TODO: Dusan 16.8. 2023: id_adios_user som premenoval na id_user

## Foreign Keys
[Model neobsahuje cudzie kľúče.]
| Column              | Parent table           | Relation | OnUpdate | OnDelete |
| :------------------ | :--------------------- | :------: | -------- | -------- |
| id_fin_bank_account | fin_accounting_periods |   1:N    | Cascade  | Cascade  |
| id_user             | users                  |   1:N    | Cascade  | Restrict |

## Indexes
[Pre túto tabuľku nie sú definované indexy.]
| Name                                   |  Type   |          Column + Order |
| :------------------------------------- | :-----: | ----------------------: |
| id                                     | PRIMARY |                  id ASC |
| datetime_statement                     |  INDEX  |  datetime_statement ASC |
| id_fin_bank_account_datetime_statement | UNIQUE  | id_fin_bank_account ASC |
|                                        |         |  datetime_statement ASC |

## Columns

REVIEW DD: V Google Docs nebola definicia ADIOS columns.

## Callbacks

### onBeforeInsert
Not used.

### onAfterInsert
Po vytvorení závierky sa vypočíta zostatok na účte, ktorý sa zapíše do stĺpca amount_found. Podľa rozdielu medzi stĺpcami amount_found a amount_expected sa zapíše rozdiel do stĺpcov credit alebo debet.

### onBeforeUpdate
Not used.

### onAfterUpdate
Not used.

### onBeforeDelete
Je možné vymazať iba poslednú závierku.

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
