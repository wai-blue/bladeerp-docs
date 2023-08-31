# Bookkeeping/Cashdesk/Receipt/Edit

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
      * id_bkp_cashdesk_accounts
      * id_bkp_accounting_period
      * id_com_numeric_sequence
      * id_com_contact
      * date
      * amount_without_vat
        * Readonly
      * amount_vat
        * Readonly
      * amount_total
        * Readonly
      * description
      * id_bkp_currency
      * exchange_rate
  * B:
    * action: Widgets/Bookkeeping/Cashdesk/ReceiptItems
    * parameters:
      * idReceipt = $data[‘id’]
