# Action Bookkeeping/FinancialStatement/FinancialStatement/View

## Description

Detail účtovnej závierky. Dáta v uzávierke nie je možné meniť.

## View

Grid

## Default View Parameters

* layout:
  ```
    A - Closing Period
    B - Account Balances
  ```
* areas:
  * A:
    * view: UI/InlineForm
    * template:
      * id_bkp_accounting_period (readonly)
      * name (readonly)
      * closing_date (readonly)
  * B:
    * action: Widgets/Bookkeeping/MainBook/FinancialStatementsEntries
    * parameters:
      * idFinancialStatement = $data[‘id’]

## Parameters Post-processing

No post-processing of default parameters is necessary.