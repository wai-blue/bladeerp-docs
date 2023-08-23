# UsingGridAsMainView

## Description

Sample definition of action using a Grid.

## Main View

Grid

## Parameters
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
