# Model Bookkeeping/CreditNote/CreditNote

## Introduction

Tabuľka slúži na ukladanie základných údajov o dobropise.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                            |
| :-------------------- | :------------------------------- |
| sqlName               | bkp_credit_notes                 |
| urlBase               | bookkeeping/credit-note/credit-notes |
| lookupSqlValue        | {%TABLE%}.sequence_code          |
| tableTitle            | CreditNotes                      |
| formTitleForInserting | New CreditNote                   |
| formTitleForEditing   | Credit Note                      |

## Data Structure

| Column                                  | Title                            | ADIOS Type | Length | Required | Notes                                             |
| :-------------------------------------- | -------------------------------- | :--------: | :----: | :------: | :------------------------------------------------ |
| id                                      |                                  |    int     |   8    | NOT NULL | Jedinečné ID záznamu                              |
| id_bkp_credit_note_state                | State                            |   lookup   |   8    | NOT NULL | ID stavu dobropisu                                |
| id_com_address                          | Customer                         |   lookup   |   8    | NOT NULL | ID odberateľa                                     |
| id_bkp_accounting_period                | Accounting Period                |   lookup   |   8    | NOT NULL | ID účtovného obdobia                              |
| is_accounted                            | Is Accounted                     |  boolean   |   1    |   NULL   | Je dobropis zaúčtovaný                            |
| supplier                                | Supplier                         |    json    |        | NOT NULL | Kópia údajov o predajcovi uložené v JSON formáte  |
| customer                                | Customer                         |    json    |        | NOT NULL | Kópia údajov o zákazníkovi uložené v JSON formáte |
| id_com_numeric_sequence                 | Numeric Sequence                 |   lookup   |   8    | NOT NULL | ID číselného radu dobropisov                      |
| sequence_code                           | Sequence Code                    |  varchar   |  200   |   NULL   | Sekvenčné označenie                               |
| issue_date                              | Issue Date                       |    date    |   8    | NOT NULL | Dátum vystavenia                                  |
| delivery_date                           | Delivery Date                    |    date    |   8    | NOT NULL | Dátum dodania                                     |
| due_date                                | Due Date                         |    date    |   8    | NOT NULL | Dátum splatnosti                                  |
| id_com_numeric_sequence_variable_symbol | Variable Symbol Numeric Sequence |   lookup   |   8    | NOT NULL | ID číselného radu Variabilných symbolov           |
| variable_symbol                         | Variable Symbol                  |  varchar   |   10   |   NULL   | Variabilný symbol                                 |
| specific_symbol                         | Specific Symbol                  |  varchar   |   10   |   NULL   | Špecifický symbol                                 |
| constant_symbol                         | Constant Symbol                  |  varchar   |   4    |   NULL   | Konštantný symbol                                 |
| id_bkp_currency                         | Currency                         |   lookup   |   8    | NOT NULL | ID meny v ktorej sú uvedené sumy                  |
| exchange_rate                           | Exchange Rate Value              |  decimal   |  15,2  |   NULL   | Hodnota prevodného kurzu voči  hlavnej mene       |
| price_total                             | Total Price                      |  decimal   |  15,2  | NOT NULL | Celková hodnota dobropisu                         |
| price_paid                              | Paid Price                       |  decimal   |  15,2  | NOT NULL | Uhradená hodnota dobropisu                        |
| comment                                 | Description                      |    text    |        |   NULL   | Poznámka k dobropisu                              |

REVIEW DD: Stlpec comment ma preco title Description? Navrhujem zjednotit - bud comment alebo description.

### ADIOS Parameters

| Column          | Parameter   | Value                             |
| :-------------- | :---------- | --------------------------------- |
| sequence_code   | readonly    | TRUE                              |
| variable_symbol | readonly    | TRUE                              |

### Foreign Keys

| Column                                  | Model                                                     | Relation | OnUpdate | OnDelete |
| :-------------------------------------- | :-------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_credit_note_state                | App/Widgets/Bookkeeping/CreditNote/Models/CreditNoteState     |   1:N    | Cascade  | Restrict |
| id_com_address                          | App/Widgets/Common/AddressBook/???                        |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence                 | App/Widgets/Common/NumericSequence/Models/NumericSequence |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence_variable_symbol | App/Widgets/Common/NumericSequence/Models/NumericSequence |   1:N    | Cascade  | Restrict |
| id_bkp_accounting_period                | App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod      |   1:N    | Cascade  | Restrict |
| id_bkp_currency                         | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency          |   1:N    | Cascade  | Restrict |

### Indexes

| Name                                    |  Type   |                              Column + Order |
| :-------------------------------------- | :-----: | ------------------------------------------: |
| id                                      | PRIMARY |                                      id ASC |
| is_accounted                            |  INDEX  |                            is_accounted ASC |
| issue_date                              |  INDEX  |                              issue_date ASC |
| delivery_date                           |  INDEX  |                           delivery_date ASC |
| due_date                                |  INDEX  |                                due_date ASC |
| id_bkp_credit_note_state                |  INDEX  |                id_bkp_credit_note_state ASC |
| id_com_address                          |  INDEX  |                          id_com_address ASC |
| id_com_numeric_sequence                 |  INDEX  |                 id_com_numeric_sequence ASC |
| id_com_numeric_sequence_variable_symbol |  INDEX  | id_com_numeric_sequence_variable_symbol ASC |
| id_bkp_accounting_period                |  INDEX  |                id_bkp_accounting_period ASC |
| id_bkp_currency                         |  INDEX  |                         id_bkp_currency ASC |
| sequence_code                           | UNIQUE  |                          sequence_code DESC |
| variable_symbol                         | UNIQUE  |                         variable_symbol ASC |

## Callbacks

### onBeforeInsert

Ak ešte nie je priradený sekvenčný kód (col: **sequence_code=NULL**) a aktuálny stav (col: **id_bkp_credit_note_state**) ho žiada priradiť (tab: **bkp_clame_states**, col: **is_sequence_code_assigned=1**), potom je nutné v uvedenom poradí nastaviť:

1. hodnotu aktívneho číselného radu pre dobropisy (col: **id_com_numeric_sequence**)
2. hodnotu pre sekvenčné označenie (col: **sequence_code**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence**).
3. hodnotu aktívneho číselného radu pre VS (col: **id_com_numeric_sequence_variable_symbol**) 
4. hodnotu VS (col: **variable_symbol**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence_variable_symbol**).

### onAfterInsert

TODO: Na Google docs sa na ňom ešte pracuje.

### onBeforeUpdate

* Ak ešte nie je priradený sekvenčný kód (col: **sequence_code=NULL**) a aktuálny stav (col: **id_bkp_credit_note_state**) ho žiada priradiť (tab: **bkp_clame_states**, col: **is_sequence_code_assigned=1**), potom vykonať kroky popísané v **3.2.6.1. onBeforeInsert**.
* Zakázať zmeny, ak ich daný stav nepovoľuje - tabuľka **bkp_credit_note_states** - col: **is_allowed_update**

### onAfterUpdate

* Ak sa zmenil zákazník, potom je potrebné skopírovať údaje zo zákazníka a uložiť ich do stĺpca **customer** v JSON formáte.
* Potrebné aktualizovať hodnoty z dobropisu v účtovnej osnove (tab: **bkp_credit_note_accounts**).

### onBeforeDelete

* Zakázať zmazanie, ak to daný stav nepovoľuje - tabuľka **bkp_credit_note_states** - col: **is_allowed_delete**
* Ak má dobropis priradený sekvenčný kód (col: **sequence_code!=NULL**) a zároveň sa jedná o posledný dobropis v rade, potom je nutné vymazať záznam s jej sekvenčným číslom (tab: **com_numeric_sequences_entries**) pre daný číselný rad (col: **id_com_numeric_sequence**).

### onAfterDelete

Potrebné aktualizovať hodnoty z dobropisu v účtovnej osnove (tab: **bkp_credit_note_accounts**).

## Formatters

* Červeným pozadím zvýrazniť riadky s dobropismi, ktoré sú po dátume splatnosti (stĺpec **due_date**). 
* Zeleným pozadím zvýrazniť riadky s dobropismi, ktoré sú kompletne zaplatené (stĺpce **price_total**  a **price_paid**).

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
