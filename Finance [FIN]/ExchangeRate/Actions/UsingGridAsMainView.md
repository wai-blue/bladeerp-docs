# Finance/AccountingStatement/FinancialStatement/View

## Description

Detail účtovnej závierky. Dáta v uzávierke nie je možné meniť.

## Main View

Grid

## Parameters

* layout:
  ```
    Area A - Closing Period
    Area B - Account Balances
  ```
* areas:
  * A:
    * view: UI/InlineForm
    * template:
      * id_fin_accounting_period (readonly)
      * name (readonly)
      * closing_date (readonly)
  * B:
    * action: Widgets/Finance/MainBook/FinancialStatementsEntries
    * parameters:
      * idFinancialStatement = $data[‘id’]
