# Bookkeeping/Asset/Asset/Edit

## Description

Detail majetku.

## Main View

Grid

## Parameters

* layout:
  ```
    A A
    B C
  ```
* areas:
  * A:
    * view: Form
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
    * parameters:
      * model = App/Bookkeeping/Asset/Models/AssetTaxDepreciation
      * idFinAsset = $data[‘id’]

  * C:
    * view: Table
    * parameters:
      * model = App/Bookkeeping/Asset/Models/AssetAccountingDepreciation
      * idFinAsset = $data[‘id’]
