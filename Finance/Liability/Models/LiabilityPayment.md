# LiabilityPayment

## Introduction

Tabuľka bude slúžiť na evidenciu plánovaných úhrad záväzkov.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value |
| :-------------------- | :-------------------------------------------- |
| sqlName               | fin_liability_payments                        |
| urlBase               | finance/liability/{id_fin_liability}/payments |
| lookupSqlValue        | -                                             |
| tableTitle            | Payments                                      |
| formTitleForInserting | New Payment                                   |
| formTitleForEditing   | Payment                                       |


## SQL Structure

| Column           | Description            |  Type   | Length |   NULL   | Default |
| :--------------- | :--------------------- | :-----: | :----: | :------: | :------ |
| id               | Jedinečné ID záznamu   |   INT   |   8    | NOT NULL |         |
| id_fin_liability | ID záväzku             |   INT   |   8    | NOT NULL |         |
| maturity_date    | Plánovaný dátum úhrady |  DATE   |   8    | NOT NULL |         |
| executed_date    | Dátum úhrady           |  DATE   |   8    |   NULL   |         |
| price            | Uhradená suma          | DECIMAL |  15,2  | NOT NULL |         |
| comment          | Poznámka k úhrade      |  TEXT   |        |   NULL   |         |

## Columns

* id_fin_liability:
	* required: true
	* type: lookup
	* title: Liability
	* model: App/Widgets/Finance/Liability/Models/Liability
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* planned_date:
	* required: true
	* type: date
	* title: Payment Date
	* showColumn: true
* maturity_date:
	* required: true
	* type: date
	* title: Planned Payment Date
	* showColumn: true
* executed_date:
	* required: false
	* type: date
	* title: Payment Execution Date
	* showColumn: true
* price:
	* required: true
	* type: float
	* title: Payment Price
	* byte_size: 15
	* decimals: 2
	* showColumn: true
* comment:
	* required: false
	* type: text
	* title: Description
	* required: false
	* showColumn: true

## Foreign Keys

| Column           | Parent table    | Relation | OnUpdate | OnDelete |
| :--------------- | :-------------- | :------: | :------: | :------: |
| id_fin_liability | fin_liabilities | 1:N      | Cascade  | Restrict |

## Indexes

| Name | Type    | Column + Order |
| ---- | ------- | -------------- |
| id   | PRIMARY | id ASC         |

## Callbacks

### onBeforeInsert

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu záväzku.

### onAfterInsert

Not used.

### onBeforeUpdate

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu záväzku.

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
