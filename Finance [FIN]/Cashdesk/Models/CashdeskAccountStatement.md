# CashdeskAccountStatement

## Introduction

Závierky na pokladničných účtoch.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property               | Value     |
| :-------------------- | :---------------------------------- |
| sqlName               | fin_cashdesk_account_statements     |
| urlBase               | finance/cashdesk/account-statements |
| lookupSqlValue        | -                                   |
| tableTitle            | Cashdesk Account Statements         |
| formTitleForInserting | -                                   |
| formTitleForEditing   | -                                   |
| formAddButtonText     | Create Statement                    |
| formSaveButtonText    | -                                   |

## SQL Structure

| Názov                | Title                   | Popis                                   | Typ      | Dĺžka | Povinný |
| :------------------- | :---------------------- | :-------------------------------------- | :------- | :---- | :------ |
| id                   | ID                      | Jedinečné ID záznamu                    | INT      | 11    | Y       |
| fin_cashdesk_account | Cashdesk Account        | ID pokladne                             | INT      | 11    | Y       |
| datetime_statement   | Date and Time Statement | Dátum a čas závierky                    | DATETIME |       | Y       |
| amount_found         | Found Amount            | Suma, ktorá bola pri závierke zistená   | DECIMAL  | 15,2  | N       |
| amount_expected      | Expected Amount         | Suma, ktorá bola pri závierke očakávaná | DECIMAL  | 15,2  | N       |
| credit               | Credit                  | Prebytok                                | DECIMAL  | 15,2  | N       |
| debet                | Debet                   | Manko                                   | DECIMAL  | 15,2  | N       |
| id_adios_user        | User                    | ID užívateľa, ktorý závierku vykonall   | INT      | 11    | Y       |


## Foreign Keys

| Stĺpec                   | Parent tabuľka        | Väzba | OnUpdate | OnDelete |
| :----------------------- | :-------------------- | :---- | :------- | :------- |
| id_fin_cashdesk_accounts | fin_cashdesk_accounts | 1:N   | Cascade  | Restrict |
| id_adios_user            | adios_user            | 1:N   | Cascade  | Restrict |

## Indexes

| Názov                                       | Typ     | Stĺpec                   | Zoradenie |
| :------------------------------------------ | :------ | :----------------------- | :-------- |
| id                                          | PRIMARY | id                       | ASC       |
| datetime_statement                          | INDEX   | datetime_statement       | ASC       |
| id_fin_cashdesk_accounts_datetime_statement | UNIQUE  | id_fin_cashdesk_accounts | ASC       |
|                                             |         | datetime_statement       | ASC       |

## Columns


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
