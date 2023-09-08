# Model Bookkeeping/Liability/LiabilityAccount

## Introduction

Tabuľka bude slúžiť na prepojenie záväzku s účtovnou osnovou.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                            |
| :-------------------- | :----------------------------------------------- |
| storeRecordInfo       | TRUE                                             |
| sqlName               | bkp_liability_accounts                           |
| urlBase               | bookkeeping/liability/{id_bkp_liability}/account |
| lookupSqlValue        |                                                  |
| tableTitle            | Liability Accounts                               |
| formTitleForInserting | New Liability Account                            |
| formTitleForEditing   | Liability Account                                |
| crud/browse/action    | Bookkeeping/Liability/LiabilitAccounts           |
| crud/add/action       | Bookkeeping/Liability/LiabilitAccount/Add        |
| crud/edit/action      | Bookkeeping/Liability/LiabilitAccount/Edit       |

## Data Structure

| Column              | Title       | ADIOS Type | Length | Required | Notes                                      |
| :------------------ | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                  |             |    int     |   8    |   TRUE   | Unique record ID                       |
| record_info         | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_bkp_liability    | Liability   |   lookup   |   8    |   TRUE   | ID záväzku                                 |
| id_bkp_book_account | Account     |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy                  |
| amount              | Amount      |  decimal   |  15,2  |   TRUE   | Hodnota                                    |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                               | Relation | OnUpdate | OnDelete |
| :------------------ | :-------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_liability    | App/Widgets/Bookkeeping/Liability/Models/Liability  |   1:N    | Cascade  | Restrict |
| id_bkp_book_account | App/Widgets/Bookkeeping/MainBook/Models/BookAccount |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |    Column + Order |
| :------------------ | :-----: | ----------------: |
| id                  | PRIMARY |            id ASC |
| id_bkp_liability    |  INDEX  | id_updated_by ASC |
| id_bkp_book_account |  INDEX  | id_updated_by ASC |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Aktualizovať hodnotu v hlavnej knihe - tabuľka **bkp_book_accounts**.

### onBeforeUpdate

Not used.

### onAfterUpdate

Aktualizovať hodnotu v hlavnej knihe - tabuľka **bkp_book_accounts**.

### onBeforeDelete

Not used.

### onAfterDelete

Aktualizovať hodnotu v hlavnej knihe - tabuľka bkp_book_accounts.

## Formatters

V tomto modeli nie sú použité formátery.

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
