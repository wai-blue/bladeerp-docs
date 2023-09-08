# Action Bookkeeping/Claim/Payments

## Description

List of payments for claims.
This list can be used as a standalone list (all payments) or a list inside an claim detail (showing only payments for displayed claim).

## View

Table

## Default View Parameters

* model: App/Widgets/Bookkeeping/Claim/Models/ClaimPayment
* showColumns:
  * id_bkp_claim
  * payment_date
  * payment_amount

## Parameters Post-processing

### Showing payments for a certain claim

If `$params['idClaim']` is set:
  - The list should be filtered to show only payments for that claim.
  - The `id_bkp_claim` column can be hidden.
  - The `defaultValuesForNewRecord` should contain this parameter.
