# Controller Bookkeeping/Claims/Items

## Description

List of items for claims. Used only inside the detail of a claim.

## View

Table

## Default View Parameters

* model: App/Widgets/Bookkeeping/Claims/Models/Item
* showColumns:
  * item
  * item_sequence
  * quantity
  * vat_level
  * price_unit_excl_vat
  * price_unit_incl_vat
  * price_excl_vat
  * price_vat
  * price_incl_vat
* where:
  * id_bkp_claim
  * =
  * `$params['idClaim']`

## Parameters Post-processing

No post-processing of default parameters is necessary.