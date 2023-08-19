# ClaimOrder

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávok s objednávkami.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                               |
| :-------------------- | :---------------------------------- |
| sqlName               | fin_claim_orders                    |
| urlBase               | finance/claim/{id_fin_claim}/orders |
| lookupSqlValue        | {%TABLE%}.name                      |
| tableTitle            | Claim Orders                        |
| formTitleForInserting | New Claim Order                     |
| formTitleForEditing   | Claim Order                         |

## SQL Structure

| Column       | Description   | Type | Length | NULL     | Default |
| :----------- | :------------ | :--: | :----: | :------: | ------- |
| id_fin_claim | ID pohľadávky | INT  | 8      | NOT NULL |         |
| id_crm_order | ID objednávky | INT  | 8      | NOT NULL |         |

## Columns

* id_fin_claim:
    * required: true
    * type: lookup
    * title: Claim
    * model: Widgets/Finance/Claim/Models/Claim
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* id_crm_order:
    * required: true
    * type: lookup
    * title: Order
    * model: Widgets/Warehouse/Order/Models/Order
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true

## Foreign Keys

| Column       | Parent table | Relation | OnUpdate | OnDelete |
| :----------- | :----------- | :------: | :------: | :------: |
| id_fin_claim | fin_claims   | 1:N      | Cascade  | Cascade  |
| id_crm_order | crm_orders   | 1:N      | Cascade  | Restrict |


## Indexes

Tabuľka nemá iné indexy.

| Name | Type    | Column + Order |
| ---- | ------- | -------------- |
| id   | PRIMARY | id ASC         |

## Callbacks

V tomto modeli nie sú použité formátery.

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
