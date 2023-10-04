# Model Bookkeeping/CreditNote/CreditNotePayment

## Introduction

Tabuľka bude slúžiť na evidenciu úhrad dobropisov.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                 |
| :-------------------- | :---------------------------------------------------- |
| storeRecordInfo       | TRUE                                                  |
| sqlName               | bkp_credit_note_payments                              |
| urlBase               | bookkeeping/credit-note/{id_bkp_credit_note}/payments |
| lookupSqlValue        |                                                       |
| tableTitle            | Payments                                              |
| formTitleForInserting | New Payment                                           |
| formTitleForEditing   | Payment                                               |
| crud/browse/action    | Bookkeeping/CreditNote/CreditNotePayments             |
| crud/add/action       | Bookkeeping/CreditNote/CreditNotePayment/Add          |
| crud/edit/action      | Bookkeeping/CreditNote/CreditNotePayment/Edit         |

## Data Structure

| Column             | Title          | ADIOS Type | Length | Required | Notes                                      |
| :----------------- | -------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                 |                |    int     |   8    |   TRUE   | Unique record ID                       |
| record_info        | Record Info    |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_bkp_credit_note | Credit Note    |   lookup   |   8    |   TRUE   | ID dobropisu                               |
| payment_date       | Payment Date   |    date    |   8    |   TRUE   | Dátum úhrady                               |
| payment_amount     | Payment Amount |  decimal   |  15,2  |   TRUE   | Uhradená suma                              |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column             | Model                                                | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_credit_note | App/Widgets/Bookkeeping/CreditNote/Models/CreditNote |   1:N    | Cascade  | Restrict |

### Indexes

| Name               |  Type   |         Column + Order |
| :----------------- | :-----: | ---------------------: |
| id                 | PRIMARY |                 id ASC |
| id_bkp_credit_note |  INDEX  | id_bkp_credit_note ASC |
| payment_date       |  INDEX  |       payment_date ASC |
|                    |         |                        |

## Callbacks

### onBeforeInsert

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu dobropisu.

### onAfterInsert

Not used.

### onBeforeUpdate

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu dobropisu.

### onAfterUpdate

Not used.

### onBeforeDelete

Not used.

### onAfterDelete

Not used.

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
