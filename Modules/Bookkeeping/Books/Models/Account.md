# Model Bookkeeping/Books/Account

## Introduction

Tento model obsahuje všetky údaje, ktoré sa  týkajú účtovnej osnovy. Budú tu zapísané všetky používané účty v rámci Podvojného účtovníctva (nie bankové účty).

Vzor účtovnej osnovy https://www.ako-uctovat.sk/uctovna-osnova.php.

## Constants

| Constant                            | Value | Description                                                                               |
| :---------------------------------- | :---: | :---------------------------------------------------------------------------------------- |
| BKP_BOOK_ACCOUNT_SIDE_BOTH          | 1     | Je možné účtovať na obe strany                                                            |
| BKP_BOOK_ACCOUNT_SIDE_GET           | 2     | Účet na strane Má dať                                                                     |
| BKP_BOOK_ACCOUNT_SIDE_PUT           | 3     | Účet na strane Dal                                                                        |
| BKP_BOOK_ACCCOUNT_STATE_DEFAULT     | 1     | Počiatočný stav, je možné na účet účtovať aj vytvárať podúčty                             |
| BKP_BOOK_ACCCOUNT_STATE_SUMMARY     | 2     | Po vytvorení prvého podúčtu sa nastaví tento stav a už nie je možné na tento účet účtovať |
| BKP_BOOK_ACCCOUNT_STATE_ACCOUNTABLE | 3     | Po prvom zaúčtovaní na účet sa nastaví tento stav a nie je možné na účte vytvárať podúčty |

## Properties

| Property              | Value                          |
| :-------------------- | :----------------------------- |
| storeRecordInfo       | TRUE                           |
| sqlName               | bkp_book_accounts              |
| urlBase               | bookkeeping/books/accounts     |
| lookupSqlValue        | {%TABLE%}.name                 |
| tableTitle            | Book Accounts                  |
| formTitleForInserting | New Account                    |
| formTitleForEditing   | Book Account                   |
| crud/browse/action    | Bookkeeping/Books/Accounts     |
| crud/add/action       | Bookkeeping/Books/Account/Add  |
| crud/edit/action      | Bookkeeping/Books/Account/Edit |

## Data Structure

| Column                       | Title       | ADIOS Type | Length | Required | Notes                                      |
| :--------------------------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                           |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info                  | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name                         |             |  varchar   |  100   |   TRUE   | Názov účtu                                 |
| description                  |             |    text    |        |  FALSE   | Popis účtu                                 |
| account                      |             |  varchar   |   3    |   TRUE   | Číslo účtu                                 |
| state                        |             |    int     |   1    |   TRUE   | Stav účtu                                  |
| side                         |             |    int     |   1    |   TRUE   | Strana, na ktorú sa účtuje                 |
| opening_balance              |             |  decimal   |  15,2  |   TRUE   | Počiatočný stav na účte                    |
| current_balance              |             |  decimal   |  15,2  |   TRUE   | Aktuálny zostatok na účte                  |
| id_parent                    |             |   lookup   |   8    |  FALSE   | Nadriadený účet v stromovej štruktúre      |
| id_bkp_book_account_type     |             |   lookup   |   8    |   TRUE   | Typ účtu                                   |
| id_bkp_book_account_category |             |   lookup   |   8    |   TRUE   | Druh účtu                                  |
| id_bkp_accounting_period     |             |   lookup   |   8    |   TRUE   | ID účtovného obdobia                       |

### ADIOS Parameters

| Column | Parameter   | Value                    |
| :----- | :---------- | ------------------------ |
| state  | enum_values | BKP_BOOK_ACCOUNT_STATE_* |
| side   | enum_values | BKP_BOOK_ACCOUNT_SIDE_*  |

### Foreign Keys

| Column                       | Model                                                 | Relation | OnUpdate | OnDelete |
| :--------------------------- | :---------------------------------------------------- | :------: | -------- | -------- |
| id_parent                    | App/Widgets/Bookkeeping/Books/Models/Account          |   1:N    | Cascade  | Restrict |
| id_bkp_accounting_period     | App/Widgets/Bookkeeping/Books/Models/AccountingPeriod |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account_type     | App/Widgets/Bookkeeping/Books/Models/AccountType      |   1:N    | Cascade  | Restrict |
| id_bkp_book_account_category | App/Widgets/Bookkeeping/Books/Models/AccountCategory  |   1:N    | Cascade  | Restrict |

### Indexes

| Name                                           |  Type   |                   Column + Order |
| :--------------------------------------------- | :-----: | -------------------------------: |
| id                                             | PRIMARY |                           id ASC |
| name                                           |  INDEX  |                         name ASC |
| state                                          |  INDEX  |                        state ASC |
| side                                           |  INDEX  |                         side ASC |
| id_bkp_accounting_period___id_parent___account | UNIQUE  |     id_bkp_accounting_period ASC |
|                                                | UNIQUE  |                    id_parent ASC |
|                                                | UNIQUE  |                      account ASC |
| id_parent                                      |  INDEX  |                    id_parent ASC |
| id_bkp_book_account_type                       |  INDEX  |     id_bkp_book_account_type ASC |
| id_bkp_book_account_category                   |  INDEX  | id_bkp_book_account_category ASC |
| id_bkp_accounting_period                       |  INDEX  |     id_bkp_accounting_period ASC |
| type                                           |  INDEX  |                         type ASC |
| category                                       |  INDEX  |                     category ASC |

## Callbacks

### onBeforeInsert

Skontrolovať, či parent účet je v stave BKP_BOOK_ACCCOUNT_STATE_DEFAULT alebo BKP_BOOK_ACCCOUNT_STATE_SUMMARY. Ak nie, nepovoliť založenie účtu.

### onAfterInsert

Nastaviť pre parent účte stav BKP_BOOK_ACCCOUNT_STATE_SUMMARY.

### onBeforeUpdate

Not used.

### onAfterUpdate

Not used.

### onBeforeDelete

Ak existujú záznamy na tento účet v tabuľke bkp_transaction_entires, nie je možné účet vymazať.

### onAfterDelete

Ak neexistujú iné podúčty pre parent účet, nastaviť pre parent účet stav BKP_BOOK_ACCCOUNT_STATE_DEFAULT.

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
