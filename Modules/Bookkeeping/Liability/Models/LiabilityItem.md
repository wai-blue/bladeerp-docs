# Model Bookkeeping/Liability/LiabilityItem

## Introduction

Tabuľka bude slúžiť na ukladanie jednotlivých položiek záväzku.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                          |
| :-------------------- | :--------------------------------------------- |
| storeRecordInfo       | TRUE                                           |
| sqlName               | bkp_liability_items                            |
| urlBase               | bookkeeping/liability/{id_bkp_liability}/items |
| lookupSqlValue        | {%TABLE%}.name                                 |
| tableTitle            | Liability Items                                |
| formTitleForInserting | New Liability Item                             |
| formTitleForEditing   | Liability Item                                 |
| crud/browse/action    | Bookkeeping/Liability/LiabilitItems            |
| crud/add/action       | Bookkeeping/Liability/LiabilitItem/Add         |
| crud/edit/action      | Bookkeeping/Liability/LiabilitItem/Edit        |

## Data Structure

| Column              | Title               | ADIOS Type | Length | Required | Notes                                      |
| :------------------ | ------------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                  |                     |    int     |   8    |   TRUE   | Jedinečné ID záznamu                       |
| record_info         | Record Info         |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_bkp_liability    | Liability           |   lookup   |   8    |   TRUE   | ID záväzku                                 |
| item                | Item                |  varchar   |  200   |   TRUE   | Položka                                    |
| item_sequence       | Item Sequence       |    int     |   6    |  FALSE   | Poradie položky v záväzku                  |
| quantity            | Quantity            |  decimal   |  15,4  |   TRUE   | Množstvo                                   |
| id_war_unit         | Units               |   lookup   |   8    |   TRUE   | Merná jednotka                             |
| id_bkp_vat          | VAT Rate            |   lookup   |   8    |   TRUE   | ID Sadzby DPH                              |
| price_unit_excl_vat | Unit Price Excl VAT |  decimal   |  15,4  |   TRUE   | Jednotková cena bez DPH                    |
| price_unit_incl_vat | Unit Price Incl VAT |  decimal   |  15,4  |   TRUE   | Jednotková cena s DPH                      |
| price_excl_vat      | Price Excl VAT      |  decimal   |  15,4  |   TRUE   | Suma za položku bez DPH                    |
| price_vat           | Price VAT           |  decimal   |  15,4  |   TRUE   | Suma DPH za položku                        |
| price_incl_vat      | Price Incl VAT      |  decimal   |  15,4  |   TRUE   | Suma za položku s DPH                      |

REVIEW DD: id_war_unit - podla meetingu z 23.8. (Juraj+Dusan) sa taketo prepojenia maju robit az, ked sa bude analyzovat warehouse.
REVIEW DD: id_bkp_vat - neukladat radsej priamo hodnotu VAT v %?

### ADIOS Parameters

| Column        | Parameter   | Value                                         |
| :------------ | :---------- | --------------------------------------------- |
| item_sequence | description | Order of the item in items list on liability. |

### Foreign Keys

| Column           | Model                                              | Relation | OnUpdate | OnDelete |
| :--------------- | :------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_liability | App/Widgets/Bookkeeping/Liability/Models/Liability |   1:N    | Cascade  | Cascade  |
| id_war_unit      | App/Widgets/Warehouse/Models/Unit                  |   1:N    | Cascade  | Restrict |
| id_bkp_vat       | App/Widgets/Bookkeeping/MainBook/Models/Vat        |   1:N    | Cascade  | Restrict |

### Indexes

| Name             | Type    | Column + Order       |
| :--------------- | :------ | :------------------- |
| id               | PRIMARY | id ASC               |
| id_bkp_liability | INDEX   | id_bkp_liability ASC |
| id_war_unit      | INDEX   | id_war_unit ASC      |
| id_bkp_vat       | INDEX   | id_bkp_vat ASC       |
| item             | INDEX   | item ASC             |
| item_sequence    | INDEX   | item_sequence ASC    |

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_liability_vats** a tiež celkovú hodnotu záväzku - tabuľka **bkp_liabilities**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_liability_accounts**.

### onBeforeUpdate

Not used.

### onAfterUpdate

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_liability_vats** a tiež celkovú hodnotu záväzku - tabuľka **bkp_liabilities**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_liability_accounts**.

### onBeforeDelete

Not used.

### onAfterDelete

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka bkp_liability_vats a tiež celkovú hodnotu záväzku - tabuľka bkp_liabilities.
* Aktualizovať hodnotu v účte - tabuľka bkp_liability_accounts.

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
