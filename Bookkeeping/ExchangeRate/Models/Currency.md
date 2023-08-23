# Model Bookkeeping/ExchangeRate/Currency

## Introduction

Táto tabuľka bude slúžiť na ukladanie peňažných mien. Jedna mena bude určená ako hlavná pre dané účtovné obdobie (tab: bkp_accounting_periods) a k nej sa budú vzťahovať kurzy ďalších zahraničných mien.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                           |
| :-------------------- | :------------------------------ |
| sqlName               | bkp_currencies                  |
| urlBase               | bookkeeping/exchange/currencies |
| lookupSqlValue        | {%TABLE%}.name                  |
| tableTitle            | Currencies                      |
| formTitleForInserting | New Currency                    |
| formTitleForEditing   | Currency                        |

## Data Structure

| Column           | Title            | ADIOS Type | Length | Required | Notes                                    |
| :--------------- | ---------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id               |                  |    int     |   8    |   TRUE   | Jedinečné ID záznamu                     |
| id_created_by    | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| created_datetime | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by    | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| updated_datetime | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| name             | Name             |  varchar   |  100   |   TRUE   | Názov meny                               |
| acronym          | Acronym          |  varchar   |   3    |   TRUE   | Skratka meny                             |
| symbol           | Symbol           |  varchar   |   1    |   TRUE   | Symbol meny                              |
| is_active        | Is Active?       |  boolean   |        |   TRUE   | Príznak, či sa mena aktuálne používa     |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column        | Model           | Relation | OnUpdate | OnDelete |
| :------------ | :-------------- | :------: | -------- | -------- |
| id_created_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |
| id_updated_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |

### Indexes

| Name             |  Type   |       Column + Order |
| :--------------- | :-----: | -------------------: |
| acronym          | UNIQUE  |          acronym ASC |
| created_datetime |  INDEX  | created_datetime ASC |
| id               | PRIMARY |               id ASC |
| id_created_by    |  INDEX  |    id_created_by ASC |
| id_updated_by    |  INDEX  |    id_updated_by ASC |
| is_active        |  INDEX  |        is_active ASC |
| name             | UNIQUE  |             name ASC |
| updated_datetime |  INDEX  | updated_datetime ASC |

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
