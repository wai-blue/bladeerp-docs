# Model Finance/ExchangeRate/ExchangeRate

## Introduction

Bude obsahovať kurzy jednotlivých mien voči hlavnej mene.

## Constants

No constants are defined for this model.

## Properties

(see ADIOS.repo/src/Core/Model.php)

| Property              | Value                  |
| :-------------------- | :--------------------- |
| sqlName               | fin_exchange_rates     |
| urlBase               | finance/exchange/rates |
| lookupSqlValue        |                        |
| tableTitle            | Exchange Rates         |
| formTitleForInserting | New Exchange Rate      |
| formTitleForEditing   | Exchange Rate          |

## Data Structure

| Column               | Title         | ADIOS Type | Length | Required | Notes                                       |
| :------------------- | ------------- | :--------: | :----: | :------: | :------------------------------------------ |
| id                   |               |    int     |   8    |   TRUE   | Jedinečné ID záznamu                        |
| id_fin_currency      | Currency      |   lookup   |   11   |   TRUE   | ID meny                                     |
| id_fin_currency_main | Main Currency |   lookup   |   11   |   TRUE   | ID hlavnej meny, voči ktorej je kurz vedený |
| rate                 | Exchange Rate |  decimal   |  15,4  |   TRUE   | Prevodný kurz meny voči hlavnej mene        |
| rate_date            | Date          |    date    |        |   TRUE   | Dátum, ku ktorému je kurz platný            |

REVIEW DD: navrh - rate_date premenovat na validity_date

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column               | Model                                            | Relation | OnUpdate | OnDelete |
| :------------------- | :----------------------------------------------- | :------: | -------- | -------- |
| id_fin_currency      | App/Widgets/Finance/ExchangeRate/Models/Currency |   1:N    | Cascade  | Restrict |
| id_fin_currency_main | App/Widgets/Finance/ExchangeRate/Models/Currency |   1:N    | Cascade  | Restrict |

### Indexes

| Name                        |  Type   |           Column + Order |
| :-------------------------- | :-----: | -----------------------: |
| id                          | PRIMARY |                   id ASC |
| id_fin_currency             |  INDEX  |      id_fin_currency ASC |
| id_fin_currency_main        |  INDEX  | id_fin_currency_main ASC |
| rate_date                   |  INDEX  |           rate_date DESC |
| id_fin_currency___rate_date | UNIQUE  |      id_fin_currency ASC |
|                             |         |           rate_date DESC |

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
