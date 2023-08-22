# Finance/AccountingStatement/FinancialStatement/Add

## Description

Vytvorenie novej uzávierky.

## Main View

Form

## Parameters

* template:
  * name
  * id_fin_accounting_period
    * Účtovné obdobie sa bude ponúkať iba z otvorených účtovných období podľa stĺpca is_open v tabuľke fin_accounting_periods
  * closing_date
    * Dátum musí byť väčší alebo rovný dátumu posledného dokladu z vybraného účtovného obdobia
