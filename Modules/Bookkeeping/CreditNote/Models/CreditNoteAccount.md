# Model Bookkeeping/CreditNote/CreditNoteAccount

## Introduction

Tabuľka bude slúžiť na prepojenie dobropisu s účtovnou osnovou.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                |
| :-------------------- | :--------------------------------------------------- |
| storeRecordInfo       | TRUE                                                 |
| sqlName               | bkp_credit_note_accounts                             |
| urlBase               | bookkeeping/credit-note/{id_bkp_credit_note}/account |
| lookupSqlValue        |                                                      |
| tableTitle            | CreditNote Accounts                                  |
| formTitleForInserting | New CreditNote Account                               |
| formTitleForEditing   | CreditNote Account                                   |
| crud/browse/action    | Bookkeeping/CreditNote/CreditNoteAccounts            |
| crud/add/action       | Bookkeeping/CreditNote/CreditNoteAccount/Add         |
| crud/edit/action      | Bookkeeping/CreditNote/CreditNoteAccount/Edit        |

REVIEW DD: isJunctionTable?

## Data Structure

| Column              | Title        | ADIOS Type | Length | Required | Notes                                      |
| :------------------ | ------------ | :--------: | :----: | :------: | :----------------------------------------- |
| id                  |              |    int     |   8    |   TRUE   | Unique record ID                       |
| record_info         | Record Info  |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_bkp_credit_note  | Credit Note  |   lookup   |   8    |   TRUE   | ID dobropisu                               |
| id_bkp_book_account | Book Account |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy                  |
| amount              | Amount       |  decimal   |  15,2  |   TRUE   | Hodnota                                    |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                            | Relation | OnUpdate | OnDelete |
| :------------------ | :----------------------------------------------- | :------: | -------- | -------- |
| id_bkp_credit_note  | App/Widgets/Bookkeeping/CreditNote/Models/CreditNote |   1:N    | Cascade  | Restrict |
| id_bkp_book_account | App/Widgets/Bookkeeping/MainBook/Models/BookAccount  |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |
| id_bkp_credit_note  |  INDEX  |  id_bkp_credit_note ASC |
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
