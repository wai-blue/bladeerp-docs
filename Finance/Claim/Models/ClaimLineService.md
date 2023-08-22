# ClaimLineService

## Introduction

Tabuľka bude slúžiť na prepojenie položiek pohľadávok so službami.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                                         |
| :-------------------- | :------------------------------------------------------------ |
| sqlName               | fin_claim_line_services                                       |
| urlBase               | finance/claim/{id_fin_claim}/line/{id_fin_claim_line}/service |
| lookupSqlValue        | {%TABLE%}.name                                                |
| tableTitle            | Line Services                                                 |
| formTitleForInserting | New Line Service                                              |
| formTitleForEditing   | Line Service                                                  |

## SQL Structure

| Column            | Description           | Type | Length | NULL     | Default |
| :---------------- | :-------------------- | :--: | :----: | :------: | ------- |
| id_fin_claim_line | ID položky pohľadávky | INT  | 8      | NOT NULL |         |
| id_ser_service    | ID služby             | INT  | 8      | NOT NULL |         |

## Columns

* id_fin_claim_line:
    * required: true
    * type: lookup
    * title: ID Claim Line
    * model: App/Widgets/Finance/Claim/Models/ClaimLine
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* id_ser_service:
    * required: true
    * type: lookup
    * title: Service
    * model: App/Widgets/Warehouse/Products/Models/Service
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true

## Foreign Keys

| Column            | Parent table    | Relation | OnUpdate | OnDelete |
| ----------------- | --------------- | -------- | -------- | -------- |
| id_fin_claim_line | fin_claim_lines | 1:N      | Cascade  | Cascade  |
| id_ser_service    | ser_services    | 1:N      | Cascade  | Restrict |

## Indexes

Tabuľka nemá iné indexy.

| Name | Type    | Column + Order |
| ---- | ------- | -------------- |
| id   | PRIMARY | id ASC         |

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
