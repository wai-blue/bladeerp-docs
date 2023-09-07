# Action Bookkeeping/MainBook/AccountingPeriods

## Description

Zoznam účtovných období.

## View

Table

## Default View Parameters

| Názov stĺpca                | Formát zobrazenia | Zoradenie | Filter                                |
| :-------------------------- | :---------------: | :-------: | :------------------------------------ |
| name                        | TEXT              |           |                                       |
| start_date                  | DATE              | DESC      |                                       |
| end_date                    | DATE              |           |                                       |
| is_open                     | BOOL              |           |                                       |
| bkp_accounting_periods.name | LOOKUP            |           | Podľa stĺpca id_bkp_accounting_period |
| bkp_currency.name           | LOOKUP            |           | Podľa stĺpca id_bkp_currency          |

## Parameters Post-processing

No post-processing of default parameters is necessary.