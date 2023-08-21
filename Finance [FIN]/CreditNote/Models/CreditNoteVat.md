# CreditNoteVat

## Introduction

Tabuľka bude slúžiť na ukladanie DPH k dobropisu.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property       | Value                                         |
| :------------- | :-------------------------------------------- |
| sqlName        | fin_credit_note_vats                          |
| urlBase        | finance/credit-note/{id_fin_credit_note}/vats |
| lookupSqlValue | {%TABLE%}.name                                |
| tableTitle     | VATs                                          |

## SQL Structure

| Column             | Description          |  Type   | Length |   NULL   | Default |
| :----------------- | :------------------- | :-----: | :----: | :------: | :------ |
| id                 | Jedinečné ID záznamu |   INT   |   8    | NOT NULL |         |
| id_fin_credit_note | ID dobropisu         |   INT   |   8    | NOT NULL |         |
| id_fin_vat         | ID sadzby DPH        |   INT   |   8    | NOT NULL |         |
| price_excl_vat     | Suma bez DPH         | DECIMAL |  15,2  | NOT NULL |         |
| price_vat          | Suma DPH             | DECIMAL |  15,2  | NOT NULL |         |
| price_incl_vat     | Suma s DPH           | DECIMAL |  15,2  | NOT NULL |         |

## Columns

* id_fin_credit_note:
    * required: true
    * type: lookup
    * title: CreditNote
    * model: App/Widgets/Finance/CreditNote/Models/CreditNote
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* id_fin_vat:
    * required: true
    * type: lookup
    * title: VAT Rate
    * model: App/Widgets/Finance/MainBook/Models/Vat
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* price_excl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price Excl VAT
    * showColumn: true
* price_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price VAT
    * showColumn: true
* price_incl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price Incl VAT
    * showColumn: true

## Foreign Keys

| Column             | Parent table     | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------- | :------: | :------: | :------: |
| id_fin_credit_note | fin_credit_notes | 1:N      | Cascade  | Cascade  |
| id_fin_vat         | fin_vats         | 1:N      | Cascade  | Restrict |

## Indexes

| Name                          | Type    | Column + Order                         |
| :---------------------------- | :-----: | :------------------------------------- |
| id                            | PRIMARY | id ASC                                 |
| id_fin_credit_note_id_fin_vat | UNIQUE  | id_fin_credit_note ASC, id_fin_vat ASC |

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
