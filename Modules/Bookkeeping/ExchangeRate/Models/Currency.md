# Model Bookkeeping/ExchangeRate/Currency

## Introduction

Táto tabuľka bude slúžiť na ukladanie peňažných mien. Jedna mena bude určená ako hlavná pre dané účtovné obdobie (tab: bkp_accounting_periods) a k nej sa budú vzťahovať kurzy ďalších zahraničných mien.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                  |
| :-------------------- | :------------------------------------- |
| storeRecordInfo       | TRUE                                   |
| sqlName               | bkp_currencies                         |
| urlBase               | bookkeeping/exchange/currencies        |
| lookupSqlValue        | {%TABLE%}.name                         |
| tableTitle            | Currencies                             |
| formTitleForInserting | New Currency                           |
| formTitleForEditing   | Currency                               |
| crud/browse/action    | Bookkeeping/ExchangeRate/Currencies    |
| crud/add/action       | Bookkeeping/ExchangeRate/Currency/Add  |
| crud/edit/action      | Bookkeeping/ExchangeRate/Currency/Edit |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Jedinečné ID záznamu                       |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRUE   | Názov meny                                 |
| acronym     | Acronym     |  varchar   |   3    |   TRUE   | Skratka meny                               |
| symbol      | Symbol      |  varchar   |   1    |   TRUE   | Symbol meny                                |
| is_active   | Is Active?  |  boolean   |        |   TRUE   | Príznak, či sa mena aktuálne používa       |

### ADIOS Parameters
No additional ADIOS parameters needs to be defined.

### Foreign Keys
Model does not contain foreign keys.

### Indexes

| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| acronym   | UNIQUE  |    acronym ASC |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  |  is_active ASC |
| name      | UNIQUE  |       name ASC |

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
