# CreditNoteState

## Introduction

Tabuľka obsahuje definíciu stavov dobropisov a procesy, ktoré sa majú automaticky stať.

Jeden stav musí byť vždy označený ako predvolený.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                      |
| :-------------------- | :------------------------- |
| sqlName               | fin_credit_note_states     |
| urlBase               | finance/credit_note/states |
| lookupSqlValue        | {%TABLE%}.name             |
| tableTitle            | States                     |
| formTitleForInserting | New State                  |
| formTitleForEditing   | State                      |

## SQL Structure

TODO: Naozaj model neobsahuje MySQL štruktúru? Skontrolovať prosím

| Column | Description      | Type | Length | NULL     | Default |
| ------ | ---------------- | ---- | ------ | -------- | ------- |
| id     | Unique record ID | INT  | 8      | NOT NULL | 0       |

## Columns

* name:
    * required: true
    * type: varchar
    * title: Name
    * byte_size: 50
    * showColumn: true
* is_available:
    * required: true
    * type: boolean
    * title: Is Available
    * showColumn: true
* is_default:
    * required: true
    * type: boolean
    * title: Is Default
    * description: Is this the default state or not?
    * showColumn: true
* state_sequence:
    * required: false
    * type: int
    * title: Order In Select
    * description: Order of the state in input lists.
    * byte_size: 6
    * showColumn: true
* is_sequence_code_assigned:
    * required: true
    * type: boolean
    * title: Assign Sequence Code?
    * description: Should a sequence code and a variable symbol be assigned in this state?
    * showColumn: true
* is_send_mail:
    * required: false
    * type: boolean
    * title: Send Mail?
    * description: Send email in this state?
    * showColumn: true
* id_com_mail_template:
    * required: false
    * type: lookup
    * title: Email Template
    * model: Widgets/Common/Email/Models/Template
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true
* is_send_credit_note:
    * required: false
    * type: boolean
    * title: Send CreditNote?
    * description: Attach the credit note to email?
    * showColumn: true
* is_send_claim:
    * required: false
    * type: boolean
    * title: Send Claim?
    * description: Attach related claim to email?
    * showColumn: true
* is_revert_stock:
    * required: false
    * type: boolean
    * title: Revert Stock?
    * description: Revert stock in this state?
    * showColumn: true
* is_allowed_update:
    * required: true
    * type: boolean
    * title: Can Update?
    * description: Is update allowed in this state?
    * showColumn: true
* is_allowed_delete:
    * required: true
    * type: boolean
    * title: Can Delete?
    * description: Is it allowed to delete in this state?
    * showColumn: true

## Foreign Keys

| Column               | Parent table       | Relation | OnUpdate | OnDelete |
| :------------------- | :----------------- | :------: | :------: | :------: |
| id_com_mail_template | com_mail_templates | 1:N      | Cascade  | Restrict |

## Indexes

| Name         | Type    | Column + Order    |
| :----------- | :-----: | :---------------- |
| id           | PRIMARY | id ASC            |
| name         | INDEX   | name ASC          |
| is_available | index   | is_available DESC |

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

Nie je možné vymazať stav, ktorý je použitý v niektorom dobropise - tabuľka **fin_credit_note**.

### onAfterDelete

TODO: V Google docs chýba poznámka ,,nepoužíva sa,,. Naozaj je tomu tak, alebo bol popis omylom zmazaný?

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
