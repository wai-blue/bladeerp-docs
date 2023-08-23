# Bookkeeping/MainBook/Transaction/Edit

## Description

Detail dokladu. Ak je doklad uzavretý, zobrazuje sa iba na čítanie a nie je ho možné meniť.

## Main View

Grid

## Parameters

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
      * date_transaction
      * amount (readonly)
      * is_accounted
  * B:
    * action: Widgets/Bookkeeping/MainBook/TransactionEntries
    * parameters:
      * idTransaction = $data[‘id’]