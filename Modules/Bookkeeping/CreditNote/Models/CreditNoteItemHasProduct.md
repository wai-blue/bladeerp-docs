# Model Bookkeeping/CreditNote/CreditNoteItemHasProduct

## Introduction

Tabuľka bude slúžiť na prepojenie položiek dobropisov s produktami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                               |
| :-------------------- | :---------------------------------------------------------------------------------- |
| storeRecordInfo       | FALSE                                                                               |
| sqlName               | bkp_credit_note_item_has_products                                                   |
| urlBase               | bookkeeping/credit-note/{id_bkp_credit_note}/item/{id_bkp_credit_note_item}/product |
| lookupSqlValue        | {%TABLE%}.name                                                                      |
| tableTitle            | Item Products                                                                       |
| formTitleForInserting | New Item Product                                                                    |
| formTitleForEditing   | Item Product                                                                        |
| isJunctionTable          | TRUE                                                                                |

## Data Structure

| Column                  | Title            | ADIOS Type | Length | Required | Notes                                      |
| :---------------------- | ---------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id_bkp_credit_note_item | Credit Note Item |   lookup   |   8    |   TRUE   | ID položky dobropisu                       |
| id_whs_product          | Product          |   lookup   |   8    |   TRUE   | ID produktu                                |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                  | Model                                                    | Relation | OnUpdate | OnDelete |
| :---------------------- | :------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_credit_note_item | App/Widgets/Bookkeeping/CreditNote/Models/CreditNoteItem |   1:N    | Cascade  | Cascade  |
| id_whs_product          | App/Widgets/Warehouse/Products/Models/Product            |   1:N    | Cascade  | Restrict |

### Indexes

| Name                    |  Type   |              Column + Order |
| :---------------------- | :-----: | --------------------------: |
| id                      | PRIMARY |                      id ASC |
| id_bkp_credit_note_item |  INDEX  | id_bkp_credit_note_item ASC |
| id_whs_product          |  INDEX  |          id_whs_product ASC |

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
