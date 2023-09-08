# Model Bookkeeping/CreditNote/CreditNoteVat

## Introduction

Tabuľka bude slúžiť na ukladanie DPH k dobropisu.

## Constants

No constants are defined for this model.

## Properties

| Property           | Value                                             |
| :----------------- | :------------------------------------------------ |
| storeRecordInfo    | TRUE                                              |
| sqlName            | bkp_credit_note_vats                              |
| urlBase            | bookkeeping/credit-note/{id_bkp_credit_note}/vats |
| lookupSqlValue     | {%TABLE%}.name                                    |
| tableTitle         | VATs                                              |
| crud/browse/action | Bookkeeping/CreditNote/CreditNoteVats             |
| crud/add/action    | Bookkeeping/CreditNote/CreditNoteVat/Add          |
| crud/edit/action   | Bookkeeping/CreditNote/CreditNoteVat/Edit         |

## Data Structure

| Column             | Title          | ADIOS Type | Length | Required | Notes                                      |
| :----------------- | -------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                 |                |    int     |   8    | NOT NULL | Unique record ID                       |
| record_info        | Record Info    |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_bkp_credit_note | CreditNote     |   lookup   |   8    | NOT NULL | ID dobropisu                               |
| id_bkp_vat         | VAT Rate       |   lookup   |   8    | NOT NULL | ID sadzby DPH                              |
| price_excl_vat     | Price Excl VAT |  decimal   |  15,2  | NOT NULL | Suma bez DPH                               |
| price_vat          | Price VAT      |  decimal   |  15,2  | NOT NULL | Suma DPH                                   |
| price_incl_vat     | Price Incl VAT |  decimal   |  15,2  | NOT NULL | Suma s DPH                                 |

REVIEW DD: Nie je lepsie VAT sadzbu ukladat ako decimal? Ak to dame ako Decimal, moze sa nastavit parameter unit = "%".

### ADIOS Parameters

| Column              | Parameter   | Value                                     |
| :------------------ | :---------- | ----------------------------------------- |
| price_excl_vat      | unit        | €                                         |
| price_vat           | unit        | €                                         |
| price_incl_vat      | unit        | €                                         |

### Foreign Keys

| Column             | Model                                                | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_credit_note | App/Widgets/Bookkeeping/CreditNote/Models/CreditNote |   1:N    | Cascade  | Cascade  |
| id_bkp_vat         | App/Widgets/Bookkeeping/MainBook/Models/Vat          |   1:N    | Cascade  | Restrict |

### Indexes

| Name                            | Type    | Column + Order         |
| :------------------------------ | :------ | :--------------------- |
| id                              | PRIMARY | id ASC                 |
| id_bkp_credit_note              | INDEX   | id_bkp_credit_note ASC |
| id_bkp_vat                      | INDEX   | id_bkp_vat ASC         |
| id_bkp_credit_note___id_bkp_vat | UNIQUE  | id_bkp_credit_note ASC |
|                                 |         | id_bkp_vat ASC         |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Not used.

### onBeforeUpdate

Not used.

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
