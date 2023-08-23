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
| sqlName               | bkp_liability_accounts                       |
| urlBase               | bookkeeping/liability/{id_bkp_liability}/account |
| lookupSqlValue        | -                                            |
| tableTitle            | Liability Accounts                           |
| formTitleForInserting | New Liability Account                        |
| formTitleForEditing   | Liability Account                            |

## SQL Structure

| Column              | Description               |  Type   | Length |   NULL   | Default |
| :------------------ | :------------------------ | :-----: | :----: | :------: | :------ |
| id                  | Jedinečné ID záznamu      |   INT   |   8    | NOT NULL |         |
| id_bkp_liability    | ID záväzku                |   INT   |   8    | NOT NULL |         |
| id_bkp_book_account | ID účtu z účtovnej osnovy |   INT   |   8    | NOT NULL |         |
| amount              | Hodnota                   | DECIMAL |  15,2  | NOT NULL |         |

## Columns

* id_bkp_liability:
	* required: true
	* type: lookup
	* title: Liability
	* model: App/Widgets/Bookkeeping/Liability/Models/Liability
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* id_bkp_book_account:
	* required: true
	* type: lookup
	* title: Account
	* model: App/Widgets/Bookkeeping/MainBook/Models/BookAccount
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
| id_bkp_liability    | bkp_liabilities   |   1:N    | Cascade  | Restrict |
| id_bkp_book_account | bkp_book_accounts |   1:N    | Cascade  | Restrict |

## Indexes

| Name | Type    | Column + Order |
| ---- | ------- | -------------- |
| id   | PRIMARY | id ASC         |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Aktualizovať hodnotu v hlavnej knihe - tabuľka **bkp_book_accounts**.

### onBeforeUpdate

Not used.

### onAfterUpdate

Aktualizovať hodnotu v hlavnej knihe - tabuľka **bkp_book_accounts**.

### onBeforeDelete

Not used.

### onAfterDelete

Aktualizovať hodnotu v hlavnej knihe - tabuľka bkp_book_accounts.

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
