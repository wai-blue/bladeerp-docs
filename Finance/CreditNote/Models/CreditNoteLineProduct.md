# CreditNoteLineProduct

## Introduction

Tabuľka bude slúžiť na prepojenie položiek dobropisov s produktami.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                                                           |
| :-------------------- | :------------------------------------------------------------------------------ |
| sqlName               | fin_credit_note_line_products                                                   |
| urlBase               | finance/credit-note/{id_fin_credit_note}/line/{id_fin_credit_note_line}/product |
| lookupSqlValue        | {%TABLE%}.name                                                                  |
| tableTitle            | Line Products                                                                   |
| formTitleForInserting | New Line Product                                                                |
| formTitleForEditing   | Line Product                                                                    |

## SQL Structure

| Column                  | Description          | Type | Length | NULL     | Default |
| :---------------------- | :------------------- | :--: | :----: | :------: | :------ |
| id_fin_credit_note_line | ID položky dobropisu | INT  | 8      | NOT NULL |         |
| id_war_product          | ID produktu          | INT  | 8      | NOT NULL |         |

## Columns

* id_fin_credit_note_line:
    * required: true
    * type: lookup
    * title: Credit Note Line
    * model: App/Widgets/Finance/CreditNote/Models/CreditNoteLine
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* id_war_product:
    * required: true
    * type: lookup
    * title: Product
    * model: App/Widgets/Warehouse/Products/Models/Product
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true

## Foreign Keys

| Column                  | Parent table          | Relation | OnUpdate | OnDelete |
| :---------------------- | :-------------------- | :------: | :------: | :------: |
| id_fin_credit_note_line | fin_credit_note_lines |   1:N    | Cascade  | Cascade  |
| id_whs_product          | whs_products          |   1:N    | Cascade  | Restrict |

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
