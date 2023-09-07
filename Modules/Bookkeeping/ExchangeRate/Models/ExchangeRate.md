# Model Bookkeeping/ExchangeRate/ExchangeRate

## Introduction

Bude obsahovať kurzy jednotlivých mien voči hlavnej mene.

## Constants

No constants are defined for this model.

## Properties

(see ADIOS.repo/src/Core/Model.php)

| Property              | Value                                      |
| :-------------------- | :----------------------------------------- |
| sqlName               | bkp_exchange_rates                         |
| urlBase               | bookkeeping/exchange/rates                 |
| lookupSqlValue        |                                            |
| tableTitle            | Exchange Rates                             |
| formTitleForInserting | New Exchange Rate                          |
| formTitleForEditing   | Exchange Rate                              |
| crud/browse/action    | Bookkeeping/ExchangeRate/ExchangeRates     |
| crud/add/action       | Bookkeeping/ExchangeRate/ExchangeRate/Add  |
| crud/edit/action      | Bookkeeping/ExchangeRate/ExchangeRate/Edit |

## Data Structure

| Column               | Title         | ADIOS Type | Length | Required | Notes                                       |
| :------------------- | ------------- | :--------: | :----: | :------: | :------------------------------------------ |
| id                   |               |    int     |   8    |   TRUE   | Jedinečné ID záznamu                        |
| record_info          | Record Info   |    json    |        |   TRUE   |                                             |
| id_bkp_currency      | Currency      |   lookup   |   11   |   TRUE   | ID meny                                     |
| id_bkp_currency_main | Main Currency |   lookup   |   11   |   TRUE   | ID hlavnej meny, voči ktorej je kurz vedený |
| rate                 | Exchange Rate |  decimal   |  15,4  |   TRUE   | Prevodný kurz meny voči hlavnej mene        |
| validity_date        | Date          |    date    |        |   TRUE   | Dátum, ku ktorému je kurz platný            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column               | Model                                                | Relation | OnUpdate | OnDelete |
| :------------------- | :--------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_currency      | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency |   1:N    | Cascade  | Restrict |
| id_bkp_currency_main | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency |   1:N    | Cascade  | Restrict |

### Indexes

| Name                            |  Type   |           Column + Order |
| :------------------------------ | :-----: | -----------------------: |
| id                              | PRIMARY |                   id ASC |
| id_bkp_currency                 |  INDEX  |      id_bkp_currency ASC |
| id_bkp_currency_main            |  INDEX  | id_bkp_currency_main ASC |
| validity_date                   |  INDEX  |       validity_date DESC |
| id_bkp_currency___validity_date | UNIQUE  |      id_bkp_currency ASC |
|                                 |         |       validity_date DESC |

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
