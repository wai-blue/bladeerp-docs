# Action [Module]/[Widget]/UsingGridAsMainView

## Description

Sample definition of action using a Grid.

## Permissions

[Permissions are granted to all user roles.]

Permissions are granted to the following user roles:
  * Main Accountant
  * Sales Representative
  * ...

## View

Grid

## Default View Parameters

(vid ADIOS.repo/src/Core/View/Grid.php)

*Note: "view" is rendered immediately, "action" is rendered via AJAX request*

* layout:
  ```
    A A
    B C
    B C
  ```
* areas:
  * A:
    * view: Form
    * template:
      * id_bkp_accounting_period (readonly)
      * name (readonly)
      * closing_date (readonly)
  * B:
    * action: Widgets/Bookkeeping/MainBook/FinancialStatementsEntries
    * parameters:
      * idFinancialStatement = $data[‘id’]
  * C:
    * (view|action): App/Core/Views/MyCustomView
    * parameters:
      * ... any parameters that the custom view can accept

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. Post-processing functionality
  2. Post-processing functionality
  3. Post-processing functionality