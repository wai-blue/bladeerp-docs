# Action [Module]/[Widget]/UsingFormAsMainView

## Description

Vytvorenie novej uzávierky.

## Permissions

[Permissions are granted to all user roles.]

Permissions are granted to the following user roles:
  * Main Accountant
  * Sales Representative
  * ...


## View

Form

## Default View Parameters

(vid ADIOS.repo/src/Core/View/Form.php)

* model: App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod
* cssClass: inline
* displayMode: (inline|window|desktop)
* template:
  * name
  * closing_date 
* defaultValues:
  * id_user = Predvolený je aktuálny používateľ
  * transaction_date = Predvolený je posledný dátum z účtovného obdobia

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. Input for `id_bkp_accounting_period` will be readonly.
  2. Účtovné obdobie sa bude ponúkať iba z otvorených účtovných období podľa stĺpca is_open v tabuľke bkp_accounting_periods.
  3. Dátum `closing_date` musí byť väčší alebo rovný dátumu posledného dokladu z vybraného účtovného obdobia.