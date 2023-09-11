# Model Bookkeeping/Claim/ClaimHasAccount

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávky s účtovnou osnovou.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                    |
| :-------------------- | :--------------------------------------- |
| isJunctionTable       | TRUE                                     |
| storeRecordInfo       | FALSE                                    |
| sqlName               | bkp_claim_accounts                       |
| urlBase               | bookkeeping/claim/{id_bkp_claim}/account |
| lookupSqlValue        | {%TABLE%}.name                           |
| tableTitle            | Claim Accounts                           |
| formTitleForInserting | New Claim Account                        |
| formTitleForEditing   | Claim Account                            |
| crud/browse/action    | Bookkeeping/Claim/ClaimHasAccounts       |
| crud/add/action       | Bookkeeping/Claim/ClaimHasAccount/Add    |
| crud/edit/action      | Bookkeeping/Claim/ClaimHasAccount/Edit   |

## Data Structure

| Column              | Title        | ADIOS Type | Length | Required | Notes                     |
| :------------------ | ------------ | :--------: | :----: | :------: | :------------------------ |
| id_bkp_claim        | Claim        |   lookup   |   8    |   TRUE   | ID pohľadávky             |
| id_bkp_book_account | Book Account |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy |
| amount              | Amount       |  decimal   |  15,2  |   TRUE   | Hodnota                   |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                               | Relation | OnUpdate | OnDelete |
| :------------------ | :-------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_claim        | App/Widgets/Bookkeeping/Claim/Models/Claim          |   1:N    | Cascade  | Restrict |
| id_bkp_book_account | App/Widgets/Bookkeeping/MainBook/Models/BookAccount |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |
| id_bkp_claim        |  INDEX  |        id_bkp_claim ASC |
| id_bkp_book_account |  INDEX  | id_bkp_book_account ASC |

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

Aktualizovať hodnotu v hlavnej knihe - tabuľka **bkp_book_accounts**.

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
