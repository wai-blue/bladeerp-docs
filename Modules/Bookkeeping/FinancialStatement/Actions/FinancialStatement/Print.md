# Action Bookkeeping/FinancialStatement/FinancialStatement/Print

## Description

Každú závierku bude možné vytlačiť. Výstupný formát bude HTML. V hlavičke tlače bude názov závierky a účtovného obdobia. Telo tlačovej zostavy budú tvoriť záznamy z tabuľky **bkp_financial_statement_entries** patriace danej závierke.

## View

Bookkeeping/FinancialStatement/Views/FinancialStatement

## Default View Parameters

REVIEW DD: Nekonzistencia v zapise parametrov, ked porovnam napr. Action Bookkeeping/AccountingStatement/FinancialStatement/Add

| Parameter | Values       |
| --------- | ------------ |
| id        | ID uzávierky |

## Parameters Post-processing

No post-processing of default parameters is necessary.