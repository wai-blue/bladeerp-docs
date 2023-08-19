# ClaimState

## Introduction

Tabuľka obsahuje definíciu stavov pohľadávok a procesy, ktoré sa majú automaticky stať.

Jeden stav musí byť vždy označený ako predvolený.


## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                |
| --------------------- | -------------------- |
| sqlName               | fin_claim_states     |
| urlBase               | finance/claim/states |
| lookupSqlValue        | {%TABLE%}.name       |
| tableTitle            | States               |
| formTitleForInserting | New State            |
| formTitleForEditing   | State                |

## SQL Structure

| Column                    | Description                                                     |  Type   | Length |   NULL   | Default |
| :------------------------ | :-------------------------------------------------------------- | :-----: | :----: | :------: | :-----: |
| id                        | Jedinečné ID záznamu                                            |   INT   |   8    | NOT NULL |  AUTO   |
| name                      | Názov stavu                                                     | VARCHAR |   50   | NOT NULL |         |
| is_available              | Je možné tento stav použiť?                                     | BOOLEAN |   1    | NOT NULL |    1    |
| is_default                | Je to predvolený stav pohľadávky                                | BOOLEAN |   1    | NOT NULL |    0    |
| state_sequence            | Poradové číslo stavu v select boxoch                            |   INT   |   6    |   NULL   |         |
| is_sequence_code_assigned | Či sa už má v danom stave priradiť sekvenčný kód alebo ešte nie | BOOLEAN |   1    | NOT NULL |         |
| is_send_mail              | Má sa poslať mail o zmene stavu?                                | BOOLEAN |   1    |   NULL   |    0    |
| id_com_mail_template      | ID šablóny mailu                                                |   INT   |   8    |   NULL   |         |
| is_send_claim             | Má sa k mailu pripojiť pohľadávka?                              | BOOLEAN |   1    |   NULL   |    0    |
| is_send_order             | Má sa k mailu pripojiť objednávka?                              | BOOLEAN |   1    |   NULL   |    0    |
| is_storno_reservation     | Má sa zrušiť rezervácia tovaru na sklade?                       | BOOLEAN |   1    |   NULL   |    0    |
| is_remove_stock           | Má sa odpočítať fakturované množstvo zo skladu?                 | BOOLEAN |   1    |   NULL   |    0    |
| is_send_to_carrier        | Má sa vytvoriť balík u dopravcu?                                | BOOLEAN |   1    |   NULL   |    0    |
| is_allowed_update         | Môže sa meniť obsah?                                            | BOOLEAN |   1    | NOT NULL |    1    |
| is_allowed_delete         | Môže sa zmazať?                                                 | BOOLEAN |   1    | NOT NULL |    1    |

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
* is_send_claim:
    * required: false
    * type: boolean
    * title: Send Claim?
    * description: Attach the claim to email?
    * showColumn: true
* is_send_order:
    * required: false
    * type: boolean
    * title: Send Order?
    * description: Attach related order to email?
    * showColumn: true
* is_storno_reservation:
    * required: false
    * type: boolean
    * title: Storno Reservation?
    * description: Should the reservation be canceled in this state?
    * showColumn: true
* is_remove_stock:
    * required: false
    * type: boolean
    * title: Remove Stock?
    * description: Remove stock in this state?
    * showColumn: true
* is_send_to_carrier:
    * required: false
    * type: boolean
    * title: Create Package?
    * description: Create a package in this state?
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

| Stĺpec               | Parent tabuľka     | Väzba | OnUpdate | OnDelete |
| :------------------- | :----------------- | :---: | :------: | :------: |
| id_com_mail_template | com_mail_templates | 1:N   | Cascade  | Restrict |

## Indexes

| Názov        | Typ     | Stĺpec       | Zoradenie |
| :----------- | :-----: | :----------- | :-------: |
| id           | PRIMARY | id           | ASC       |
| name         | INDEX   | name         | ASC       |
| is_available | index   | is_available | DESC      |

## Callbacks

### onBeforeInsert

Iba jeden stav môže byť predvolený - nutné kontrolovať.

### onAfterInsert

Not used.

### onBeforeUpdate

Iba jeden stav môže byť predvolený - nutné kontrolovať.
Preddefinovaný **(is_default)** stav nemôže byť nastavený ako nedostupný - nutné kontrolovať.

### onAfterUpdate

Not used.

### onBeforeDelete

Nie je možné vymazať stav, ktorý je použitý v niektorej pohľadávke - tabuľka fin_claim.


### onAfterDelete

Not used.

## Formatters

* Jemne zelený pozadím zvýrazniť riadky so stavmi, ktoré sú dostupné **(stĺpec is_available=TRUE)**. 

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
