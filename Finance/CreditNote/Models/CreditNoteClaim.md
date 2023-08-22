# Model Finance/CreditNot/CreditNoteClaim

## Introduction

Tabuľka bude slúžiť na prepojenie dobropisov s pohľadávkami.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                           |
| :-------------------- | :---------------------------------------------- |
| sqlName               | fin_credit_note_claims                          |
| urlBase               | finance/credit-note/{id_fin_credit_note}/claims |
| lookupSqlValue        |                                                 |
| tableTitle            | Credit Note Claims                              |
| formTitleForInserting | New Credit Note Claim                           |
| formTitleForEditing   | Credit Note Claim                               |
| isCrossTable          | TRUE                                            |

REVIEW DD: pridane isCrossTable

## Data Structure

| Column             | Title       | ADIOS Type | Length | Required | Notes         |
| :----------------- | ----------- | :--------: | :----: | :------: | :------------ |
| id_fin_credit_note | Credit Note |   lookup   |   8    |   TRUE   | ID dobropisu  |
| id_fin_claim       | Claim       |   lookup   |   8    |   TRUE   | ID pohľadávky |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column             | Model                                            | Relation | OnUpdate | OnDelete |
| :----------------- | :----------------------------------------------- | :------: | -------- | -------- |
| id_fin_credit_note | App/Widgets/Finance/CreditNote/Models/CreditNote |   1:N    | Cascade  | Cascade  |
| id_fin_claim       | App/Widgets/Finance/Claim/Models/Claim           |   1:N    | Cascade  | Restrict |

### Indexes

| Name               | Type  |         Column + Order |
| :----------------- | :---: | ---------------------: |
| id_fin_credit_note | INDEX | id_fin_credit_note ASC |
| id_fin_claim       | INDEX |       id_fin_claim ASC |

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
