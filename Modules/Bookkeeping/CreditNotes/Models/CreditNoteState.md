# Model Bookkeeping/CreditNote/CreditNoteState

## Introduction

Tabuľka obsahuje definíciu stavov dobropisov a procesy, ktoré sa majú automaticky stať.
Jeden stav musí byť vždy označený ako predvolený.
TODO: id_com_mail_template - Model pre Email Template zatiaľ neexistuje. Doplniť, keď bude vytvorený.

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                                       |
| :--------------------- | :------------------------------------------ |
| storeRecordInfo        | TRUE                                        |
| sqlName                | bkp_credit_note_states                      |
| urlBase                | bookkeeping/credit_note/states              |
| lookupSqlValue         | {%TABLE%}.name                              |
| tableTitle             | States                                      |
| formTitleForInserting  | New State                                   |
| formTitleForEditing    | State                                       |
| crud/browse/controller | Bookkeeping/CreditNote/CreditNoteStates     |
| crud/add/controller    | Bookkeeping/CreditNote/CreditNoteState/Add  |
| crud/edit/controller   | Bookkeeping/CreditNote/CreditNoteState/Edit |

## Data Structure

| Column               | Title              | ADIOS Type | Length | Required | Notes                                                     |
| :------------------- | ------------------ | :--------: | :----: | :------: | :-------------------------------------------------------- |
| id                   |                    |    int     |   8    |   TRUE   | Unique record ID                                          |
| record_info          | Record Info        |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author                |
| name                 | Name               |  varchar   |   50   |   TRUE   |                                                           |
| is_available         | Is Available       |  boolean   |        |   TRUE   |                                                           |
| is_default           | Is Default         |  boolean   |        |   TRUE   |                                                           |
| state_sequence       | Order In Select    |    int     |   6    |  FALSE   | Poradové číslo stavu v select boxoch                      |
| is_set_sequence_code | Set Sequence Code? |  boolean   |        |   TRUE   | Má sa v danom stave priradiť sekvenčný kód alebo ešte nie |
| is_send_mail         | Send Mail?         |  boolean   |   1    |  FALSE   | Má sa poslať mail o zmene stavu?                          |
| is_send_credit_note  | Send CreditNote?   |  boolean   |        |  FALSE   |                                                           |
| is_send_claim        | Send Claim?        |  boolean   |        |  FALSE   |                                                           |
| is_revert_stock      | Revert Stock?      |  boolean   |        |  FALSE   |                                                           |
| is_allowed_update    | Can Update?        |  boolean   |        |   TRUE   |                                                           |
| is_allowed_delete    | Can Delete?        |  boolean   |        |   TRUE   |                                                           |

TODO: | id_com_mail_template | Email Template     |   lookup   |   8    |  FALSE   | ID šablóny mailu                                          |

### ADIOS Parameters

| Column               | Parameter   | Value                                                                   |
| :------------------- | :---------- | ----------------------------------------------------------------------- |
| is_default           | description | Is this the default state or not?                                       |
| state_sequence       | description | Order of the state in input lists.                                      |
| is_set_sequence_code | description | Should a sequence code and a variable symbol be assigned in this state? |
| is_send_mail         | description | Send email in this state?                                               |
| is_send_credit_note  | description | Attach the credit note to email?                                        |
| is_send_claim        | description | Attach related claim to email?                                          |
| is_revert_stock      | description | Revert stock in this state?                                             |
| is_allowed_update    | description | Is update allowed in this state?                                        |
| is_allowed_delete    | description | Is it allowed to delete in this state?                                  |

### Foreign Keys

Model does not contain foreign keys.

TODO: | id_com_mail_template | App/Widgets/Common/Email/Models/Template |   1:N    | Cascade  | Restrict |

### Indexes

| Name                 |  Type   |            Column + Order |
| :------------------- | :-----: | ------------------------: |
| id                   | PRIMARY |                    id ASC |
| name                 |  INDEX  |                  name ASC |
| state_sequence       |  INDEX  |        state_sequence ASC |
| is_available         |  INDEX  |         is_available DESC |
| is_default           |  INDEX  |           is_default DESC |
| is_set_sequence_code |  INDEX  | is_set_sequence_code DESC |
| is_send_mail         |  INDEX  |         is_send_mail DESC |
| is_send_credit_note  |  INDEX  |  is_send_credit_note DESC |
| is_send_claim        |  INDEX  |        is_send_claim DESC |
| is_revert_stock      |  INDEX  |      is_revert_stock DESC |
| is_allowed_update    |  INDEX  |    is_allowed_update DESC |
| is_allowed_delete    |  INDEX  |    is_allowed_delete DESC |
TODO: | id_com_mail_template |  INDEX  | id_com_mail_template DESC |

## Callbacks

### onBeforeInsert

Iba jeden stav môže byť predvolený - nutné kontrolovať.

### onAfterInsert

Not used.

### onBeforeUpdate

Iba jeden stav môže byť predvolený - nutné kontrolovať.
Preddefinovaný (**is_default**) stav nemôže byť nastavený ako nedostupný - nutné kontrolovať.

### onAfterUpdate

Not used.

### onBeforeDelete

Nie je možné vymazať stav, ktorý je použitý v niektorom dobropise - tabuľka **bkp_credit_note**.

### onAfterDelete

Not used.

## Formatters

Jemne zelený pozadím zvýrazniť riadky so stavmi, ktoré sú dostupné (stĺpec **is_available=TRUE**).

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
