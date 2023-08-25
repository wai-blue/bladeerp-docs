# Model Bookkeeping/Asset/Asset

NOTE: DD pretukal.
NOTE: PA skontroloval - chyby opravené

## Introduction

Tabuľka slúži na evidenciu majetku.

## Constants

| Constant                      | Value | Description          |
| :---------------------------- | :---: | :------------------- |
| BKP_ASSETS_TYPE_TANGIBLE      |   1   | Hmotný majetok       |
| BKP_ASSETS_TYPE_INTANGIBLE    |   2   | Nehmotný majetok     |
| BKP_ASSETS_METHOD_EVENLY      |   1   | Odpisovat rovnomerne |
| BKP_ASSETS_METHOD_ACCELERATED |   2   | Odpisovat zrychlene  |

## Properties

| Property              | Value                                       |
| :-------------------- | :------------------------------------------ |
| sqlName               | bkp_assets                                  |
| urlBase               | bookkeeping/assets                          |
| lookupSqlValue        | {%TABLE%}.inventory_number + {%TABLE%}.name |
| tableTitle            | Assets                                      |
| formTitleForInserting | New Asset                                   |
| formTitleForEditing   | Detail Asset                                |
| formAddButtonText     | Add Asset                                   |
| formSaveButtonText    | Update Asset                                |

## Data Structure

| Column                     | Title                                           | ADIOS Type | Length | Required | Notes                                    |
| :------------------------- | ----------------------------------------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id                         | ID                                              |    int     |   8    |   TRUE   | Jedinečné ID záznamu                     |
| inventory_number           | Inventory Number                                |  varchar   |   50   |   TRUE   | Inventárne číslo                         |
| name                       | Name                                            |  varchar   |  100   |   TRUE   | Názov                                    |
| description                | Description                                     |    text    |        |  FALSE   | Popis                                    |
| id_bkp_currency            | Currency                                        |   lookup   |   8    |   TRUE   | ID meny v ktorej je uvedená vstupná cena |
| entry_price                | Entry Price                                     |  decimal   |  15,2  |   TRUE   | Vstupná cena                             |
| entry_date                 | Entry Date                                      |    date    |   8    |   TRUE   | Dátum obstarania                         |
| procurement_method         | Procurement Method                              |  varchar   |  100   |  FALSE   | Spôsob obstarania                        |
| commissioning_date         | Commissioning Date                              |    date    |   8    |   TRUE   | Dátum zaradenia do užívania              |
| notes                      | Notes                                           |    text    |        |  FALSE   | Poznámky                                 |
| id_bkp_depreciation_group  | Depreciation Group                              |   lookup   |   8    |   TRUE   | Odpisová skupina                         |
| type                       | Property Type                                   |    int     |   1    |   TRUE   | Typ majetku                              |
| method                     | Depreciation Method                             |    int     |   1    |   TRUE   | Metóda odpisovania                       |
| is_automat                 | Automatically calculate accounting depreciation |  boolean   |   1    |  FALSE   | Automaticky vypočítavať účtovné odpisy   |
| amount_accounting_residual | Residual Accounting Value                       |  decimal   |  15,2  |  FALSE   | Zostatková účtovná hodnota               |
| amount_tax_residual        | Residual Tax Value                              |  decimal   |  15,2  |  FALSE   | Zostatková daňová hodnota                |
| retirement_date            | Retirement Date                                 |    date    |   8    |  FALSE   | Dátum vyradenia                          |
| retirement_reason          | Reason for Retirement                           |  varchar   |  100   |  FALSE   | Dôvod vyradenia                          |
| retirement_method          | Retirement Method                               |  varchar   |  100   |  FALSE   | Spôsob vyradenia                         |

### ADIOS Parameters

| Column | Parameter   | Value               |
| :----- | :---------- | ------------------- |
| type   | enum_values | BKP_ASSETS_TYPE_*   |
| method | enum_values | BKP_ASSETS_METHOD_* |

### Foreign Keys

| Column                    | Model                                                                                                                      | Relation | OnUpdate | OnDelete |
| :------------------------ | :------------------------------------------------------------------------------------------------------------------------- | :------: | :------: | :------: |
| id_bkp_currency           | [App/Widgets/Bookkeeping/ExchangeRate/Models/Currency](../../../Bookkeeping/ExchangeRate/Models/Currency.md)               |   1:N    | Cascade  | Restrict |
| id_bkp_depreciation_group | [App/Widgets/Bookkeeping/Asset/Models/AssetDepreciationGroup](../../../Bookkeeping/Asset/Models/AssetDepreciationGroup.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                      |  Type   |                Column + Order |
| :------------------------ | :-----: | ----------------------------: |
| id                        | PRIMARY |                        id ASC |
| inventory_number          | UNIQUE  |          inventory_number ASC |
| name                      |  INDEX  |                      name ASC |
| id_bkp_currency           |  INDEX  |           id_bkp_currency ASC |
| id_bkp_depreciation_group |  INDEX  | id_bkp_depreciation_group ASC |
| commissioning_date        |  INDEX  |        commissioning_date ASC |
| type                      |  INDEX  |                      type ASC |
| method                    |  INDEX  |                    method ASC |
| is_automat                |  INDEX  |                is_automat ASC |
| retirement_date           |  INDEX  |           retirement_date ASC |
| entry_date                |  INDEX  |                entry_date ASC |

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

Majetok, ktorý už bol odpisovaný, nie je možné vymazať.

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
