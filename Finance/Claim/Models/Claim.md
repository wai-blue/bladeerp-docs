# Model Finance/Claim/Claim

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

## Introduction

Tabuľka slúži na ukladanie základných údajov o pohľadávke.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                |
| --------------------- | -------------------- |
| lookupSqlValue        | {%TABLE%}.name       |
| formTitleForEditing   | Claim                |
| tableTitle            | Claims               |
| sqlName               | fin_claims           |
| urlBase               | finance/claim/claims |
| formTitleForInserting | New Claim            |

## Data Structure

| Column                                  | Title                            | ADIOS Type | Length | Required | Notes                                             |
| :-------------------------------------- | -------------------------------- | :--------: | :----: | :------: | :------------------------------------------------ |
| id                                      |                                  |    int     |   8    |   TRUE   | Jedinečné ID záznamu                              |
| id_fin_claim_state                      | State                            |   lookup   |   8    |   TRUE   | ID stavu pohľadávky                               |
| id_com_address                          | Customer                         |   lookup   |   8    |   TRUE   | ID odberateľa                                     |
| id_fin_accounting_period                | Accounting Period                |   lookup   |   8    |   TRUE   | ID účtovného obdobia                              |
| is_accounted                            | Is Accounted                     |  boolean   |   1    |  FALSE   | Je pohľadávka zaúčtovaná                          |
| supplier                                | Supplier                         |    json    |        |   TRUE   | Kópia údajov o predajcovi uložené v JSON formáte  |
| customer                                | Customer                         |    json    |        |   TRUE   | Kópia údajov o zákazníkovi uložené v JSON formáte |
| id_com_numeric_sequence                 | Numeric Sequence                 |   lookup   |   8    |   TRUE   | ID číselného radu pohľadávok                      |
| sequence_code                           | Sequence Code                    |  varchar   |  200   |  FALSE   | Sekvenčné označenie                               |
| issue_date                              | Issue Date                       |    date    |   8    |   TRUE   | Dátum vystavenia                                  |
| delivery_date                           | Delivery Date                    |    date    |   8    |   TRUE   | Dátum dodania                                     |
| due_date                                | Due Date                         |    date    |   8    |   TRUE   | Dátum splatnosti                                  |
| id_com_numeric_sequence_variable_symbol | Variable Symbol Numeric Sequence |   lookup   |   8    |   TRUE   | ID číselného radu Variabilných symbolov           |
| variable_symbol                         | Variable Symbol                  |  varchar   |   10   |  FALSE   | Variabilný symbol                                 |
| specific_symbol                         | Specific Symbol                  |  varchar   |   10   |  FALSE   | Špecifický symbol                                 |
| constant_symbol                         | Constant Symbol                  |  varchar   |   4    |  FALSE   | Konštantný symbol                                 |
| id_fin_currency                         | Currency                         |   lookup   |   8    |   TRUE   | ID meny v ktorej sú uvedené sumy                  |
| exchange_rate                           | Exchange Rate Value              |  decimal   |  15,2  |  FALSE   | Hodnota prevodného kurzu voči  hlavnej mene       |
| price_total                             | Total Price                      |  decimal   |  15,2  |   TRUE   | Celková hodnota pohľadávky                        |
| price_paid                              | Paid Price                       |  decimal   |  15,2  |   TRUE   | Uhradená hodnota pohľadávky                       |
| comment                                 | Description                      |    text    |        |  FALSE   | Poznámka k pohľadávke                             |

### ADIOS Parameters

| Column          | Parameter | Value |
| :-------------- | :-------- | ----- |
| variable_symbol | readonly  | TRUE  |

### Foreign Keys

| Column                                  | Model                                                     | Relation | OnUpdate | OnDelete |
| :-------------------------------------- | :-------------------------------------------------------- | :------: | -------- | -------- |
| id_fin_claim_state                      | App/Widgets/Finance/Claim/Models/ClaimState               |   1:N    | Cascade  | Restrict |
| id_com_address                          | App/Widgets/Common/AddressBook/???                        |   1:N    | Cascade  | Restrict |
| id_fin_accounting_period                | App/Widgets/Finance/MainBook/Models/AccountingPeriod      |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence                 | App/Widgets/Common/NumericSequence/Models/NumericSequence |   1:N    | Cascade  | Restrict |
| id_com_numeric_sequence_variable_symbol | App/Widgets/Common/NumericSequence/Models/NumericSequence |   1:N    | Cascade  | Restrict |
| id_fin_currency                         | App/Widgets/Finance/ExchangeRate/Models/Currency          |   1:N    | Cascade  | Restrict |

### Indexes

| Name                                    |  Type   |                              Column + Order |
| :-------------------------------------- | :-----: | ------------------------------------------: |
| id                                      | PRIMARY |                                      id ASC |
| issue_date                              |  INDEX  |                              issue_date ASC |
| delivery_date                           |  INDEX  |                           delivery_date ASC |
| due_date                                |  INDEX  |                                due_date ASC |
| id_fin_claim_state                      |  INDEX  |                      id_fin_claim_state ASC |
| id_com_address                          |  INDEX  |                          id_com_address ASC |
| id_fin_accounting_period                |  INDEX  |                id_fin_accounting_period ASC |
| is_accounted                            |  INDEX  |                            is_accounted ASC |
| id_com_numeric_sequence                 |  INDEX  |                 id_com_numeric_sequence ASC |
| id_com_numeric_sequence_variable_symbol |  INDEX  | id_com_numeric_sequence_variable_symbol ASC |
| id_fin_currency                         |  INDEX  |                         id_fin_currency ASC |
| sequence_code                           | UNIQUE  |                          sequence_code DESC |
| variable_symbol                         | UNIQUE  |                         variable_symbol ASC |

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

* Červeným pozadím zvýrazniť riadky s pohľadávkami, ktoré sú po dátume splatnosti (stĺpec **due_date**). 
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
