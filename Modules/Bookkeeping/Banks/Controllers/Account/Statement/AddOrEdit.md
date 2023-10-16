# Controller Bookkeeping/Banks/Account/Statement/AddOrEdit

## Description

Zápis novéj uzávierky na bankovom účte.

Uprava uzavierky je nežiaduca. Pri uzavierke sa počíta manko a prebytok a vyvodzuje sa z toho hmotná zodpovednosť. Ak dáme možnosť to opraviť, nebudú nikde rozdiely, lebo si to opravia ako potrebuju aby to vyšlo.

## View

Form

## Default View Parameters

* template:
  * id_bkp_bank_account
  * statement_datetime
  * amount_expected

## Parameters Post-processing

### Readonly editing

Uprava uzavierky je nežiaduca. Preto formular pre upravu musi byt cely iba na citanie.