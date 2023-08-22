# Model Finance/CreditNote/CreditNoteItemService

REVIEW DD: Model premenovany z CreditNoteLineService na CreditNoteItemService

## Introduction

Tabuľka bude slúžiť na prepojenie položiek dobropisov so službami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                           |
| :-------------------- | :------------------------------------------------------------------------------ |
| sqlName               | fin_credit_note_item_services                                                   |
| urlBase               | finance/credit-note/{id_fin_credit_note}/item/{id_fin_credit_note_item}/service |
| lookupSqlValue        | -                                                                               |
| tableTitle            | Item Services                                                                   |
| formTitleForInserting | New Item Service                                                                |
| formTitleForEditing   | Item Service                                                                    |
| isCrossTable          | TRUE                                                                            |

REVIEW DD: pridane isCrossTable

## Data Structure

| Column                  | Title            | ADIOS Type | Length | Required | Notes                |
| :---------------------- | ---------------- | :--------: | :----: | :------: | :------------------- |
| id_fin_credit_note_item | Credit Note Item |   lookup   |   8    |   TRUE   | ID položky dobropisu |
| id_ser_service          | Service          |   lookup   |   8    |   TRUE   | ID služby            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                  | Model                                                | Relation | OnUpdate | OnDelete |
| :---------------------- | :--------------------------------------------------- | :------: | -------- | -------- |
| id_fin_credit_note_item | App/Widgets/Finance/CreditNote/Models/CreditNoteItem |   1:N    | Cascade  | Cascade  |
| id_ser_service          | App/Widgets/Warehouse/Products/Models/Service        |   1:N    | Cascade  | Restrict |

### Indexes

| Name                    |  Type   |              Column + Order |
| :---------------------- | :-----: | --------------------------: |
| id                      | PRIMARY |                      id ASC |
| id_fin_credit_note_item |  INDEX  | id_fin_credit_note_item ASC |
| id_ser_service          |  INDEX  |          id_ser_service ASC |

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
