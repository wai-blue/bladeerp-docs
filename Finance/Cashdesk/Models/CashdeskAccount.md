# CashdeskAccount

## Introduction
Zoznam pokladní. (pokladnicnych uctov)

## Constants
V modeli nie sú použité konštanty.

## Properties

| Property               | Value |
| :-------------------- | :------------------------ |
| sqlName               | fin_cashdesk_accounts     |
| urlBase               | finance/cashdesk/accounts |
| lookupSqlValue        | {%TABLE%}.name            |
| tableTitle            | Cashdesk Accounts         |
| formTitleForInserting | New Cashdesk Account      |
| formTitleForEditing   | Cashdesk Account          |
| formAddButtonText     | Add Account               |
| formSaveButtonText    | Update Account            |

## SQL Structure
| id                  | ID               | Jedinečné ID záznamu                                     | INT     | 11  | Y   |
| :------------------ | :--------------- | :------------------------------------------------------- | :------ | :-- | :-- |
| name                | Name             | Názov pokladne                                           | VARCHAR | 100 | Y   |
| acronym             | Acronym          | Skratka pokladne                                         | VARCHAR | 5   | Y   |
| id_fin_currency     | Currency         | ID meny v ktorej je pokladňa vedená                      | INT     | 11  | Y   |
| id_fin_book_account | Analytic Account | ID analytického účtu na ktorom je pokladňa vedená        | INT     | 11  | Y   |
| id_adios_user       | Cashier          | ID pokladníka, ktorý je za pokladňu zodpovedný           | INT     | 11  | Y   |
| is_open             | Is Open          | Príznak, či je pokladňa otvorená a môže sa na ňu účtovať | BOOLEAN | 1   | N   |

## Foreign Keys

| Stĺpec              | Parent tabuľka   | Väzba | OnUpdate | OnDelete |
| :------------------ | :--------------- | :---- | :------- | :------- |
| id_fin_currency     | fin_currency     | 1:N   | Cascade  | Restrict |
| id_fin_book_account | fin_book_account | 1:01  | Cascade  | Restrict |
| id_adios_user       | adios_user       | 1:N   | Cascade  | Restrict |

## Indexes

| Názov   | Typ     | Stĺpec  | Zoradenie |
| :------ | :------ | :------ | :-------- |
| id      | PRIMARY | id      | ASC       |
| name    | INDEX   | name    | ASC       |
| is_open | INDEX   | is_open | DESC      |

## Columns


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
Účet na ktorý obsahuje záznamy v tabuľke fin_cashdesk_transactions nie je možné vymazať.

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
