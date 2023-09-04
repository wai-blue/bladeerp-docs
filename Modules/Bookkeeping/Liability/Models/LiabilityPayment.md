# Model Bookkeeping/Liability/LiabilityPayment

## Introduction

Tabuľka bude slúžiť na evidenciu plánovaných úhrad záväzkov.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                             |
| :-------------------- | :------------------------------------------------ |
| sqlName               | bkp_liability_payments                            |
| urlBase               | bookkeeping/liability/{id_bkp_liability}/payments |
| lookupSqlValue        |                                                   |
| tableTitle            | Payments                                          |
| formTitleForInserting | New Payment                                       |
| formTitleForEditing   | Payment                                           |


## Data Structure

| Column           | Title            | ADIOS Type | Length | Required | Notes                                    |
| :--------------- | ---------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id               |                  |    int     |   8    |   TRUE   | Unique record ID                         |
| id_created_by    | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime  | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by    | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime  | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| id_bkp_liability | Liability        |   lookup   |   8    |   TRUE   | ID záväzku                               |
| due_date         | Due Date         |    date    |   8    |   TRUE   | Plánovaný dátum úhrady                   |
| payment_date     | Payment Date     |    date    |   8    |  FALSE   | Dátum úhrady                             |
| price            | Payment Price    |  decimal   |  15,2  |   TRUE   | Uhradená suma                            |
| comment          | Description      |    text    |        |  FALSE   | Poznámka k úhrade                        |

REVIEW DD: Comment, Description, alebo Poznamka?

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column           | Model                                              | Relation | OnUpdate | OnDelete |
| :--------------- | :------------------------------------------------- | :------: | -------- | -------- |
| id_created_by    | ADIOS/Core/Models/User                             |   1:N    | Cascade  | Cascade  |
| id_updated_by    | ADIOS/Core/Models/User                             |   1:N    | Cascade  | Cascade  |
| id_bkp_liability | App/Widgets/Bookkeeping/Liability/Models/Liability |   1:N    | Cascade  | Cascade  |

### Indexes

| Name             |  Type   |       Column + Order |
| :--------------- | :-----: | -------------------: |
| id               | PRIMARY |               id ASC |
| id_created_by    |  INDEX  |    id_created_by ASC |
| create_datetime  |  INDEX  |  create_datetime ASC |
| id_updated_by    |  INDEX  |    id_updated_by ASC |
| update_datetime  |  INDEX  |  update_datetime ASC |
| id_bkp_liability |  INDEX  | id_bkp_liability ASC |
| due_date         |  INDEX  |         due_date ASC |
| payment_date     |  INDEX  |     payment_date ASC |

## Callbacks

### onBeforeInsert

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu záväzku.

### onAfterInsert

Not used.

### onBeforeUpdate

Zobraziť výstrahu, ak suma platieb nepresahuje celkovú hodnotu záväzku.

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
