# CreditNotePayment

## Introduction

Tabuľka bude slúžiť na evidenciu úhrad dobropisov.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                             |
| :-------------------- | :------------------------------------------------ |
| sqlName               | fin_credit_note_payments                          |
| urlBase               | finance/credit-note/{id_fin_credit_note}/payments |
| lookupSqlValue        | -                                                 |
| tableTitle            | Payments                                          |
| formTitleForInserting | New Payment                                       |
| formTitleForEditing   | Payment                                           |

## SQL Structure

| Column             | Description          |  Type   | Length |   NULL   | Default |
| :----------------- | :------------------- | :-----: | :----: | :------: | :------ |
| id                 | Jedinečné ID záznamu |   INT   |   8    | NOT NULL |         |
| id_fin_credit_note | ID dobropisu         |   INT   |   8    | NOT NULL |         |
| date               | Dátum úhrady         |  DATE   |   8    | NOT NULL |         |
| price              | Uhradená suma        | DECIMAL |  15,2  | NOT NULL |         |

## Columns

* id_fin_credit_note:
    * required: true
    * type: lookup
    * title: CreditNote
    * model: App/Widgets/Finance/CreditNote/Models/CreditNote
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* date:
    * required: true
    * type: date
    * title: Payment Date
    * required: true
    * showColumn: true
* price:
    * required: true
    * type: float
    * title: Payment Price
    * byte_size: 15
    * decimals: 2
    * showColumn: true

## Foreign Keys

| Column             | Parent table     | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------- | :------: | :------: | :------: |
| id_fin_credit_note | fin_credit_notes |   1:N    | Cascade  | Restrict |

## Indexes

| Name | Type    | Column + Order |
| :--- | :------ | :------------- |
| id   | PRIMARY | id ASC         |

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
