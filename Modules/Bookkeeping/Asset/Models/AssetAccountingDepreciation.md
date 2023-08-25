# Model Bookkeeping/Asset/AssetAccountingDepreciation

NOTE: DD pretukal.
NOTE: PA skontroloval - chyby opravené

## Introduction

Tabuľka na evidovanie účtovných odpisov DHM a DNM, z ktorej sa relevantné hodnoty premietnu do kariet majetku. Vypočítavajú sa raz mesačne použitím akcie Bookkeeping/Asset/Actions/AssetAccountingDepreciations/Calculate

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                      |
| :-------------------- | :----------------------------------------- |
| sqlName               | bkp_asset_accounting_depreciations         |
| urlBase               | bookkeeping/asset/accounting-depreciations |
| lookupSqlValue        | -                                          |
| tableTitle            | Asset Accounting Depreciations             |
| formTitleForInserting |                                            |
| formTitleForEditing   | Detail Depreciation                        |
| formAddButtonText     |                                            |
| formSaveButtonText    |                                            |

## Data Structure

| Column                              | Title                                  | ADIOS Type | Length | Required | Notes                        |
| :---------------------------------- | -------------------------------------- | :--------: | :----: | :------: | :--------------------------- |
| id                                  | ID                                     |    int     |   8    |   TRUE   | Jedinečné ID záznamu         |
| id_bkp_asset                        | Property                               |   lookup   |   8    |   TRUE   | Odpisovaný majetok           |
| id_bkp_accounting_period            | Accounting period                      |   lookup   |   8    |   TRUE   | Účtovné obdobie              |
| year                                | Year                                   |    int     |   4    |   TRUE   | Rok odpisu                   |
| month                               | Month                                  |    int     |   2    |   TRUE   | Mesiac odpisu                |
| accounting_depreciation_coefficient | Coefficient of Accounting Depreciation |  decimal   |  5,2   |   TRUE   | Koeficient účtovných odpisov |
| accounting_depreciation_amount      | Amount of Accounting Depreciation      |  decimal   |  15,2  |   TRUE   | Suma účtovných odpisov       |
| amount_accounting_residual          | Residual Accounting Value              |  decimal   |  15,2  |  FALSE   | Zostatková účtovná hodnota   |
| posting_date                        | Posting Date                           |    date    |   8    |   TRUE   | Dátum zaúčtovania            |

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
| id_bkp_asset             |  INDEX  |             id_bkp_asset ASC |
| id_bkp_accounting_period |  INDEX  | id_bkp_accounting_period ASC |
| year                     |  INDEX  |                     year ASC |
| month                    |  INDEX  |                    month ASC |
| posting_date             |  INDEX  |             posting_date ASC |
| id_bkp_asset___year      | UNIQUE  |             id_bkp_asset ASC |
|                          |         |                     year ASC |

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
