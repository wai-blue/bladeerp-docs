# Bookkeeping/AccountingStatement/FinancialStatement/View

## Description

Detail účtovnej závierky. Dáta v uzávierke nie je možné meniť.

## Main View

Grid

## Parameters

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
