# claimAccounts

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávky s účtovnou osnovou.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                |
| :-------------------- | :----------------------------------- |
| sqlName               | fin_claim_accounts                   |
| urlBase               | finance/claim/{id_fin_claim}/account |
| lookupSqlValue        | {%TABLE%}.name                       |
| tableTitle            | Claim Accounts                       |
| formTitleForInserting | New Claim Account                    |
| formTitleForEditing   | Claim Account                        |

## SQL Structure

| Column              | Description               | Type    | Length | NULL     | Default |
| :------------------ | :------------------------ | :-----: | :----: | :------: | ------- |
| id                  | Jedinečné ID záznamu      | INT     | 8      | NOT NULL |         |
| id_fin_claim        | ID pohľadávky             | INT     | 8      | NOT NULL |         |
| id_fin_book_account | ID účtu z účtovnej osnovy | INT     | 8      | NOT NULL |         |
| amount              | Hodnota                   | DECIMAL | 15,2   | NOT NULL |         |

## Columns

* id_fin_claim:
    * required: true
    * type: lookup
    * title: Claim
    * model: Widgets/Finance/Claim/Models/Claim
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
| id_fin_claim        | fin_claims        | 1:N      | Cascade  | Restrict |
| id_fin_book_account | fin_book_accounts | 1:N      | Cascade  | Restrict |

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

Aktualizovať hodnotu v hlavnej knihe - tabuľka **fin_book_accounts**.

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
