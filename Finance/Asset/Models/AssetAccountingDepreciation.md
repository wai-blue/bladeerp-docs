# AssetAccountingDepreciation

## Introduction

Tabuľka na evidovanie účtovných odpisov DHM a DNM, z ktorej sa relevantné hodnoty premietnu do kariet majetku. 

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                                  |
| :-------------------- | :------------------------------------- |
| sqlName               | fin_asset_accounting_depreciations     |
| urlBase               | finance/asset/accounting-depreciations |
| lookupSqlValue        | -                                      |
| tableTitle            | Asset Accounting Depreciations         |
| formTitleForInserting | New Depreciation                       |
| formTitleForEditing   | Detail Depreciation                    |
| formAddButtonText     | Add Depreciation                       |
| formSaveButtonText    | Update Depreciation                    |

## SQL Structure

REVIEW DD: V Google Docs bola struktura tejto tabulka ina, ako v napr. v MainBook.

| Názov                               | Title                                  | Popis                        | Typ     | Dĺžka | Povinný |
| :---------------------------------- | :------------------------------------- | :--------------------------- | :------ | :---- | :------ |
| id                                  | ID                                     | Jedinečné ID záznamu         | INT     | 11    | Y       |
| id_fin_asset                        | Property                               | Odpisovaný majetok           | INT     | 11    | Y       |
| year                                | Year                                   | Rok odpisu                   | INT     | 4     | Y       |
| month                               | Month                                  | Mesiac odpisu                | INT     | 2     | Y       |
| accounting_depreciation_coefficient | Coefficient of Accounting Depreciation | Koeficient účtovných odpisov | DECIMAL | 5,2   | Y       |
| accounting_depreciation_amount      | Amount of Accounting Depreciation      | Suma účtovných odpisov       | DECIMAL | 15,2  | Y       |
| amount_accounting_residual          | Residual Book Value                    | Zostatková účtovná hodnota   | DECIMAL | 15,2  | Y       |
| posting_date                        | Posting Date                           | Dátum zaúčtovania            | DATE    | 8     | Y       |

## Foreign Keys
[Model neobsahuje cudzie kľúče.]
| Column       | Parent table | Relation | OnUpdate | OnDelete |
| :----------- | :----------- | :------: | -------- | -------- |
| id_fin_asset | fin_assets   |   1:N    | Cascade  | Restrict |

## Indexes
[Pre túto tabuľku nie sú definované indexy.]
| Name              |  Type   |   Column + Order |
| :---------------- | :-----: | ---------------: |
| id                | PRIMARY |           id ASC |
| id_fin_asset_year | UNIQUE  | id_fin_asset ASC |
|                   |         |         year ASC |

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
