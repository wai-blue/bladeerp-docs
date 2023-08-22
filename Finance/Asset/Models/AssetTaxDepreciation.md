# Model Finance/Asset/AssetTaxDepreciation

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

## Introduction

Tabuľka na evidovanie daňových odpisov DHM a DNM, z ktorej sa relevantné hodnoty premietnu do kariet majetku. Vypočítavajú sa raz ročne použitím akcie AssetDepreciations/Calculate

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                           |
| :-------------------- | :------------------------------ |
| sqlName               | fin_asset_tax_depreciations     |
| urlBase               | finance/asset/tax-depreciations |
| lookupSqlValue        |                                 |
| tableTitle            | Asset Tax Depreciations         |
| formTitleForInserting |                                 |
| formTitleForEditing   | Detail Depreciation             |
| formAddButtonText     |                                 |
| formSaveButtonText    |                                 |

## Data Structure

| Column                              | Title                                  | ADIOS Type | Length | Required | Notes                        |
| :---------------------------------- | -------------------------------------- | :--------: | :----: | :------: | :--------------------------- |
| id                                  | ID                                     |    int     |   11   |   TRUE   | Jedinečné ID záznamu         |
| id_fin_asset                        | Property                               |   lookup   |   11   |   TRUE   | Odpisovaný majetok           |
| year                                | Year                                   |    int     |   4    |   TRUE   | Rok odpisu                   |
| month                               | Month                                  |    int     |   2    |   TRUE   | Mesiac odpisu                |
| accounting_depreciation_coefficient | Coefficient of Accounting Depreciation |  decimal   |  5,2   |   TRUE   | Koeficient účtovných odpisov |
| accounting_depreciation_amount      | Amount of Accounting Depreciation      |  decimal   |  15,2  |   TRUE   | Suma účtovných odpisov       |
| amount_accounting_residual          | Residual Book Value                    |  decimal   |  15,2  |   TRUE   | Zostatková účtovná hodnota   |
| posting_date                        | Posting Date                           |    date    |   8    |   TRUE   | Dátum zaúčtovania            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column       | Model                                                                            | Relation | OnUpdate | OnDelete |
| :----------- | :------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_fin_asset | [App/Widgets/Finance/Asset/Models/Asset](../../../Finance/Asset/Models/Asset.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                |  Type   |   Column + Order |
| :------------------ | :-----: | ---------------: |
| id                  | PRIMARY |           id ASC |
| id_fin_asset        |  INDEX  | id_fin_asset ASC |
| id_fin_asset___year | UNIQUE  | id_fin_asset ASC |
|                     |         |         year ASC |

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
