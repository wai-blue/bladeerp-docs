# Action [Module]/[Widget]/UsingTableAsMainView

## Description

Sample definition of action using a Table.

## View

Table

## Default View Parameters

(vid ADIOS.repo/src/Core/View/Table.php)

* model: App/Widgets/Bookkeeping/Books/Models/AccountingPeriod
* showColumns:
  * name
  * start_date
  * end_date
  * id_bkp_accounting_period
  * virt_some_subselect:
    * type: virtual
    * sql: select from ...
* orderBy: name ASC
* rowButtons:
  * Button1
  * Button2
  * Button3
  * ...

### rowButtons.Button1

Popis funkcie Button1

### rowButtons.Button2

Popis funkcie Button2

### rowButtons.Button3

Popis funkcie Button3

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. Post-processing functionality
  2. Post-processing functionality
  3. Post-processing functionality