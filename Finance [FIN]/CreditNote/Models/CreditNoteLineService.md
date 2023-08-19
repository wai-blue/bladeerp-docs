# CreditNoteLineService

## Introduction

Tabuľka bude slúžiť na prepojenie položiek dobropisov so službami.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                                                           |
| :-------------------- | :------------------------------------------------------------------------------ |
| sqlName               | fin_credit_note_line_services                                                   |
| urlBase               | finance/credit-note/{id_fin_credit_note}/line/{id_fin_credit_note_line}/service |
| lookupSqlValue        | -                                                                               |
| tableTitle            | Line Services                                                                   |
| formTitleForInserting | New Line Service                                                                |
| formTitleForEditing   | Line Service                                                                    |

## SQL Structure

| Column                  | Description          | Type | Length |   NULL   | Default |
| :---------------------- | :------------------- | :--: | :----: | :------: | :------ |
| id_fin_credit_note_line | ID položky dobropisu | INT  |   8    | NOT NULL |         |
| id_ser_service          | ID služby            | INT  |   8    | NOT NULL |         |

## Columns

* id_fin_credit_note_line:
    * required: true
    * type: lookup
    * title: ID CreditNote Line
    * model: Widgets/Finance/CreditNote/Models/CreditNoteLine
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* id_ser_service:
    * required: true
    * type: lookup
    * title: Service
    * model: Widgets/Warehouse/Products/Models/Service
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true

## Foreign Keys

| Column                  | Parent table          | Relation | OnUpdate | OnDelete |
| :---------------------- | :-------------------- | :------: | :------: | :------: |
| id_fin_credit_note_line | fin_credit_note_lines |   1:N    | Cascade  | Cascade  |
| id_ser_service          | ser_services          |   1:N    | Cascade  | Restrict |

## Indexes

Tabuľka nemá iné indexy.

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
