# Liability

## Introduction

Tabuľka slúži na ukladanie základných údajov o záväzkoch.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                         |
| :-------------------- | :---------------------------- |
| sqlName               | bkp_liabilities               |
| urlBase               | bookkeeping/liability/liabilities |
| lookupSqlValue        | {%TABLE%}.name                |
| tableTitle            | Liabilities                   |
| formTitleForInserting | New Liability                 |
| formTitleForEditing   | Liability                     |

## SQL Structure

| Column                  | Description                                             |  Type   | Length |   NULL   | Default |
| :---------------------- | :------------------------------------------------------ | :-----: | :----: | :------: | :-----: |
| id                      | ID záznamu                                              |   INT   |   8    | NOT NULL |         |
| id_com_address          | ID veriteľa                                             |   INT   |   8    | NOT NULL |         |
| is_accounted            | Je záväzok zaúčtovaný                                   |  BOOL   |   1    |   NULL   |    0    |
| is_long_term            | Príznak či je záväzok dlhodobý alebo krátkodobý         |  BOOL   |   1    | NOT NULL |    0    |
| supplier                | Kópia údajov o predajcovi uložené v JSON formáte        |  JSON   |        | NOT NULL |         |
| creditor                | Kópia údajov o veriteľovi uložené v JSON formáte        |  JSON   |        | NOT NULL |         |
| id_com_numeric_sequence | ID číselného radu záväzkov                              |   INT   |   8    | NOT NULL |         |
| sequence_code           | Sekvenčné označenie záväzku                             | VARCHAR |   20   |   NULL   |         |
| issued_date             | Dátum vzniku                                            |  DATE   |   8    | NOT NULL |         |
| maturity_date           | Dátum splatnosti                                        |  DATE   |   8    | NOT NULL |         |
| auto_recurrency_days    | Počet dní pre automatické generovanie rovnakého záväzku |   INT   |   4    | NOT NULL |    0    |
| auto_generate_stop_date | Dátum pre ukončenie automatického generovania           |  DATE   |   8    |   NULL   |         |
| variable_symbol         | Variabilný symbol                                       | VARCHAR |   10   |   NULL   |   “”    |
| specific_symbol         | Špecifický symbol                                       | VARCHAR |   10   |   NULL   |   “”    |
| constant_symbol         | Konštantný symbol                                       | VARCHAR |   4    |   NULL   |   “”    |
| id_bkp_currency         | ID meny v ktorej sú uvedené sumy                        |   INT   |   8    | NOT NULL |         |
| exchange_rate           | Hodnota prevodného kurzu voči hlavnej mene              | DECIMAL |  15,2  |   NULL   |         |
| price_total             | Celková hodnota záväzku                                 | DECIMAL |  15,2  | NOT NULL |         |
| price_paid              | Uhradená hodnota záväzku                                | DECIMAL |  15,2  | NOT NULL |         |
| comment                 | Poznámka k záväzku                                      |  TEXT   |        |   NULL   |         |

## Columns

* id_com_address:
    * required: true
	* type: lookup
	* title: Customer
	* model: App/Widgets/Common/AddressBook/Models/???
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* is_accounted:
	* required: true
	* type: boolean
	* title: Is Accounted
	* showColumn: true
* is_long_term:
	* required: true
	* type: boolean
	* title: Is Long Term
	* showColumn: true
* supplier:
	* required: true
	* type: text
	* title: Supplier
	* showColumn: true
* creditor:
	* required: true
	* type: text
	* title: Creditor
	* showColumn: true
* id_com_numeric_sequence:
	* required: true
	* type: lookup
	* title: Numeric Sequence
	* model: App/Widgets/Common/NumericSequence/Models/NumericSequence
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* sequence_code:
	* required: false
	* type: varchar
	* title: Sequence Code
	* byte_size: 200
	* showColumn: true
	* readonly: true
* issued_date:
	* required: true
	* type: date
	* title: Issued Date
	* showColumn: true
* maturity_date:
	* required: true
	* type: date
	* title: Maturity Date
	* showColumn: true
* id_com_numeric_sequence_variable_symbol:
	* required: true
	* type: lookup
	* title: Variable Symbol Numeric Sequence
	* model: App/Widgets/Common/NumericSequence/Models/NumericSequence
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* auto_generate_after_days:
	* required: true
	* type: int
	* title: Days To Auto-Generate
	* description: After a given amount of days (e.g. 90) counted from Maturity Date the same liability will be auto-generated.
	* byte_size: 4
	* showColumn: true
* auto_generate_stop_date:
	* required: no
	* type: date
	* title: Date To Stop Auto-Generation
	* description: After this date the auto-generation will be stopped.
	* byte_size: 4
	* showColumn: true
* variable_symbol:
    * type: varchar
	* title: Variable Symbol
	* byte_size: 10
	* required: false
	* showColumn: true
	* readonly: true
* specific_symbol:
       type: varchar
	* title: Specific Symbol
	* byte_size: 10
	* required: false
	* showColumn: true
* constant_symbol:
    * type: varchar
	* title: Constant Symbol
	* byte_size: 4
	* required: false
	* showColumn: true
* id_bkp_currency:
	* required: true
	* type: lookup
	* title: Currency
	* model: App/Widgets/Bookkeeping/ExchangeRate/Models/Currency
	* foreignKeyOnUpdate: CASCADE
	* foreignKeyOnDelete: RESTRICT
	* showColumn: true
* exchange_rate:
	* required: false
	* type: float
	* byte_size: 15
	* decimals: 2
	* title: Exchange Rate Value
	* showColumn: true
* price_total:
	* required: true
	* type: float
	* byte_size: 15
	* decimals: 2
	* title: Total Price
	* showColumn: true
* price_paid:
	* required: true
	* type: float
	* byte_size: 15
	* decimals: 2
	* title: Paid Price
	* showColumn: true
* comment:
	* required: false
	* type: text
	* title: Description
	* required: false
	* showColumn: true

## Foreign Keys

| Column                                  | Parent table          | Relation | OnUpdate | OnDelete |
| :-------------------------------------- | :-------------------- | :------: | :------: | :------: |
| id_com_numeric_sequence                 | com_numeric_sequences |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence_variable_symbol | com_numeric_sequences |   1:N    | Cascade  | Restrict |
| id_com_address                          | com_addresses         |   1:N    | Cascade  | Restrict |
| id_bkp_currency                         | bkp_currencies        |   1:N    | Cascade  | Restrict |


## Indexes

| Name            | Type    | Column + Order      |
| :-------------- | :------ | :------------------ |
| id              | PRIMARY | id ASC              |
| issued_date     | INDEX   | issued_date ASC     |
| sequence_code   | UNIQUE  | sequence_code DESC  |
| variable_symbol | UNIQUE  | variable_symbol ASC |

## Callbacks

### onBeforeInsert

* Nastaviť časový príznak (col: **is_long_term**) podľa dátumu splatnosti (col: **maturity_date**).
* Pre dlhodobý záväzok  (col: **is_long_term = TRUE**) povoliť nastavenie iba nulovej hodnoty auto-generovania (col: **auto_generate_days = 0**), t.j. dlhodobé záväzky nemôžu byť generované automaticky.
* Nutné nastaviť (v uvedenom poradí):
  1. hodnotu aktívneho číselného radu pre záväzky (col: **id_com_numeric_sequence**)
  2. hodnotu pre sekvenčné označenie (col: **sequence_code**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence**).
  3. hodnotu aktívneho číselného radu pre VS (col: **id_com_numeric_sequence_variable_symbol**) 
  4. hodnotu VS (col: **variable_symbol**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence_variable_symbol**).

### onAfterInsert

TODO: Na Google docs to ešte vyzerá byť rozrobené, tak zatiaľ nebudem prekopírovávať.

### onBeforeUpdate

* Ak nastala zmena dátumu splatnosti (col: **maturity_date**), potom podľa neho aktualizovať aj časový príznak (col: **is_long_term**).
* Pre dlhodobý záväzok  (col: **is_long_term = TRUE**) povoliť nastavenie iba nulovej hodnoty auto-generovania (col: **auto_generate_days = 0**), t.j. dlhodobé záväzky nemôžu byť generované automaticky.

### onAfterUpdate

* Ak sa zmenil veriteľ/dodávateľ, potom je potrebné skopírovať jeho údaje a uložiť ich do stĺpca **creditor** v JSON formáte.
* Potrebné aktualizovať hodnoty zo záväzku v účtovnej osnove (tab: **bkp_liability_accounts**).

### onBeforeDelete

* Ak sa jedná o posledný záväzok v rade, potom je nutné vymazať záznam s jej sekvenčným číslom (tab: **com_numeric_sequences_entries**) pre daný číselný rad (col: **id_com_numeric_sequence**).
* Nedovoliť mazanie, ak existujú úhrady k záväzku (tab: **bkp_liability_payments**).

### onAfterDelete

Potrebné aktualizovať hodnoty zo záväzku v účtovnej osnove (tab: **bkp_liability_accounts**).

## Formatters

* Červeným pozadím zvýrazniť riadky so záväzkami, ktoré sú po dátume splatnosti (stĺpec **maturity_date**). 
* Zeleným pozadím zvýrazniť riadky so záväzkami, ktoré sú kompletne zaplatené (stĺpce **price_total** a **price_paid**).

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
