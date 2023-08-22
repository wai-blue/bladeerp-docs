# AssetTaxDepreciation

## Introduction
Tabuľka na evidovanie daňových odpisov DHM a DNM, z ktorej sa relevantné hodnoty premietnu do kariet majetku. Vypočítavajú sa raz ročne použitím akcie AssetDepreciations/Calculate

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                           |
| :-------------------- | :------------------------------ |
| sqlName               | fin_asset_tax_depreciations     |
| urlBase               | finance/asset/tax-depreciations |
| lookupSqlValue        | -                               |
| tableTitle            | Asset Tax Depreciations         |
| formTitleForInserting | -                               |
| formTitleForEditing   | Detail Depreciation             |
| formAddButtonText     | -                               |
| formSaveButtonText    | -                               |

## SQL Structure

REVIEW DD: V Google Docs bola struktura tejto tabulka ina, ako v napr. v MainBook.

| Názov                               | Title                                                                             | Popis                                                    | Typ     | Dĺžka | Povinný |
| :---------------------------------- | :-------------------------------------------------------------------------------- | :------------------------------------------------------- | :------ | :---- | :------ |
| id                                  | ID                                                                                | Jedinečné ID záznamu                                     | INT     | 11    | Y       |
| id_fin_asset                        | Property                                                                          | Odpisovaný majetok                                       | INT     | 11    | Y       |
| year                                | Year                                                                              | Rok odpisu                                               | INT     | 4     | Y       |
| number                              | Depreciation Serial Number                                                        | Poradové číslo roku odpisu                               | INT     | 4     | Y       |
| accounting_depreciation_coefficient | Coefficient of Accounting Depreciation                                            | Koeficient účtovných odpisov                             | DECIMAL | 5,2   | Y       |
| accounting_depreciation_amount      | Amount of Accounting Depreciation                                                 | Suma účtovných odpisov                                   | DECIMAL | 15,2  | Y       |
| tax_depreciation_coefficient        | Coefficient of Tax Depreciation                                                   | Koeficient daňových odpisov                              | DECIMAL | 5,2   | Y       |
| tax_depreciation_amount             | Amount of Tax Depreciation                                                        | Suma daňových odpisov                                    | DECIMAL | 15,2  | Y       |
| difference                          | The difference between the amount of accounting depreciation and tax depreciation | Rozdiel medzi sumou účtovných odpisov a daňových odpisov | DECIMAL | 15,2  | Y       |
| amount_accounting_residual          | Residual Book Value                                                               | Zostatková účtovná hodnota                               | DECIMAL | 15,2  | Y       |
| amount_tax_residual                 | Residual Tax Value                                                                | Zostatková daňová hodnota                                | DECIMAL | 15,2  | Y       |
| posting_date                        | Posting Date                                                                      | Dátum zaúčtovania                                        | DATE    | 8     | Y       |

## Foreign Keys

| Column       | Parent table | Relation | OnUpdate | OnDelete |
| :----------- | :----------- | :------: | -------- | -------- |
| id_fin_asset | fin_assets   |   1:N    | Cascade  | Restrict |

## Indexes

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
