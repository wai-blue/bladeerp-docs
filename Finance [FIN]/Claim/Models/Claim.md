# Claim

## Introduction

Tabuľka slúži na ukladanie základných údajov o pohľadávke.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                |
| --------------------- | -------------------- |
| sqlName               | fin_claims           |
| urlBase               | finance/claim/claims |
| lookupSqlValue        | {%TABLE%}.name       |
| tableTitle            | Claims               |
| formTitleForInserting | New Claim            |
| formTitleForEditing   | Claim                |

## SQL Structure

| Column                                  | Description                                       |  Type   | Length |   NULL   | Default |
| :-------------------------------------- | :------------------------------------------------ | :-----: | :----: | :------: | :-----: |
| id                                      | Jedinečné ID záznamu                              |   INT   |   8    | NOT NULL |  AUTO   |
| id_fin_claim_state                      | ID stavu pohľadávky                               |   INT   |   8    | NOT NULL |         |
| id_com_address                          | ID odberateľa                                     |   INT   |   8    | NOT NULL |         |
| id_fin_accounting_period                | ID účtovného obdobia                              |   INT   |   8    | NOT NULL |         |
| is_accounted                            | Je pohľadávka zaúčtovaná                          |  BOOL   |   1    |   NULL   |    0    |
| supplier                                | Kópia údajov o predajcovi uložené v JSON formáte  |  JSON   |        | NOT NULL |         |
| customer                                | Kópia údajov o zákazníkovi uložené v JSON formáte |  JSON   |        | NOT NULL |         |
| id_com_numeric_sequence                 | ID číselného radu pohľadávok                      |   INT   |   8    | NOT NULL |         |
| sequence_code                           | Sekvenčné označenie                               | VARCHAR |   20   |   NULL   |         |
| issued_date                             | Dátum vystavenia                                  |  DATE   |   8    | NOT NULL |         |
| delivery_date                           | Dátum dodania                                     |  DATE   |   8    | NOT NULL |         |
| maturity_date                           | Dátum splatnosti                                  |  DATE   |   8    | NOT NULL |         |
| id_com_numeric_sequence_variable_symbol | ID číselného radu Variabilných symbolov           |   INT   |   8    | NOT NULL |         |
| variable_symbol                         | Variabilný symbol                                 | VARCHAR |   10   |   NULL   |   “”    |
| specific_symbol                         | Špecifický symbol                                 | VARCHAR |   10   |   NULL   |   “”    |
| constant_symbol                         | Konštantný symbol                                 | VARCHAR |   4    |   NULL   |   “”    |
| id_fin_currency                         | ID meny v ktorej sú uvedené sumy                  |   INT   |   8    | NOT NULL |         |
| exchange_rate                           | Hodnota prevodného kurzu voči  hlavnej mene       | DECIMAL |  15,2  |   NULL   |         |
| price_total                             | Celková hodnota pohľadávky                        | DECIMAL |  15,2  | NOT NULL |         |
| price_paid                              | Uhradená hodnota pohľadávky                       | DECIMAL |  15,2  | NOT NULL |         |
| comment                                 | Poznámka k pohľadávke                             |  TEXT   |        |   NULL   |         |

## Columns

* id_fin_claim_state:
    * required: true
    * type: lookup
    * title: State
    * model: Widgets/Finance/Claim/Models/ClaimState
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* id_com_address:
    * required: true
    * type: lookup
    * title: Customer
    * model: Widgets/Common/AddressBook/???
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* id_fin_accounting_period:
    * required: true
    * type: lookup
    * title: Accounting Period
    * model: Widgets/Finance/MainBook/Models/AccountingPeriod
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* is_accounted:
    * required: false
    * type: boolean
    * title: Is Accounted
    * showColumn: true
* supplier:
    * required: true
    * type: text
    * title: Supplier
    * required: true
    * showColumn: true
* customer:
    * required: true
    * type: text
    * title: Customer
    * required: true
    * showColumn: true
* id_com_numeric_sequence:
    * required: true
    * type: lookup
    * title: Numeric Sequence
    * model: Widgets/Common/NumericSequence/Models/NumericSequence
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
* delivery_date:
    * required: false
    * type: date
    * title: Delivery Date
    * showColumn: true
* issued_date:
    * type: date
    * title: Issued Date
    * required: true
    * showColumn: true
* maturity_date:
    * type: date
    * title: Maturity Date
    * required: true
    * showColumn: true
* id_com_numeric_sequence_variable_symbol:
    * required: true
    * type: lookup
    * title: Variable Symbol Numeric Sequence
    * model: Widgets/Common/NumericSequence/Models/NumericSequence
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* variable_symbol:
    * type: varchar
    * title: Variable Symbol
    * byte_size: 10
    * required: false
    * showColumn: true
    * readonly: true
* specific_symbol:
    * type: varchar
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
* id_fin_currency:
    * required: true
    * type: lookup
    * title: Currency
    * model: Widgets/Finance/ExchangeRate/Models/Currency
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
    * type: text
    * title: Description
    * required: false
    * showColumn: true

## Foreign Keys

| Stĺpec                                  | Parent tabuľka         | Väzba | OnUpdate | OnDelete |
| :-------------------------------------- | :--------------------- | :---: | :------: | :------: |
| id_com_numeric_sequence                 | com_numeric_sequences  | 1:N   | Cascade  | Restrict |
| id_com_numeric_sequence_variable_symbol | com_numeric_sequences  | 1:N   | Cascade  | Restrict |
| id_fin_claim_state                      | fin_claim_states       | 1:N   | Cascade  | Restrict |
| id_com_address                          | com_addresses          | 1:N   | Cascade  | Restrict |
| id_fin_accounting_period                | fin_accounting_periods | 1:N   | Cascade  | Restrict |
| id_fin_currency                         | fin_currencies         | 1:N   | Cascade  | Restrict |

## Indexes

| Názov           | Typ     | Stĺpec          | Zoradenie |
| :-------------- | :-----: | :-------------- | :-------: |
| id              | PRIMARY | id              | ASC       |
| issued_date     | INDEX   | issued_date     | ASC       |
| sequence_code   | UNIQUE  | sequence_code   | DESC      |
| variable_symbol | UNIQUE  | variable_symbol | ASC       |

## Callbacks

### onBeforeInsert

* Ak ešte nie je priradený sekvenčný kód (col: **sequence_code=NULL**) a aktuálny stav (col: **id_fin_claim_state**) ho žiada priradiť (tab: **fin_clame_states**, col:             **is_sequence_code_assigned=1**), potom je nutné v uvedenom poradí nastaviť:
  * hodnotu aktívneho číselného radu pre pohľadávky (col: **id_com_numeric_sequence**)
  * hodnotu pre sekvenčné označenie (col: **sequence_code**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence**).
  * hodnotu aktívneho číselného radu pre VS (col: **id_com_numeric_sequence_variable_symbol**) 
  * hodnotu VS (col: **variable_symbol**) zavolaním metódy **getNextSequenceNumber()** (model: **NumericSequences**) s ID zvoleného číselného radu (col: **id_com_numeric_sequence_variable_symbol**).

### onAfterInsert

TODO: Je potrebné dorobiť, na Google docs stále rozpísané

### onBeforeUpdate

* Ak ešte nie je priradený sekvenčný kód (col: **sequence_code=NULL**) a aktuálny stav (col: **id_fin_claim_state**) ho žiada priradiť (tab: **fin_clame_states**, col: **is_sequence_code_assigned=1**), potom vykonať kroky popísané v **3.2.6.1. onBeforeInsert**.
* Zakázať zmeny, ak ich daný stav nepovoľuje - tabuľka **fin_claim_states** - col: **is_allowed_update**

### onAfterUpdate

* Ak sa zmenil zákazník, potom je potrebné skopírovať údaje zo zákazníka a uložiť ich do stĺpca **customer** v JSON formáte.
* Potrebné aktualizovať hodnoty z pohľadávky v účtovnej osnove (tab: **fin_claim_accounts**).

### onBeforeDelete

* Zakázať zmazanie, ak to daný stav nepovoľuje - tabuľka **fin_claim_states** - col: **is_allowed_delete**
* Ak má pohľadávka priradený sekvenčný kód (col: **sequence_code!=NULL**) a zároveň sa jedná o poslednú pohľadávku v rade, potom je nutné vymazať záznam s jej sekvenčným číslom (tab: **com_numeric_sequences_entries**) pre daný číselný rad (col: **id_com_numeric_sequence**).


### onAfterDelete

* Potrebné aktualizovať hodnoty z pohľadávky v účtovnej osnove (tab: fin_claim_accounts).

## Formatters

* Červeným pozadím zvýrazniť riadky s pohľadávkami, ktoré sú po dátume splatnosti (stĺpec **maturity_date**). 
* Zeleným pozadím zvýrazniť riadky s pohľadávkami, ktoré sú kompletne zaplatené (stĺpce **price_total**  a **price_paid**).

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
