# Action [Module]/[Widget]/UsingTableAsMainView

## Description

Sample definition of action using a Table.

## Permissions

[Permissions are granted to all user roles.]

Permissions are granted to the following user roles:
  * Main Accountant
  * Sales Representative
  * ...

## View

Table

## Default View Parameters

(vid ADIOS.repo/src/Core/View/Table.php)

* model: App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod
* columns:
  * name
  * start_date
  * end_date
  * id_bkp_accounting_period
* orderBy: name ASC

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. Post-processing functionality
  2. Post-processing functionality
  3. Post-processing functionality