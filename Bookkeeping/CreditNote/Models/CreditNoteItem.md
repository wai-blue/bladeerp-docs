# Model Bookkeeping/CreditNote/CreditNoteItem

REVIEW DD: Model premenovany z CreditNoteLine na CreditNoteItem

## Introduction

Tabuľka bude slúžiť na ukladanie položiek dobropisov.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                          |
| :-------------------- | :--------------------------------------------- |
| sqlName               | bkp_credit_note_items                          |
| urlBase               | bookkeeping/credit-note/{id_bkp_credit_note}/items |
| lookupSqlValue        | {%TABLE%}.item                                 |
| tableTitle            | CreditNote Items                               |
| formTitleForInserting | New CreditNote Item                            |
| formTitleForEditing   | CreditNote Item                                |

## Data Structure

| Column              | Title               | ADIOS Type | Length | Required | Notes                        |
| :------------------ | ------------------- | :--------: | :----: | :------: | :--------------------------- |
| id                  |                     |    int     |   8    |   TRUE   | Jedinečné ID záznamu         |
| id_bkp_credit_note  | Credit Note         |   lookup   |   8    |   TRUE   | ID dobropisu                 |
| item                | Item                |  varchar   |  200   |   TRUE   | Položka                      |
| item_sequence       | Item Sequence       |    int     |   6    |  FALSE   | Poradie položky na dobropise |
| quantity            | Quantity            |  decimal   |  15,4  |   TRUE   | Množstvo                     |
| id_war_unit         | Units               |   lookup   |   8    |   TRUE   | Merná jednotka               |
| id_bkp_vat          | VAT Rate            |   lookup   |   8    |   TRUE   | ID Sadzby DPH                |
| price_unit_excl_vat | Unit Price Excl VAT |  decimal   |  15,4  |   TRUE   | Jednotková cena bez DPH      |
| price_unit_incl_vat | Unit Price Incl VAT |  decimal   |  15,4  |   TRUE   | Jednotková cena s DPH        |
| price_excl_vat      | Price Excl VAT      |  decimal   |  15,4  |   TRUE   | Suma za položku bez DPH      |
| price_vat           | Price VAT           |  decimal   |  15,4  |   TRUE   | Suma DPH za položku          |
| price_incl_vat      | Price Incl VAT      |  decimal   |  15,4  |   TRUE   | Suma za položku s DPH        |

REVIEW DD: id_whs_unit?
REVIEW DD: VAT Rate ukladat ako decimal v %?

### ADIOS Parameters

| Column              | Parameter   | Value                                           |
| :------------------ | :---------- | ----------------------------------------------- |
| item_sequence       | description | Order of the item in items list on credit note. |
| price_unit_excl_vat | unit        | €                                               |
| price_unit_incl_vat | unit        | €                                               |
| price_vat           | unit        | €                                               |
| price_incl_vat      | unit        | €                                               |

### Foreign Keys

| Column             | Model                                            | Relation | OnUpdate | OnDelete |
| :----------------- | :----------------------------------------------- | :------: | -------- | -------- |
| id_bkp_credit_note | App/Widgets/Bookkeeping/CreditNote/Models/CreditNote |   1:N    | Cascade  | Cascade  |
| id_war_unit        | App/Widgets/Warehouse/Models/Unit                |   1:N    | Cascade  | Restrict |
| id_bkp_vat         | App/Widgets/Bookkeeping/MainBook/Models/Vat          |   1:N    | Cascade  | Restrict |

### Indexes

| Name               | Type    | Column + Order         |
| :----------------- | :------ | :--------------------- |
| id                 | PRIMARY | id ASC                 |
| id_bkp_credit_note | INDEX   | id_bkp_credit_note ASC |
| id_war_unit        | INDEX   | id_war_unit ASC        |
| id_bkp_vat         | INDEX   | id_bkp_vat ASC         |
| item               | INDEX   | item ASC               |
| item_sequence      | INDEX   | item_sequence ASC      |

## Callbacks

### onBeforeInsert

Neumožniť pridávanie, ak to daný stav nepovoľuje - tabuľka **bkp_credit_note_states** - stĺpec **is_allowed_update**

### onAfterInsert

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_credit_note_vats** a tiež celkovú hodnotu dobropisu - tabuľka **bkp_credit_notes**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_credit_note_accounts**.

### onBeforeUpdate

Neumožniť zmeny, ak to daný stav nepovoľuje - tabuľka **bkp_credit_note_states** - stĺpec **is_allowed_update**

### onAfterUpdate

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_credit_note_vats** a tiež celkovú hodnotu dobropisu - tabuľka **bkp_credit_notes**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_credit_note_accounts**.

### onBeforeDelete

Nedovoliť mazanie, ak to daný stav nepovoľuje - tabuľka **bkp_credit_note_states** - stĺpec **is_allowed_delete**

### onAfterDelete

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **bkp_credit_note_vats** a tiež celkovú hodnotu dobropisu - tabuľka **bkp_credit_notes**.
* Aktualizovať hodnotu v účte - tabuľka **bkp_credit_note_accounts**.

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
