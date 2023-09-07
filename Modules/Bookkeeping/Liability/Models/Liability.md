# Model Bookkeeping/Liability/Liability

## Introduction

Tabuľka slúži na ukladanie základných údajov o záväzkoch.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                             |
| :-------------------- | :-------------------------------- |
| sqlName               | bkp_liabilities                   |
| urlBase               | bookkeeping/liability/liabilities |
| lookupSqlValue        | {%TABLE%}.name                    |
| tableTitle            | Liabilities                       |
| formTitleForInserting | New Liability                     |
| formTitleForEditing   | Liability                         |

## Data Structure

| Column                                  | Title                            | ADIOS Type | Length | Required | Notes                                                   |
| :-------------------------------------- | -------------------------------- | :--------: | :----: | :------: | :------------------------------------------------------ |
| id                                      |                                  |    int     |   8    |   TRUE   | ID záznamu                                              |
| record_info                             | Record Info                      |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author              |
| id_com_contact                          | Customer                         |   lookup   |   8    |   TRUE   | ID veriteľa                                             |
| is_accounted                            | Is Accounted                     |  boolean   |   1    |  FALSE   | Je záväzok zaúčtovaný                                   |
| is_long_term                            | Is Long Term                     |  boolean   |   1    |   TRUE   | Príznak či je záväzok dlhodobý alebo krátkodobý         |
| supplier                                | Supplier                         |    json    |        |   TRUE   | Kópia údajov o predajcovi uložené v JSON formáte        |
| creditor                                | Creditor                         |    json    |        |   TRUE   | Kópia údajov o veriteľovi uložené v JSON formáte        |
| id_com_numeric_sequence                 | Numeric Sequence                 |   lookup   |   8    |   TRUE   | ID číselného radu záväzkov                              |
| id_com_numeric_sequence_variable_symbol | Variable Symbol Numeric Sequence |   lookup   |   8    |   TRUE   | ID číselného radu záväzkov                              |
| sequence_code                           | Sequence Code                    |  varchar   |   20   |   NULL   | Sekvenčné označenie záväzku                             |
| issue_date                              | Issue Date                       |    date    |   8    |   TRUE   | Dátum vzniku                                            |
| due_date                                | Due Date                         |    date    |   8    |   TRUE   | Dátum splatnosti                                        |
| auto_recurrency_days                    | Days To Auto-Generate            |    int     |   4    |   TRUE   | Počet dní pre automatické generovanie rovnakého záväzku |
| auto_generate_stop_date                 | Date To Stop Auto-Generation     |    date    |   8    |  FALSE   | Dátum pre ukončenie automatického generovania           |
| variable_symbol                         | Variable Symbol                  |  varchar   |   10   |  FALSE   | Variabilný symbol                                       |
| specific_symbol                         | Specific Symbol                  |  varchar   |   10   |  FALSE   | Špecifický symbol                                       |
| constant_symbol                         | Constant Symbol                  |  varchar   |   4    |  FALSE   | Konštantný symbol                                       |
| id_bkp_currency                         | Currency                         |   lookup   |   8    |   TRUE   | ID meny v ktorej sú uvedené sumy                        |
| exchange_rate                           | Exchange Rate Value              |  decimal   |  15,2  |  FALSE   | Hodnota prevodného kurzu voči hlavnej mene              |
| price_total                             | Total Price                      |  decimal   |  15,2  |   TRUE   | Celková hodnota záväzku                                 |
| price_paid                              | Paid Price                       |  decimal   |  15,2  |   TRUE   | Uhradená hodnota záväzku                                |
| comment                                 | Description                      |    text    |        |  FALSE   | Poznámka k záväzku                                      |

REVIEW DD: auto_recurrency_days ma iny nazov v ## Columns v Google Docs
REVIEW DD: "Comment" alebo "Description" alebpo "Poznamka"?

### ADIOS Parameters

| Column                   | Parameter   | Value                                                                                                        |
| :----------------------- | :---------- | ------------------------------------------------------------------------------------------------------------ |
| auto_generate_after_days | description | After a given amount of days (e.g. 90) counted from Maturity Date the same liability will be auto-generated. |
| auto_generate_stop_date  | description | After this date the auto-generation will be stopped.                                                         |
| variable_symbol          | readonly    | true                                                                                                         |
|                          |             |                                                                                                              |

### Foreign Keys

| Column                                  | Model                                                                                          | Relation | OnUpdate | OnDelete |
| :-------------------------------------- | :--------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_numeric_sequence                 | App/Widgets/Common/NumericSequence/Models/NumericSequence                                      |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence_variable_symbol | App/Widgets/Common/NumericSequence/Models/NumericSequence                                      |   1:N    | Cascade  | Restrict |
| id_com_contact                          | [App/Widgets/Common/AddressBook/Models/Contact](../../../Common/AddressBook/Models/Contact.md) |   1:N    | Cascade  | Restrict |
| id_bkp_currency                         | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency                                           |   1:N    | Cascade  | Restrict |


### Indexes

| Name                                    |  Type   |                              Column + Order |
| :-------------------------------------- | :-----: | ------------------------------------------: |
| id                                      | PRIMARY |                                      id ASC |
| id_com_contact                          |  INDEX  |                          id_com_contact ASC |
| is_accounted                            |  INDEX  |                           is_accounted DESC |
| is_long_term                            |  INDEX  |                            is_long_term ASC |
| id_com_numeric_sequence                 |  INDEX  |                 id_com_numeric_sequence ASC |
| id_com_numeric_sequence_variable_symbol |  INDEX  | id_com_numeric_sequence_variable_symbol ASC |
| issue_date                              |  INDEX  |                              issue_date ASC |
| due_date                                |  INDEX  |                                due_date ASC |
| variable_symbol                         |  INDEX  |                         variable_symbol ASC |
| id_bkp_currency                         |  INDEX  |                         id_bkp_currency ASC |

## Callbacks

### onBeforeInsert

* Nastaviť časový príznak (col: **is_long_term**) podľa dátumu splatnosti (col: **due_date**).
* Pre dlhodobý záväzok  (col: **is_long_term = TRUE**) povoliť nastavenie iba nulovej hodnoty auto-generovania (col: **auto_generate_days = 0**), t.j. dlhodobé záväzky nemôžu byť generované automaticky.
* Nutné nastaviť (v uvedenom poradí):
  1. hodnotu aktívneho číselného radu pre záväzky (col: **id_com_numeric_sequence**)
  2. hodnotu pre sekvenčné označenie (col: **sequence_code**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence**).
  3. hodnotu aktívneho číselného radu pre VS (col: **id_com_numeric_sequence_variable_symbol**) 
  4. hodnotu VS (col: **variable_symbol**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence_variable_symbol**).

### onAfterInsert

TODO: Na Google docs to ešte vyzerá byť rozrobené, tak zatiaľ nebudem prekopírovávať.

### onBeforeUpdate

* Ak nastala zmena dátumu splatnosti (col: **due_date**), potom podľa neho aktualizovať aj časový príznak (col: **is_long_term**).
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

* Červeným pozadím zvýrazniť riadky so záväzkami, ktoré sú po dátume splatnosti (stĺpec **due_date**). 
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
