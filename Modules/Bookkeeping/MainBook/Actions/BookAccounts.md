# Action Bookkeeping/MainBook/BookAccounts

## Description

Tabuľka sa bude zobrazovať iba v detaili účtovného obdobia. Záznamy sa budú vyberať podľa **id_bkp_accounting_period**.

## View

Table

## Default View Parameters

| Názov stĺpca                     | Formát zobrazenia | Zoradenie | Filter |
| :------------------------------- | :---------------: | :-------: | ------ |
| name                             | TEXT              |           |        |
| account                          | NUMBER            | ASC       |        |
| opening_balance                  | DECIMAL           |           |        |
| current_balance                  | DECIMAL           |           |        |
| bkp_book_account_types.name      | LOOKUP            |           |        |
| bkp_book_account_categories.name | LOOKUP            |           |        |

## Parameters Post-processing

No post-processing of default parameters is necessary.