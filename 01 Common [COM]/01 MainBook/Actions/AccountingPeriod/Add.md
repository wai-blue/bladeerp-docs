# Finance/MainBook/AccountingPeriods/Add

## Description

Vytvorenie nového účtovného obdobia.

## Main View

UI/Form

## Columns

| name | TEXT | |
| - | - | - |
| start_date | DATE | Dátum musí byť väčší ako dátum posledného účtovného |obdobia
| end_date | DATE | Dátum musí byť väčší, nanajvýš rovný ako start_date|
| id_fin_accounting_period | LOOKUP | |
| id_fin_currency | LOOKUP | |
| is_open | BOOL | |
