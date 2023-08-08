# Finance/MainBook/AccountingPeriods/Add

## Description

Vytvorenie nového účtovného obdobia.

## Main View

UI/Form

## Parameters

* template:
  * start_date (Dátum musí byť väčší ako dátum posledného účtovného)
  * end_date (Dátum musí byť väčší, nanajvýš rovný ako start_date)
  * id_fin_accounting_period
  * id_fin_currency
  * is_open

TODO: constraints na start_date a end_date musia byt kontrolovane cez onBeforeInsert alebo onBeforeUpdate callbacks