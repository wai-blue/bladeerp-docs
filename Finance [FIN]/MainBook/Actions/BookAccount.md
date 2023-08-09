# Finance/MainBook/BookAccount

TODO: Nemala by sa akcia volat "BookAccounts"?

# Description

Tabuľka sa bude zobrazovať iba v detaili účtovného obdobia. Záznamy sa budú vyberať podľa **id_fin_accounting_period**.

## Main View

Table

## Columns

| Názov stĺpca | Formát zobrazenia | Zoradenie | Filter |
| - | - | - | - |
| name | TEXT |  | |
| account | NUMBER | ASC | |
| opening_balance | DECIMAL |  | |
| current_balance | DECIMAL |  | |
| fin_book_account_types.name | LOOKUP |  | |
| fin_book_account_categories.name | LOOKUP |  | |
