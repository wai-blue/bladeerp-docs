# Controller Bookkeeping/Assets/Asset/Edit

## Description

Detail majetku.

## View

Grid

## Default View Parameters

* layout:
  ```
    A A
    B C
  ```
* areas:
  * A:
    * view: Form
    * model: Bookkeeping/Assets/Asset
    * template:
      * name
      * description
      * entry_price
        * V prípade, že sú už vypočítané odpisy, tento riadok bude iba na čítanie
      * entry_date
        * V prípade, že sú už vypočítané odpisy, tento riadok bude iba na čítanie
      * procurement_method
        * V prípade, že sú už vypočítané odpisy, tento riadok bude iba na čítanie
      * commissioning_date
        * V prípade, že sú už vypočítané odpisy, tento riadok bude iba na čítanie
      * notes
      * id_bkp_depreciation_group
        * V prípade, že sú už vypočítané odpisy, tento riadok bude iba na čítanie
      * type
        * V prípade, že sú už vypočítané odpisy, tento riadok bude iba na čítanie
      * method
        * V prípade, že sú už vypočítané odpisy, tento riadok bude iba na čítanie
      * amount_accounting_residual
        * Readonly
      * amount_tax_residual
        * Readonly
      * retirement_date
        * Readonly
      * retirement_reason
        * Prístupný, iba ak je vyplnený stĺpec retirement_date
      * retirement_method
        * Prístupný, iba ak je vyplnený stĺpec retirement_date

  * B:
    * view: Table
    * params:
      * model = App/Bookkeeping/Assets/Models/TaxDepreciation
      * idBkpAsset = $params[‘id’]

  * C:
    * view: Table
    * params:
      * model = App/Bookkeeping/Assets/Models/AccountingDepreciation
      * idBkpAsset = $params[‘id’]

## Parameters Post-processing

No post-processing of default parameters is necessary.
