# Action [Module]/[Widget]/UsingFormAsMainView

## Description

Vytvorenie novej uzávierky.

## View

Form

## Default View Parameters

(vid ADIOS.repo/src/Core/View/Form.php)

* model: App/Widgets/Bookkeeping/Books/Models/AccountingPeriod
* cssClass: inline
* displayMode: (inline|window|desktop)
* template:
  * full_name
  * closing_date
  * state
  * id_user
  * ADIOS/Core/Views/Inputs/Tags:
    * title: Categories of the contact
    * description: In what categories the contact is?
    * inputParams:
      * model: Widgets/Products/Models/ProductDomainAssignment
  * App/Core/Views/Inputs/MyCustomInput:
    * title: Some custom input
    * description: This input is not a part of ADIOS, it's in the Blade's Core
    * inputParams:
      * param1: value1
      * param2: value2
* columns:
  * state
    * readonly = TRUE
  * id_user
    * readonly = TRUE
* defaultValues:
  * id_user = Predvolený je aktuálny používateľ
  * transaction_date = Predvolený je posledný dátum z účtovného obdobia

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. Input for `id_bkp_accounting_period` will be readonly.
  2. Účtovné obdobie sa bude ponúkať iba z otvorených účtovných období podľa stĺpca is_open v tabuľke bkp_accounting_periods.
  3. Dátum `closing_date` musí byť väčší alebo rovný dátumu posledného dokladu z vybraného účtovného obdobia.