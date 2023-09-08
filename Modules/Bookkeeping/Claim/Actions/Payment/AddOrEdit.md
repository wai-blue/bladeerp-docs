# Action Bookkeeping/Claim/Payment/Add

## Description

Add a new payment for the claim

## View

Form

## Default View Parameters

* model: App/Widgets/Bookkeeping/Claim/Models/ClaimPayment
* template:
  * id_bkp_claim
  * payment_date
  * payment_amount

## Parameters Post-processing

### payment_date today

When adding, `payment_date` should be set to today.

### id_bkp_claim

The value `$params['idClaim']` should be used for the `id_bkp_claim`.