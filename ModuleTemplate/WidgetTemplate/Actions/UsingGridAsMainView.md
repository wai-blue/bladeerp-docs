# UsingGridAsMainView

## Description

Sample definition of action using a Grid.

## Main View

Grid

## Parameters

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
      * id_fin_accounting_period (readonly)
      * name (readonly)
      * closing_date (readonly)
  * B:
    * action: Widgets/Finance/MainBook/FinancialStatementsEntries
    * parameters:
      * idFinancialStatement = $data[‘id’]
  * C:
    * (view|action): App/Core/MyCustomView
    * parameters:
      * ... any parameters that the custom view can accept
