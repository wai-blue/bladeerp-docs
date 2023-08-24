# Model Bookkeeping/Claim/ClaimState

## Introduction

Tabuľka obsahuje definíciu stavov pohľadávok a procesy, ktoré sa majú automaticky stať.

Jeden stav musí byť vždy označený ako predvolený.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                |
| --------------------- | -------------------- |
| sqlName               | bkp_claim_states     |
| urlBase               | bookkeeping/claim/states |
| lookupSqlValue        | {%TABLE%}.name       |
| tableTitle            | States               |
| formTitleForInserting | New State            |
| formTitleForEditing   | State                |

## Data Structure

| Column                    | Title                 | ADIOS Type | Length | Required | Notes                                                           |
| :------------------------ | --------------------- | :--------: | :----: | :------: | :-------------------------------------------------------------- |
| id                        |                       |    int     |   8    |   TRUE   | Jedinečné ID záznamu                                            |
| name                      | Name                  |  varchar   |   50   |   TRUE   | Názov stavu                                                     |
| is_available              | Is Available          |  boolean   |   1    |   TRUE   | Je možné tento stav použiť?                                     |
| is_default                | Is Default            |  boolean   |   1    |   TRUE   | Je to predvolený stav pohľadávky                                |
| state_sequence            | Order In Select       |    int     |   6    |  FALSE   | Poradové číslo stavu v select boxoch                            |
| is_sequence_code_assigned | Assign Sequence Code? |  boolean   |   1    |   TRUE   | Či sa už má v danom stave priradiť sekvenčný kód alebo ešte nie |
| is_send_mail              | Send Mail?            |  boolean   |   1    |  FALSE   | Má sa poslať mail o zmene stavu?                                |
| id_com_mail_template      | Email Template        |   lookup   |   8    |  FALSE   | ID šablóny mailu                                                |
| is_send_claim             | Send Claim?           |  boolean   |   1    |  FALSE   | Má sa k mailu pripojiť pohľadávka?                              |
| is_send_order             | Send Order?           |  boolean   |   1    |  FALSE   | Má sa k mailu pripojiť objednávka?                              |
| is_storno_reservation     | Storno Reservation?   |  boolean   |   1    |  FALSE   | Má sa zrušiť rezervácia tovaru na sklade?                       |
| is_remove_stock           | Remove Stock?         |  boolean   |   1    |  FALSE   | Má sa odpočítať fakturované množstvo zo skladu?                 |
| is_send_to_carrier        | Create Package?       |  boolean   |   1    |  FALSE   | Má sa vytvoriť balík u dopravcu?                                |
| is_allowed_update         | Can Update?           |  boolean   |   1    |   TRUE   | Môže sa meniť obsah?                                            |
| is_allowed_delete         | Can Delete?           |  boolean   |   1    |   TRUE   | Môže sa zmazať?                                                 |

REVIEW DD: is_sequence_code_assigned - Title celkom nekoresponduje s nazvom stlpca a s popisom.
REVIEW DD: is_storno_reservation - namiesto 'storno' navrhujem pouzit 'cancel'.
REVIEW DD: Navrh is_send_to_carrier -> is_send_to_delivery_service

### ADIOS Parameters

| Column                | Parameter   | Value                                                                   |
| :-------------------- | :---------- | ----------------------------------------------------------------------- |
| is_default            | description | Is this the default state or not?                                       |
| state_sequence        | description | Order of the state in input lists.                                      |
| is_send_mail          | description | Should a sequence code and a variable symbol be assigned in this state? |
| is_send_claim         | description | Attach the claim to email?                                              |
| is_send_order         | description | Attach related order to email?                                          |
| is_storno_reservation | description | Should the reservation be canceled in this state?                       |
| is_remove_stock       | description | Remove stock in this state?                                             |
| is_send_to_carrier    | description | Create a package in this state?                                         |
| is_allowed_update     | description | Is update allowed in this state?                                        |
| is_allowed_delete     | description | Is it allowed to delete in this state?                                  |

### Foreign Keys

| Column               | Model                                    | Relation | OnUpdate | OnDelete |
| :------------------- | :--------------------------------------- | :------: | -------- | -------- |
| id_com_mail_template | App/Widgets/Common/Email/Models/Template |   1:N    | Cascade  | Restrict |

### Indexes

| Name                      | Type    |                 Column + Order |
| :------------------------ | :------ | -----------------------------: |
| id                        | PRIMARY |                         id ASC |
| name                      | INDEX   |                       name ASC |
| is_available              | INDEX   |              is_available DESC |
| is_default                | INDEX   |                is_default DESC |
| state_sequence            | INDEX   |            state_sequence DESC |
| is_sequence_code_assigned | INDEX   | is_sequence_code_assigned DESC |
| is_send_mail              | INDEX   |              is_send_mail DESC |
| id_com_mail_template      | INDEX   |      id_com_mail_template DESC |
| is_send_claim             | INDEX   |             is_send_claim DESC |
| is_send_order             | INDEX   |             is_send_order DESC |
| is_storno_reservation     | INDEX   |     is_storno_reservation DESC |
| is_remove_stock           | INDEX   |           is_remove_stock DESC |
| is_send_to_carrier        | INDEX   |        is_send_to_carrier DESC |
| is_allowed_update         | INDEX   |         is_allowed_update DESC |
| is_allowed_delete         | INDEX   |         is_allowed_delete DESC |

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

Nie je možné vymazať stav, ktorý je použitý v niektorej pohľadávke - tabuľka bkp_claim.


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
