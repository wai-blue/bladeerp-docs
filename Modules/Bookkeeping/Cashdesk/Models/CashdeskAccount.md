# Model Bookkeeping/Cashdesk/CashdeskAccount

## Introduction

Zoznam pokladní. (pokladnicnych uctov)

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                  |
| :-------------------- | :------------------------------------- |
| sqlName               | bkp_cashdesk_accounts                  |
| urlBase               | bookkeeping/cashdesk/accounts          |
| lookupSqlValue        | {%TABLE%}.name                         |
| tableTitle            | Cashdesk Accounts                      |
| formTitleForInserting | New Cashdesk Account                   |
| formTitleForEditing   | Cashdesk Account                       |
| formAddButtonText     | Add Account                            |
| formSaveButtonText    | Update Account                         |
| crud/browse/action    | Bookkeeping/Cashdesk/Accounts          |
| crud/add/action       | Bookkeeping/Cashdesk/Account/AddOrEdit |
| crud/edit/action      | Bookkeeping/Cashdesk/Account/AddOrEdit |

## Data Structure
| Column              | Title            | ADIOS Type | Length | Required | Notes                                                    |
| :------------------ | ---------------- | :--------: | :----: | :------: | :------------------------------------------------------- |
| id                  | ID               |    int     |   11   |   TRUE   | Jedinečné ID záznamu                                     |
| record_info         | Record Info      |    json    |        |   TRUE   |                                                          |
| account_name        | Name             |  varchar   |  100   |   TRUE   | Názov pokladnicneho uctu                                 |
| account_acronym     | Acronym          |  varchar   |   5    |   TRUE   | Skratka pre pokladnicny ucet                             |
| id_bkp_currency     | Currency         |   lookup   |   11   |   TRUE   | ID meny v ktorej je pokladňa vedená                      |
| id_bkp_book_account | Analytic Account |   lookup   |   11   |   TRUE   | ID analytického účtu na ktorom je pokladňa vedená        |
| id_user             | Cashier          |   lookup   |   11   |   TRUE   | ID pokladníka, ktorý je za pokladňu zodpovedný           |
| is_open             | Is Open          |  boolean   |   1    |  FALSE   | Príznak, či je pokladňa otvorená a môže sa na ňu účtovať |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column              | Model                                                | Relation | OnUpdate | OnDelete |
| :------------------ | :--------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_currency     | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency |   1:N    | Cascade  | Restrict |
| id_bkp_book_account | App/Widgets/Bookkeeping/MainBook/Models/BookAccount  |   1:N    | Cascade  | Restrict |
| id_user             | ADIOS/Core/Models/User                               |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |              Column + Order |
| :------------------ | :-----: | --------------------------: |
| id                  | PRIMARY |                      id ASC |
| id_bkp_currency     |  INDEX  | id_bkp_cashdesk_account ASC |
| id_bkp_book_account |  INDEX  | id_bkp_cashdesk_account ASC |
| id_user             |  INDEX  | id_bkp_cashdesk_account ASC |
| is_open             |  INDEX  |                is_open DESC |
| account_name        | UNIQUE  |            account_name ASC |
| account_acronym     | UNIQUE  |         account_acronym ASC |

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

Účet, ktorý obsahuje záznamy v tabuľke bkp_cashdesk_transactions, nie je možné vymazať.

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
