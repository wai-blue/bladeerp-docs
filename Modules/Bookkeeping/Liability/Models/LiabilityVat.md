# Model Bookkeeping/Liability/LiabilityVat

## Introduction

Tabuľka bude slúžiť na ukladanie hodnôt pre jednotlivé úrovne DPH k záväzkom.

## Constants

No constants are defined for this model.

## Properties

| Property       | Value                                         |
| :------------- | :-------------------------------------------- |
| sqlName        | bkp_liability_vats                            |
| urlBase        | bookkeeping/liability/{id_bkp_liability}/vats |
| lookupSqlValue | {%TABLE%}.name                                |
| tableTitle     | VATs                                          |

## Data Structure

| Column           | Title            | ADIOS Type | Length | Required | Notes                                    |
| :--------------- | ---------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id               |                  |    int     |   8    |   TRUE   | Unique record ID                         |
| id_created_by    | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime  | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by    | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime  | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| id_bkp_liability | Liability        |   lookup   |   8    |   TRUE   | ID záväzku                               |
| id_bkp_vat       | VAT Rate         |   lookup   |   8    |   TRUE   | ID sadzby DPH                            |
| price_excl_vat   | Price Excl VAT   |  decimal   |  15,2  |   TRUE   | Suma bez DPH                             |
| price_vat        | Price VAT        |  decimal   |  15,2  |   TRUE   | Suma DPH                                 |
| price_incl_vat   | Price Incl VAT   |  decimal   |  15,2  |   TRUE   | Suma s DPH                               |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column           | Model           | Relation | OnUpdate | OnDelete |
| :--------------- | :-------------- | :------: | -------- | -------- |
| id_created_by    | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |
| id_updated_by    | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |
| id_bkp_liability | bkp_liabilities |   1:N    | Cascade  | Cascade  |
| id_bkp_vat       | bkp_vats        |   1:N    | Cascade  | Restrict |

### Indexes

| Name                          |  Type   |       Column + Order |
| :---------------------------- | :-----: | -------------------: |
| id                            | PRIMARY |               id ASC |
| id_created_by                 |  INDEX  |    id_created_by ASC |
| create_datetime               |  INDEX  |  create_datetime ASC |
| id_updated_by                 |  INDEX  |    id_updated_by ASC |
| update_datetime               |  INDEX  |  update_datetime ASC |
| id_bkp_liability              |  INDEX  | id_bkp_liability ASC |
| id_bkp_vat                    |  INDEX  |       id_bkp_vat ASC |
| id_bkp_liability___id_bkp_vat | UNIQUE  | id_bkp_liability ASC |
|                               |         |       id_bkp_vat ASC |

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