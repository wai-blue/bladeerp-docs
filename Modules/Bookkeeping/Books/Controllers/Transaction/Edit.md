# Controller Bookkeeping/Books/Transaction/Edit

## Description

Detail dokladu. Ak je doklad uzavretý, zobrazuje sa iba na čítanie a nie je ho možné meniť.

## View

Grid

## Default View Parameters

* layout:
    ```
      A
      B
    ```
* areas:
  * A:
    * view: Form
    * cssClass: inline
    * template:
      * id_bkp_accounting_period
      * transaction_date
      * amount (readonly)
      * is_accounted
  * B:
    * action: Widgets/Bookkeeping/Books/Transaction/Items
    * params:
      * idTransaction = $params[‘id’]

## Parameters Post-processing

No post-processing of default parameters is necessary.