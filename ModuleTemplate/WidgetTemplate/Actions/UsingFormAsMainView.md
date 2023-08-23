# UsingFormAsMainView

## Description

Vytvorenie novej uzávierky.

## Main View

Form

## Parameters

(vid ADIOS.repo/src/Core/View/Form.php)

* model: App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod
* cssClass: inline
* displayMode: (inline|window|desktop)
* template:
  * name
  * id_bkp_accounting_period (readonly)
    * Účtovné obdobie sa bude ponúkať iba z otvorených účtovných období podľa stĺpca is_open v tabuľke bkp_accounting_periods
  * closing_date
    * Dátum musí byť väčší alebo rovný dátumu posledného dokladu z vybraného účtovného obdobia
* defaultValues:
  * date_transaction = Predvolený je posledný dátum z účtovného obdobia