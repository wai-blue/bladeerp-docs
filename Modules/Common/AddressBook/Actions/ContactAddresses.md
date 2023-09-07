# Action [Module]/[Widget]/UsingTableAsMainView

## Description

Sample definition of action using a Table.

## View

Table

## Default View Parameters

(vid ADIOS.repo/src/Core/View/Table.php)

* model: App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod
* showColumns:
  * name
  * start_date
  * end_date
  * id_bkp_accounting_period
* orderBy: name ASC

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. Ak je parameter idContact != NULL filtrovať iba adresy pre daný kontakt
  2. Post-processing functionality
  3. Post-processing functionality