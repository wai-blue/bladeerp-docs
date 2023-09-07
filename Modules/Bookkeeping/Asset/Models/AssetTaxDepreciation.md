# Model Bookkeeping/Asset/AssetTaxDepreciation

NOTE: DD pretukal.
NOTE: PA skontroloval - chyby opravené

## Introduction

Tabuľka na evidovanie daňových odpisov DHM a DNM, z ktorej sa relevantné hodnoty premietnu do kariet majetku. Vypočítavajú sa raz ročne použitím akcie Bookkeeping/Asset/Actions/AssetTaxDepreciations/Calculate

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                       |
| :-------------------- | :------------------------------------------ |
| sqlName               | bkp_asset_tax_depreciations                 |
| urlBase               | bookkeeping/asset/tax-depreciations         |
| lookupSqlValue        |                                             |
| tableTitle            | Asset Tax Depreciations                     |
| formTitleForInserting |                                             |
| formTitleForEditing   | Detail Depreciation                         |
| formAddButtonText     |                                             |
| formSaveButtonText    |                                             |
| crud/browse/action    | Bookkeeping/AssetTaxDepreciation/Assets     |
| crud/add/action       | Bookkeeping/AssetTaxDepreciation/Asset/Add  |
| crud/edit/action      | Bookkeeping/AssetTaxDepreciation/Asset/Edit |

## Data Structure

| Column                              | Title                                                                             | ADIOS Type | Length | Required | Notes                        |
| :---------------------------------- | --------------------------------------------------------------------------------- | :--------: | :----: | :------: | :--------------------------- |
| record_info                         | Record Info                                                                       |    json    |        |   TRUE   |                              |
| id                                  | ID                                                                                |    int     |   8    |   TRUE   | Jedinečné ID záznamu         |
| id_bkp_asset                        | Property                                                                          |   lookup   |   8    |   TRUE   | Odpisovaný majetok           |
| id_bkp_accounting_period            | Accounting period                                                                 |   lookup   |   8    |   TRUE   | Účtovné obdobie              |
| year                                | Year                                                                              |    int     |   4    |   TRUE   | Rok odpisu                   |
| number                              | Depreciation Serial Number                                                        |    int     |   4    |   TRUE   | Poradové číslo roku odpisu   |
| accounting_depreciation_coefficient | Coefficient of Accounting Depreciation                                            |  decimal   |  5,2   |   TRUE   | Koeficient účtovných odpisov |
| accounting_depreciation_amount      | Amount of Accounting Depreciation                                                 |  decimal   |  15,2  |   TRUE   | Suma účtovných odpisov       |
| tax_depreciation_coefficient        | Coefficient of Tax Depreciation                                                   |  decimal   |  5,2   |   TRUE   | Koeficient daňových odpisov  |
| tax_depreciation_amount             | Amount of Tax Depreciation                                                        |  decimal   |  15,2  |   TRUE   | Suma daňových odpisov        |
| difference                          | The difference between the amount of accounting depreciation and tax depreciation |  decimal   |  15,2  |  FALSE   | Suma daňových odpisov        |
| amount_accounting_residual          | Residual Accounting Value                                                         |  decimal   |  15,2  |  FALSE   | Zostatková účtovná hodnota   |
| amount_tax_residual                 | Residual Tax Value                                                                |  decimal   |  15,2  |  FALSE   | Zostatková daňová hodnota    |
| posting_date                        | Posting Date                                                                      |    date    |   8    |   TRUE   | Dátum zaúčtovania            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                                | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_asset             | [App/Widgets/Bookkeeping/Asset/Models/Asset](../../../Bookkeeping/Asset/Models/Asset.md)                             |   1:N    | Cascade  | Restrict |
| id_bkp_accounting_period | [App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod](../../../Bookkeeping/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                     |  Type   |               Column + Order |
| :----------------------- | :-----: | ---------------------------: |
| id                       | PRIMARY |                       id ASC |
| number                   |  INDEX  |                   number ASC |
| year                     |  INDEX  |                     year ASC |
| posting_date             |  INDEX  |             posting_date ASC |
| id_bkp_asset             |  INDEX  |             id_bkp_asset ASC |
| id_bkp_asset___year      | UNIQUE  |             id_bkp_asset ASC |
|                          |         |                     year ASC |
| id_bkp_accounting_period |  INDEX  | id_bkp_accounting_period ASC |

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

Záznamy je možné mazať iba v prípade, ze nie je uzavreté účtovné obdobie ku ktorému patria.
Pred vymazaním záznamov je potrebné skontrolovať, či bol zapísané v denníku (akcia Calculate). Ak áno, je potrebné pridať do denníka opačné zápisy.

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
