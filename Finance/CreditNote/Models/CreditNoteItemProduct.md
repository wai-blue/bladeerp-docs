# Model Finance/CreditNote/CreditNoteIProduct

REVIEW DD: Model premenovany z CreditNoteLineProduct na CreditNoteItemProduct

## Introduction

Tabuľka bude slúžiť na prepojenie položiek dobropisov s produktami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                           |
| :-------------------- | :------------------------------------------------------------------------------ |
| sqlName               | fin_credit_note_item_products                                                   |
| urlBase               | finance/credit-note/{id_fin_credit_note}/item/{id_fin_credit_note_item}/product |
| lookupSqlValue        | {%TABLE%}.name                                                                  |
| tableTitle            | Item Products                                                                   |
| formTitleForInserting | New Item Product                                                                |
| formTitleForEditing   | Item Product                                                                    |
| isCrossTable          | TRUE                                                                            |

REVIEW DD: pridane isCrossTable

## Data Structure

| Column                  | Title            | ADIOS Type | Length | Required | Notes                |
| :---------------------- | ---------------- | :--------: | :----: | :------: | :------------------- |
| id_fin_credit_note_item | Credit Note Item |   lookup   |   8    |   TRUE   | ID položky dobropisu |
| id_war_product          | Product          |   lookup   |   8    |   TRUE   | ID produktu          |

REVIEW DD: id_whs_product?

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                  | Model                                                | Relation | OnUpdate | OnDelete |
| :---------------------- | :--------------------------------------------------- | :------: | -------- | -------- |
| id_fin_credit_note_item | App/Widgets/Finance/CreditNote/Models/CreditNoteItem |   1:N    | Cascade  | Cascade  |
| id_war_product          | App/Widgets/Warehouse/Products/Models/Product        |   1:N    | Cascade  | Restrict |

### Indexes

| Name                    |  Type   |              Column + Order |
| :---------------------- | :-----: | --------------------------: |
| id                      | PRIMARY |                      id ASC |
| id_fin_credit_note_item |  INDEX  | id_fin_credit_note_item ASC |
| id_war_product          |  INDEX  |          id_war_product ASC |

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
