# LiabilityAccounts

## Introduction

Tabuľka bude slúžiť na prepojenie záväzku s účtovnou osnovou.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                        |
| :-------------------- | :------------------------------------------- |
| sqlName               | fin_liability_accounts                       |
| urlBase               | finance/liability/{id_fin_liability}/account |
| lookupSqlValue        | -                                            |
| tableTitle            | Liability Accounts                           |
| formTitleForInserting | New Liability Account                        |
| formTitleForEditing   | Liability Account                            |

## SQL Structure

| Column              | Description               |  Type   | Length |   NULL   | Default |
| :------------------ | :------------------------ | :-----: | :----: | :------: | :------ |
| id                  | Jedinečné ID záznamu      |   INT   |   8    | NOT NULL |         |
| id_fin_liability    | ID záväzku                |   INT   |   8    | NOT NULL |         |
| id_fin_book_account | ID účtu z účtovnej osnovy |   INT   |   8    | NOT NULL |         |
| amount              | Hodnota                   | DECIMAL |  15,2  | NOT NULL |         |

## Columns

* id_fin_liability:
	* required: true
	* type: lookup
	* title: Liability
	* model: Widgets/Finance/Liability/Models/Liability
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* id_fin_book_account:
	* required: true
	* type: lookup
	* title: Account
	* model: Widgets/Finance/MainBook/Models/BookAccount
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* amount:
	* required: true
	* type: float
	* title: Amount
	* byte_size: 15
	* decimals: 2
	* showColumn: true

## Foreign Keys

| Column              | Parent table      | Relation | OnUpdate | OnDelete |
| :------------------ | :---------------- | :------: | :------: | :------: |
| id_fin_liability    | fin_liabilities   |   1:N    | Cascade  | Restrict |
| id_fin_book_account | fin_book_accounts |   1:N    | Cascade  | Restrict |

## Indexes

| Name | Type    | Column + Order |
| ---- | ------- | -------------- |
| id   | PRIMARY | id ASC         |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Aktualizovať hodnotu v hlavnej knihe - tabuľka **fin_book_accounts**.

### onBeforeUpdate

Not used.

### onAfterUpdate

Aktualizovať hodnotu v hlavnej knihe - tabuľka **fin_book_accounts**.

### onBeforeDelete

Not used.

### onAfterDelete

Aktualizovať hodnotu v hlavnej knihe - tabuľka fin_book_accounts.

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
