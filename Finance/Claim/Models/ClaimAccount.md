# Model Finance/Claim/ClaimAccount

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

REVIEW DD: Povodne sa model volal ClaimAccounts. Premenoval som na ClaimAccount.

## Introduction

Tabuľka bude slúžiť na prepojenie pohľadávky s účtovnou osnovou.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                |
| :-------------------- | :----------------------------------- |
| sqlName               | fin_claim_accounts                   |
| urlBase               | finance/claim/{id_fin_claim}/account |
| lookupSqlValue        | {%TABLE%}.name                       |
| tableTitle            | Claim Accounts                       |
| formTitleForInserting | New Claim Account                    |
| formTitleForEditing   | Claim Account                        |

## Data Structure

| Column              | Title        | ADIOS Type | Length | Required | Notes                     |
| :------------------ | ------------ | :--------: | :----: | :------: | :------------------------ |
| id                  |              |    int     |   8    |   TRUE   | Jedinečné ID záznamu      |
| id_fin_claim        | Claim        |   lookup   |   8    |   TRUE   | ID pohľadávky             |
| id_fin_book_account | Book Account |   lookup   |   8    |   TRUE   | ID účtu z účtovnej osnovy |
| amount              | Amount       |  decimal   |  15,2  |   TRUE   | Hodnota                   |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                           | Relation | OnUpdate | OnDelete |
| :------------------ | :---------------------------------------------- | :------: | -------- | -------- |
| id_fin_claim        | App/Widgets/Finance/Claim/Models/Claim          |   1:N    | Cascade  | Restrict |
| id_fin_book_account | App/Widgets/Finance/MainBook/Models/BookAccount |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |
| id_fin_claim        |  INDEX  |        id_fin_claim ASC |
| id_fin_book_account |  INDEX  | id_fin_book_account ASC |

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
