# Action Bookkeeping/Claim/Claim/Add

## Description

Vytvorenie novej pohľadávky.

## View

Form

## Default View Parameters

* model: App/Widgets/Bookkeeping/Claim/Models/Claim
* displayMode: window
* template:
  * id_bkp_claim_state
    * readonly
  * id_com_contact
  * id_bkp_accounting_period
  * id_com_numeric_sequence
  * sequence_code
  * issue_date
  * delivery_date
  * due_date
  * variable_symbol
  * specific_symbol
  * constant_symbol
  * id_bkp_currency
  * exchange_rate
  * price_total
  * notes
* defaultValues:
  * id_bkp_claim_state = stav, ktory ma nastavene "is_default = 1"

## Parameters Post-processing

No post-processing of default parameters is necessary.
