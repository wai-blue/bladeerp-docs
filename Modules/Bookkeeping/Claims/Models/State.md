# Model Bookkeeping/Claims/State

## Introduction

Tabuľka obsahuje definíciu stavov pohľadávok a procesy, ktoré sa majú automaticky stať.
Jeden stav musí byť vždy označený ako predvolený.
TODO: id_com_mail_template - Model pre Email Template zatiaľ neexistuje. Doplniť, keď bude vytvorený.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                              |
| --------------------- | ---------------------------------- |
| isJunctionTable       | FALSE                              |
| storeRecordInfo       | TRUE                               |
| sqlName               | bkp_claim_states                   |
| urlBase               | bookkeeping/claims/states          |
| lookupSqlValue        | {%TABLE%}.name                     |
| tableTitle            | States                             |
| formTitleForInserting | New State                          |
| formTitleForEditing   | State                              |
| crud/browse/action    | Bookkeeping/Claims/States          |
| crud/add/action       | Bookkeeping/Claims/State/AddOrEdit |
| crud/edit/action      | Bookkeeping/Claims/State/AddOrEdit |

## Data Structure

| Column               | Title              | ADIOS Type | Length | Required | Notes                                                     |
| :------------------- | ------------------ | :--------: | :----: | :------: | :-------------------------------------------------------- |
| id                   |                    |    int     |   8    |   TRUE   | Unique record ID                                      |
| record_info          | Record Info        |    json    |        |   TRUE   |                                                           |
| name                 | Name               |  varchar   |   50   |   TRUE   | Názov stavu                                               |
| is_available         | Is Available       |  boolean   |   1    |   TRUE   | Je možné tento stav použiť?                               |
| is_default           | Is Default         |  boolean   |   1    |   TRUE   | Je to predvolený stav pohľadávky                          |
| state_sequence       | Order In Select    |    int     |   6    |  FALSE   | Poradové číslo stavu v select boxoch                      |
| is_set_sequence_code | Set Sequence Code? |  boolean   |   1    |   TRUE   | Má sa v danom stave priradiť sekvenčný kód alebo ešte nie |
| is_send_mail         | Send Mail?         |  boolean   |   1    |  FALSE   | Má sa poslať mail o zmene stavu?                          |
| is_send_claim        | Send Claim?        |  boolean   |   1    |  FALSE   | Má sa k mailu pripojiť pohľadávka?                        |
| is_allowed_update    | Can Update?        |  boolean   |   1    |   TRUE   | Môže sa meniť obsah?                                      |
| is_allowed_delete    | Can Delete?        |  boolean   |   1    |   TRUE   | Môže sa zmazať?                                           |

### ADIOS Parameters

| Column            | Parameter   | Value                                                                   |
| :---------------- | :---------- | ----------------------------------------------------------------------- |
| is_default        | description | Is this the default state or not?                                       |
| state_sequence    | description | Order of the state in input lists.                                      |
| is_send_mail      | description | Should a sequence code and a variable symbol be assigned in this state? |
| is_send_claim     | description | Attach the claim to email?                                              |
| is_allowed_update | description | Is update allowed in this state?                                        |
| is_allowed_delete | description | Is it allowed to delete in this state?                                  |

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name                 | Type    |            Column + Order |
| :------------------- | :------ | ------------------------: |
| id                   | PRIMARY |                    id ASC |
| name                 | INDEX   |                  name ASC |
| is_available         | INDEX   |         is_available DESC |
| is_default           | INDEX   |           is_default DESC |
| state_sequence       | INDEX   |       state_sequence DESC |
| is_set_sequence_code | INDEX   | is_set_sequence_code DESC |
| is_send_mail         | INDEX   |         is_send_mail DESC |
| is_send_claim        | INDEX   |        is_send_claim DESC |
| is_allowed_update    | INDEX   |    is_allowed_update DESC |
| is_allowed_delete    | INDEX   |    is_allowed_delete DESC |

TODO: | id_com_mail_template        | INDEX   |        id_com_mail_template DESC |

## Callbacks

### onBeforeInsert

Iba jeden stav môže byť predvolený - nutné kontrolovať.

### onAfterInsert

Not used.

### onBeforeUpdate

* Iba jeden stav môže byť predvolený - nutné kontrolovať.
* Preddefinovaný stav (**is_default**) nemôže byť nastavený ako nedostupný (**is_available**) - nutné kontrolovať.

### onAfterUpdate

Not used.

### onBeforeDelete

Nie je možné vymazať stav, ktorý je použitý v niektorej pohľadávke - tabuľka bkp_claim.


### onAfterDelete

Not used.

## Formatters

* Jemne zelený pozadím zvýrazniť riadky so stavmi, ktoré sú dostupné (**is_available**=TRUE). 

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
