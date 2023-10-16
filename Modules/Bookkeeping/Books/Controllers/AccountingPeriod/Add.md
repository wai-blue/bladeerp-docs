# Controller Bookkeeping/Books/AccountingPeriods/Add

## Description

Vytvorenie nového účtovného obdobia.

## View

Form

## Default View Parameters

* template:
  * start_date (Dátum musí byť väčší ako dátum posledného účtovného)
  * end_date (Dátum musí byť väčší, nanajvýš rovný ako start_date)
  * id_bkp_accounting_period
  * id_bkp_currency
  * is_open

TODO: constraints na start_date a end_date musia byt kontrolovane cez onBeforeInsert alebo onBeforeUpdate callbacks

## Parameters Post-processing

No post-processing of default parameters is necessary.