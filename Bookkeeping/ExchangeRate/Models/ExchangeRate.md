# Model Bookkeeping/ExchangeRate/ExchangeRate

## Introduction

Bude obsahovať kurzy jednotlivých mien voči hlavnej mene.

## Constants

No constants are defined for this model.

## Properties

(see ADIOS.repo/src/Core/Model.php)

| Property              | Value                  |
| :-------------------- | :--------------------- |
| sqlName               | bkp_exchange_rates     |
| urlBase               | bookkeeping/exchange/rates |
| lookupSqlValue        |                        |
| tableTitle            | Exchange Rates         |
| formTitleForInserting | New Exchange Rate      |
| formTitleForEditing   | Exchange Rate          |

## Data Structure

| Column               | Title            | ADIOS Type | Length | Required | Notes                                       |
| :------------------- | ---------------- | :--------: | :----: | :------: | :------------------------------------------ |
| id                   |                  |    int     |   8    |   TRUE   | Jedinečné ID záznamu                        |
| id_created_by        | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record    |
| create_datetime     | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created                 |
| id_updated_by        | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record    |
| update_datetime     | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated                 |
| id_bkp_currency      | Currency         |   lookup   |   11   |   TRUE   | ID meny                                     |
| id_bkp_currency_main | Main Currency    |   lookup   |   11   |   TRUE   | ID hlavnej meny, voči ktorej je kurz vedený |
| rate                 | Exchange Rate    |  decimal   |  15,4  |   TRUE   | Prevodný kurz meny voči hlavnej mene        |
| rate_date            | Date             |    date    |        |   TRUE   | Dátum, ku ktorému je kurz platný            |

REVIEW DD: navrh - rate_date premenovat na validity_date

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column               | Model                                            | Relation | OnUpdate | OnDelete |
| :------------------- | :----------------------------------------------- | :------: | -------- | -------- |
| id_created_by        | ADIOS/Core/User                                  |   1:N    | Cascade  | Cascade  |
| id_updated_by        | ADIOS/Core/User                                  |   1:N    | Cascade  | Cascade  |
| id_bkp_currency      | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency |   1:N    | Cascade  | Restrict |
| id_bkp_currency_main | App/Widgets/Bookkeeping/ExchangeRate/Models/Currency |   1:N    | Cascade  | Restrict |

### Indexes

| Name                        |  Type   |           Column + Order |
| :-------------------------- | :-----: | -----------------------: |
| id                          | PRIMARY |                   id ASC |
| id_created_by               |  INDEX  |        id_created_by ASC |
| create_datetime            |  INDEX  |     create_datetime ASC |
| id_updated_by               |  INDEX  |        id_updated_by ASC |
| update_datetime            |  INDEX  |     update_datetime ASC |
| id_bkp_currency             |  INDEX  |      id_bkp_currency ASC |
| id_bkp_currency_main        |  INDEX  | id_bkp_currency_main ASC |
| rate_date                   |  INDEX  |           rate_date DESC |
| id_bkp_currency___rate_date | UNIQUE  |      id_bkp_currency ASC |
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
