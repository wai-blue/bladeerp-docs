# Model Bookkeeping/Claims/Item

## Introduction

Tabuľka bude slúžiť na ukladanie položiek pohľadávok.

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                                   |
| ---------------------- | --------------------------------------- |
| isJunctionTable        | FALSE                                   |
| storeRecordInfo        | TRUE                                    |
| sqlName                | bkp_claim_items                         |
| urlBase                | bookkeeping/claims/{id_bkp_claim}/items |
| lookupSqlValue         | {%TABLE%}.name                          |
| tableTitle             | Claim Items                             |
| formTitleForInserting  | New Claim Item                          |
| formTitleForEditing    | Claim Item                              |
| crud/browse/controller | Bookkeeping/Claims/Items                |
| crud/add/controller    | Bookkeeping/Claims/Item/AddOrEdit       |
| crud/edit/controller   | Bookkeeping/Claims/Item/AddOrEdit       |

## Data Structure

| Column              | Title               | ADIOS Type | Length | Required | Notes                         |
| :------------------ | ------------------- | :--------: | :----: | :------: | :---------------------------- |
| id                  |                     |    int     |   8    |   TRUE   | Unique record ID              |
| record_info         | Record Info         |    json    |        |   TRUE   |                               |
| id_bkp_claim        | Claim               |   lookup   |   8    |   TRUE   | ID pohľadávky                 |
| item                | Item                |  varchar   |  200   |   TRUE   | Položka                       |
| item_sequence       | Item Sequence       |    int     |   6    |  FALSE   | Poradie položky na pohľadávke |
| quantity            | Quantity            |  decimal   |  15,4  |   TRUE   | Množstvo                      |
| id_com_unit         | Units               |   lookup   |   8    |   TRUE   | Merná jednotka                |
| id_bkp_vat          | VAT Rate            |   lookup   |   8    |   TRUE   | ID Sadzby DPH                 |
| price_unit_excl_vat | Unit Price Excl VAT |  decimal   |  15,4  |   TRUE   | Jednotková cena bez DPH       |
| price_unit_incl_vat | Unit Price Incl VAT |  decimal   |  15,4  |   TRUE   | Jednotková cena s DPH         |
| price_excl_vat      | Price Excl VAT      |  decimal   |  15,4  |   TRUE   | Suma za položku bez DPH       |
| price_vat           | Price VAT           |  decimal   |  15,4  |   TRUE   | Suma DPH za položku           |
| price_incl_vat      | Price Incl VAT      |  decimal   |  15,4  |   TRUE   | Suma za položku s DPH         |

REVIEW DD: Nie je lepsie VAT sadzbu ukladat ako decimal? Ak to dame ako Decimal, moze sa nastavit parameter unit = "%".

### ADIOS Parameters

| Column              | Parameter   | Value                                     |
| :------------------ | :---------- | ----------------------------------------- |
| item_sequence       | description | Order of the item in items list on claim. |
| price_unit_excl_vat | unit        | €                                         |
| price_unit_incl_vat | unit        | €                                         |
| price_vat           | unit        | €                                         |
| price_incl_vat      | unit        | €                                         |

### Foreign Keys

| Column       | Model                                       | Relation | OnUpdate | OnDelete |
| :----------- | :------------------------------------------ | :------: | -------- | -------- |
| id_bkp_claim | App/Widgets/Bookkeeping/Claims/Models/Claim |   1:N    | Cascade  | Cascade  |
| id_com_unit  | App/Widgets/Common/CodeLists/Models/Unit    |   1:N    | Cascade  | Restrict |
| id_bkp_vat   | App/Widgets/Bookkeeping/Books/Models/Vat    |   1:N    | Cascade  | Restrict |

### Indexes

| Name          | Type    | Column + Order    |
| :------------ | :------ | :---------------- |
| id            | PRIMARY | id ASC            |
| id_bkp_claim  | INDEX   | id_bkp_claim ASC  |
| id_com_unit   | INDEX   | id_com_unit ASC   |
| id_bkp_vat    | INDEX   | id_bkp_vat ASC    |
| item          | INDEX   | item ASC          |
| item_sequence | INDEX   | item_sequence ASC |

## Callbacks

### onBeforeInsert

Neumožniť pridávanie, ak to daný stav nepovoľuje - tabuľka **bkp_claim_states** - stĺpec **is_allowed_update**

### onAfterInsert

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_claim_vats** a tiež celkovú hodnotu pohľadávky - tabuľka **bkp_claims**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_claim_accounts**.

### onBeforeUpdate

Neumožniť zmeny, ak to daný stav nepovoľuje - tabuľka bkp_claim_states - stĺpec **is_allowed_update**

### onAfterUpdate

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_claim_vats** a tiež celkovú hodnotu pohľadávky - tabuľka **bkp_claims**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_claim_accounts**.

### onBeforeDelete

Nedovoliť mazanie, ak to daný stav nepovoľuje - tabuľka **bkp_claim_states** - stĺpec **is_allowed_delete**

### onAfterDelete

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_claim_vats** a tiež celkovú hodnotu pohľadávky - tabuľka **bkp_claims**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_claim_accounts**.

## Formatters

V tomto modeli nie sú použité formátery.

### tableCellHTMLFormatter

Not used.

### tableCellCSVFormatter

Not used.

### tableCellCSSFormatter

Not used.

### tableRowCSSFormatter

Not used.

### cardsCardHtmlFormatter

Not used.
