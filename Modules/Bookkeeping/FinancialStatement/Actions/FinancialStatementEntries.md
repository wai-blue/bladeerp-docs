# Action Bookkeeping/FinancialStatement/FinancialStatementEntries

## Description

Tabuľka sa bude zobrazovať iba v detaili účtovnej závierky. Záznamy sa budú vyberať podľa id_bkp_financial_statement.

## View

UI/Tree

REVIEW DD: Po novom sa uz "UI" nepouziva. Malo by to byt iba "Tree" s tym, ze treba skontrolovat, ci take view vobec existuje.

## Default View Parameters

* columns:
  * bkp_book_accounts.account
  * bkp_book_accounts.name
  * balance
* orderBy: bkp_book_accounts.account ASC

## Parameters Post-processing

No post-processing of default parameters is necessary.