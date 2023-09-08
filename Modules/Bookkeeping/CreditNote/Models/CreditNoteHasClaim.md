# Model Bookkeeping/CreditNot/CreditNoteHasClaim

## Introduction

Tabuľka bude slúžiť na prepojenie dobropisov s pohľadávkami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                               |
| :-------------------- | :-------------------------------------------------- |
| storeRecordInfo       | FALSE                                               |
| sqlName               | bkp_credit_note_has_claims                          |
| urlBase               | bookkeeping/credit-note/{id_bkp_credit_note}/claims |
| lookupSqlValue        |                                                     |
| tableTitle            | Credit Note Claims                                  |
| formTitleForInserting | New Credit Note Claim                               |
| formTitleForEditing   | Credit Note Claim                                   |
| isJunctionTable          | TRUE                                                |

## Data Structure

| Column             | Title       | ADIOS Type | Length | Required | Notes                                      |
| :----------------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id_bkp_credit_note | Credit Note |   lookup   |   8    |   TRUE   | ID dobropisu                               |
| id_bkp_claim       | Claim       |   lookup   |   8    |   TRUE   | ID pohľadávky                              |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column             | Model                                                | Relation | OnUpdate | OnDelete |
| :----------------- | :--------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_credit_note | App/Widgets/Bookkeeping/CreditNote/Models/CreditNote |   1:N    | Cascade  | Cascade  |
| id_bkp_claim       | App/Widgets/Bookkeeping/Claim/Models/Claim           |   1:N    | Cascade  | Restrict |

### Indexes

| Name               | Type  |         Column + Order |
| :----------------- | :---: | ---------------------: |
| id_bkp_credit_note | INDEX | id_bkp_credit_note ASC |
| id_bkp_claim       | INDEX |       id_bkp_claim ASC |

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
