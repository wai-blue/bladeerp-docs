# CreditNoteClaim

## Introduction

Tabuľka bude slúžiť na prepojenie dobropisov s pohľadávkami.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                                           |
| :-------------------- | :---------------------------------------------- |
| sqlName               | fin_credit_note_claims                          |
| urlBase               | finance/credit-note/{id_fin_credit_note}/claims |
| lookupSqlValue        | -                                               |
| tableTitle            | Credit Note Claims                              |
| formTitleForInserting | New Credit Note Claim                           |
| formTitleForEditing   | Credit Note Claim                               |

## SQL Structure

| Column             | Description   | Type | Length |   NULL   | Default |
| :----------------- | :------------ | :--: | :----: | :------: | :------ |
| id_fin_credit_note | ID dobropisu  | INT  |   8    | NOT NULL |         |
| id_fin_claim       | ID pohľadávky | INT  |   8    | NOT NULL |         |

## Columns

* id_fin_credit_note:
    * required: true
    * type: lookup
    * title: CreditNote
    * model: App/Widgets/Finance/CreditNote/Models/CreditNote
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: CASCADE
    * showColumn: true
* id_fin_claim:
    * required: true
    * type: lookup
    * title: Claim
    * model: App/Widgets/Finance/Claim/Models/Claim
    * foreignKeyOnUpdate: CASCADE
    * foreignKeyOnDelete: RESTRICT
    * showColumn: true

## Foreign Keys

| Column             | Parent table     | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------- | :------: | :------: | :------: |
| id_fin_credit_note | fin_credit_notes |   1:N    | Cascade  | Cascade  |
| id_fin_claim       | fin_claims       |   1:N    | Cascade  | Restrict |

## Indexes

Tabuľka nemá iné indexy.

## Callbacks

### onBeforeInsert

Not used.

### onAfterInsert

Not used.

### onBeforeUpdate

Not used.

### onAfterUpdate

Not used.

### onBeforeDelete

Not used.

### onAfterDelete

Not used.

## Formatters

V tomto modeli nie sú použité formátery.

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
