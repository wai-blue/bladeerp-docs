# Model Bookkeeping/Banks/AccountStatement

## Introduction

Táto tabuľka slúži na ukladanie závierok na bankových účtoch.

Závierky na bankových účtoch slúžia na kontrolu zostatku na bankovom účte voči zaúčtovanému zostatku.

Môžu sa robiť na dennej aj na mesačnej báze.

REVIEW DD: Zavierky robi automat alebo sa robia rucne cez UI?

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                                         |
| :--------------------- | :-------------------------------------------- |
| storeRecordInfo        | TRUE                                          |
| sqlName                | bkp_bank_account_statements                   |
| urlBase                | bookkeeping/banks/account-statements          |
| lookupSqlValue         |                                               |
| tableTitle             | Bank Account Statements                       |
| formTitleForInserting  |                                               |
| formTitleForEditing    |                                               |
| formAddButtonText      | Create Statement                              |
| formSaveButtonText     |                                               |
| crud/browse/controller | Bookkeeping/Banks/Account/Statements          |
| crud/add/controller    | Bookkeeping/Banks/Account/Statement/AddOrEdit |
| crud/edit/controller   | Bookkeeping/Banks/Account/Statement/AddOrEdit |

## Data Structure

| Column              | Title                   | ADIOS Type | Length | Required | Notes                                   |
| :------------------ | ----------------------- | :--------: | :----: | :------: | :-------------------------------------- |
| id                  | ID                      |    int     |   11   |   TRUE   | Unique record ID                    |
| record_info         | Record Info             |    json    |        |   TRUE   |                                         |
| id_bkp_bank_account | Bank Account            |   lookup   |   11   |   TRUE   | ID bankového účtu                       |
| statement_datetime  | Date and Time Statement |  datetime  |        |   TRUE   | Dátum a čas závierky                    |
| amount_found        | Found Amount            |  decimal   |  15,2  |  FALSE   | Suma, ktorá bola pri závierke zistená   |
| amount_expected     | Expected Amount         |  decimal   |  15,2  |  FALSE   | Suma, ktorá bola pri závierke očakávaná |
| credit              | Credit                  |  decimal   |  15,2  |  FALSE   | Prebytok                                |
| debet               | Debet                   |  decimal   |  15,2  |  FALSE   | Manko                                   |
| id_user             | User                    |   lookup   |   11   |   TRUE   | ID užívateľa, ktorý závierku vykonall   |


### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                        | Relation | OnUpdate | OnDelete |
| :------------------ | :------------------------------------------- | :------: | -------- | -------- |
| id_bkp_bank_account | App/Widgets/Bookkeeping/Banks/Models/Account |   1:N    | Cascade  | Cascade  |
| id_user             | ADIOS/Core/Models/User                       |   1:N    | Cascade  | Restrict |

### Indexes

| Name                                    |  Type   |          Column + Order |
| :-------------------------------------- | :-----: | ----------------------: |
| id                                      | PRIMARY |                  id ASC |
| id_bkp_bank_account                     |  INDEX  | id_bkp_bank_account ASC |
| statement_datetime                      |  INDEX  |  statement_datetime ASC |
| id_user                                 |  INDEX  |             id_user ASC |
| id_bkp_bank_account__statement_datetime | UNIQUE  | id_bkp_bank_account ASC |
|                                         |         |  statement_datetime ASC |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Po vytvorení závierky sa vypočíta zostatok na účte, ktorý sa zapíše do stĺpca amount_found.
Podľa rozdielu medzi stĺpcami amount_found a amount_expected sa zapíše rozdiel do stĺpcov credit alebo debet.

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
