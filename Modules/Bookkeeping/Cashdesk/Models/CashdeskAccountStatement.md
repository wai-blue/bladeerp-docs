# Model Bookkeeping/Cashdesk/CashdeskAccountStatement

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

## Introduction

Závierky na pokladničných účtoch.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                   |
| :-------------------- | :-------------------------------------- |
| sqlName               | bkp_cashdesk_account_statements         |
| urlBase               | bookkeeping/cashdesk/account-statements |
| lookupSqlValue        |                                         |
| tableTitle            | Cashdesk Account Statements             |
| formTitleForInserting |                                         |
| formTitleForEditing   |                                         |
| formAddButtonText     | Create Statement                        |
| formSaveButtonText    |                                         |
| crud/browse/action    | Cashdesk/AccountStatements              |
| crud/add/action       | Cashdesk/AccountStatement/AddOrEdit     |
| crud/edit/action      | Cashdesk/AccountStatement/AddOrEdit     |

## Data Structure

| Column                  | Title                      | ADIOS Type | Length | Required | Notes                                   |
| :---------------------- | -------------------------- | :--------: | :----: | :------: | :-------------------------------------- |
| id                      | ID                         |    int     |   11   |   TRUE   | Jedinečné ID záznamu                    |
| id_bkp_cashdesk_account | Cashdesk Account           |   lookup   |   11   |   TRUE   | ID pokladne                             |
| statement_datetime      | Date and Time of Statement |  datetime  |        |   TRUE   | Dátum a čas závierky                    |
| amount_found            | Found Amount               |  decimal   |  15,2  |  FALSE   | Suma, ktorá bola pri závierke zistená   |
| amount_expected         | Expected Amount            |  decimal   |  15,2  |  FALSE   | Suma, ktorá bola pri závierke očakávaná |
| credit                  | Credit                     |  decimal   |  15,2  |  FALSE   | Prebytok                                |
| debet                   | Debet                      |  decimal   |  15,2  |  FALSE   | Manko                                   |
| id_user                 | User                       |   lookup   |   11   |   TRUE   | ID užívateľa, ktorý závierku vykonall   |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                  | Model                                                                                                      | Relation | OnUpdate | OnDelete |
| :---------------------- | :--------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_cashdesk_account | [App/Widgets/Bookkeeping/Cashdesk/Models/CashdeskAccount](../../../Bookkeeping/Cashdesk/Models/CashdeskAccount.md) |   1:N    | Cascade  | Restrict |
| id_user                 | ADIOS/Core/User                                                                                            |   1:N    | Cascade  | Restrict |

### Indexes

| Name                                          |  Type   |               Column + Order |
| :-------------------------------------------- | :-----: | ---------------------------: |
| id                                            | PRIMARY |                       id ASC |
| id_bkp_cashdesk_account                       |  INDEX  |  id_bkp_cashdesk_account ASC |
| id_user                                       |  INDEX  |                  id_user ASC |
| statement_datetime                            |  INDEX  |       statement_datetime ASC |
| id_bkp_cashdesk_accounts___statement_datetime | UNIQUE  | id_bkp_cashdesk_accounts ASC |
|                                               |         |       statement_datetime ASC |

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
