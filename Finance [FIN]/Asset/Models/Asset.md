# [ModelName]

## Introduction
Tabuľka slúži na evidenciu majetku. 

## Constants

| Constant                      | Value | Description          |
| :---------------------------- | :---: | :------------------- |
| FIN_ASSETS_TYPE_TANGIBLE      |   1   | Hmotný majetok       |
| FIN_ASSETS_TYPE_INTANGIBLE    |   2   | Nehmotný majetok     |
| FIN_ASSETS_METHOD_EVENLY      |   1   | Odpisovat rovnomerne |
| FIN_ASSETS_METHOD_ACCELERATED |   2   | Odpisovat zrychlene  |
## Properties

| Property              | Value                                       |
| :-------------------- | :------------------------------------------ |
| sqlName               | fin_assets                                  |
| urlBase               | finance/assets                              |
| lookupSqlValue        | {%TABLE%}.inventory_number + {%TABLE%}.name |
| tableTitle            | Assets                                      |
| formTitleForInserting | New Asset                                   |
| formTitleForEditing   | Detail Asset                                |
| formAddButtonText     | Add Asset                                   |
| formSaveButtonText    | Update Asset                                |

## SQL Structure

REVIEW DD: V Google Docs bola struktura tejto tabulka ina, ako v napr. v MainBook.

| Názov                      | Title                                           | Popis                                  | Typ     | Dĺžka | Povinný |
| :------------------------- | :---------------------------------------------- | :------------------------------------- | :------ | :---- | :------ |
| id                         | ID                                              | Jedinečné ID záznamu                   | INT     | 11    | Y       |
| inventory_number           | Inventory Number                                | Inventárne číslo                       | VARCHAR | 50    | Y       |
| name                       | Name                                            | Názov                                  | VARCHAR | 50    | Y       |
| description                | Description                                     | Popis                                  | TEXT    |       | N       |
| id_fin_currency            | Currency                                        | ID meny v uvedená vstupná cena         | INT     | 11    | Y       |
| entry_price                | Entry Price                                     | Vstupná cena                           | DECIMAL | 15,2  | Y       |
| entry_date                 | Entry Date                                      | Dátum obstarania                       | DATE    | 8     | Y       |
| procurement_method         | Procurement Method                              | Spôsob obstarania                      | VARCHAR | 100   | N       |
| commissioning_date         | Commissioning Date                              | Dátum zaradenia do užívania            | DATE    | 8     | Y       |
| notes                      | Notes                                           | Poznámky                               | TEXT    |       | N       |
| id_fin_depreciation_group  | Depreciation Group                              | Odpisová skupina                       | INT     | 11    | Y       |
| type                       | Property Type                                   | Typ majetku                            | ENUM    | 1     | Y       |
| method                     | Depreciation Method                             | Metóda odpisovania                     | ENUM    | 1     | Y       |
| is_automat                 | Automatically calculate accounting depreciation | Automaticky vypočítavať účtovné odpisy | BOOLEAN | 1     | N       |
| amount_accounting_residual | Residual Book Value                             | Zostatková účtovná hodnota             | DECIMAL | 15,2  | N       |
| amount_tax_residual        | Residual Tax Value                              | Zostatková daňová hodnota              | DECIMAL | 15,2  | N       |
| retirement_date            | Retirement Date                                 | Dátum vyradenia                        | DATE    | 8     | N       |
| retirement_reason          | Reason for Retirement                           | Dôvod vyradenia                        | VARCHAR | 100   | N       |
| retirement_method          | Retirement Method                               | Spôsob vyradenia                       | VARCHAR | 100   | N       |

## Foreign Keys
[Model neobsahuje cudzie kľúče.]
| Column                    | Parent table            | Relation | OnUpdate | OnDelete |
| :------------------------ | :---------------------- | :------: | -------- | -------- |
| id_fin_currency           | fin_currency            |   1:N    | Cascade  | Restrict |
| id_fin_depreciation_group | fin_depreciation_groups |   1:N    | Cascade  | Restrict |

## Indexes
[Pre túto tabuľku nie sú definované indexy.]
| Name             |  Type   |       Column + Order |
| :--------------- | :-----: | -------------------: |
| id               | PRIMARY |               id ASC |
| inventory_number | UNIQUE  | inventory_number ASC |
| name             |  INDEX  |             name ASC |

## Columns

REVIEW DD: V Google Docs nebola definicia ADIOS columns.

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
