# Finance/Cashdesk/Receipt/Edit

## Description

Detail pohybu (blocku, uctenky) na pokladničnom účte

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
    * template:
      * id_fin_cashdesk_accounts
      * id_fin_accounting_period
      * id_com_numeric_sequence
      * id_com_address
      * date
      * amount_without_vat
        * Readonly
      * amount_vat
        * Readonly
      * amount_total
        * Readonly
      * description
      * id_fin_currency
      * exchange_rate
  * B:
    * action: Widgets/Finance/Cashdesk/ReceiptItems
    * parameters:
      * idReceipt = $data[‘id’]
