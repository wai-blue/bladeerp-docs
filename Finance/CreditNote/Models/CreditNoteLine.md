# CreditNoteLine

## Introduction

Tabuľka bude slúžiť na ukladanie položiek dobropisov.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                          |
| :-------------------- | :--------------------------------------------- |
| sqlName               | fin_credit_note_lines                          |
| urlBase               | finance/credit-note/{id_fin_credit_note}/lines |
| lookupSqlValue        | {%TABLE%}.item                                 |
| tableTitle            | CreditNote Lines                               |
| formTitleForInserting | New CreditNote Line                            |
| formTitleForEditing   | CreditNote Line                                |

## SQL Structure

| Column              | Description                  |  Type   | Length |   NULL   | Default |
| :------------------ | :--------------------------- | :-----: | :----: | :------: | :------ |
| id                  | Jedinečné ID záznamu         |   INT   |   8    | NOT NULL |         |
| id_fin_credit_note  | ID dobropisu                 |   INT   |   8    | NOT NULL |         |
| item                | Položka                      | VARCHAR |  200   | NOT NULL |         |
| item_sequence       | Poradie položky na dobropise |   INT   |   6    |   NULL   |         |
| quantity            | Množstvo                     | DECIMAL |  15,4  | NOT NULL |         |
| id_war_unit         | Merná jednotka               |   INT   |   8    | NOT NULL |         |
| id_fin_vat          | ID Sadzby DPH                |   INT   |   8    | NOT NULL |         |
| price_unit_excl_vat | Jednotková cena bez DPH      | DECIMAL |  15,4  | NOT NULL |         |
| price_unit_incl_vat | Jednotková cena s DPH        | DECIMAL |  15,4  | NOT NULL |         |
| price_excl_vat      | Suma za položku bez DPH      | DECIMAL |  15,4  | NOT NULL |         |
| price_vat           | Suma DPH za položku          | DECIMAL |  15,4  | NOT NULL |         |
| price_incl_vat      | Suma za položku s DPH        | DECIMAL |  15,4  | NOT NULL |         |

## Columns

* id_fin_credit_note:
    * required: true
    * type: lookup
    * title: CreditNote
    * model: App/Widgets/Finance/CreditNote/Models/CreditNote
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* item:
    * required: true
    * type: varchar
    * title: Item
    * byte_size: 200
    * showColumn: true
* item_sequence:
    * required: false
    * type: int
    * title: Item Sequence
    * description: Order of the item in items list on credit note.
    * byte_size: 6
    * showColumn: true
* quantity:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Quantity
    * showColumn: true
* id_war_unit:
    * required: true
    * type: lookup
    * title: Units
    * model: App/Widgets/Warehouse/Models/Unit
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* id_fin_vat:
    * required: true
    * type: lookup
    * title: VAT Rate
    * model: App/Widgets/Finance/MainBook/Models/Vat
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* price_unit_excl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Unit Price Excl VAT
    * showColumn: true
* price_unit_incl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Unit Price Incl VAT
    * showColumn: true
* price_excl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price Excl VAT
    * showColumn: true
* price_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price VAT
    * showColumn: true
* price_incl_vat:
    * required: true
    * type: float
    * byte_size: 15
    * decimals: 2
    * title: Price Incl VAT
    * showColumn: true

## Foreign Keys

| Column             | Parent table     | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------- | :------: | :------- | :------: |
| id_fin_credit_note | fin_credit_notes |   1:N    | Cascade  | Cascade  |
| id_war_unit        | war_units        |   1:N    | Cascade  | Restrict |
| id_fin_vat         | fin_vats         |   1:N    | Cascade  | Restrict |

## Indexes

| Name          | Type    | Column + Order    |
| :------------ | :------ | :---------------- |
| id            | PRIMARY | id ASC            |
| item          | INDEX   | item ASC          |
| item_sequence | INDEX   | item_sequence ASC |

## Callbacks

### onBeforeInsert

Neumožniť pridávanie, ak to daný stav nepovoľuje - tabuľka **fin_credit_note_states** - stĺpec **is_allowed_update**

### onAfterInsert

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **fin_credit_note_vats** a tiež celkovú hodnotu dobropisu - tabuľka **fin_credit_notes**.
* Aktualizovať hodnotu v účte - tabuľka **fin_credit_note_accounts**.

### onBeforeUpdate

Neumožniť zmeny, ak to daný stav nepovoľuje - tabuľka **fin_credit_note_states** - stĺpec **is_allowed_update**

### onAfterUpdate

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **fin_credit_note_vats** a tiež celkovú hodnotu dobropisu - tabuľka **fin_credit_notes**.
* Aktualizovať hodnotu v účte - tabuľka **fin_credit_note_accounts**.

### onBeforeDelete

Nedovoliť mazanie, ak to daný stav nepovoľuje - tabuľka **fin_credit_note_states** - stĺpec **is_allowed_delete**

### onAfterDelete

* Aktualizovať všetky sumáre týkajúce sa DPH - tabuľka **fin_credit_note_vats** a tiež celkovú hodnotu dobropisu - tabuľka **fin_credit_notes**.
* Aktualizovať hodnotu v účte - tabuľka **fin_credit_note_accounts**.

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
