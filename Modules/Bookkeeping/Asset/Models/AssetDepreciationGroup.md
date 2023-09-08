# Model Bookkeeping/Asset/AssetDepreciationGroup

NOTE: DD pretukal.
NOTE: PA skontroloval - chyby opravené

## Introduction

Táto tabuľka bude slúžiť na evidenciu odpisových skupín pre účtovné obdobia.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                         |
| :-------------------- | :-------------------------------------------- |
| storeRecordInfo       | TRUE                                          |
| sqlName               | bkp_asset_depreciation_groups                 |
| urlBase               | bookkeeping/asset-depreciation-groups         |
| lookupSqlValue        | {%TABLE%}.number + {%TABLE%}.period           |
| tableTitle            | Asset Depreciation Groups                     |
| formTitleForInserting | New Depreciation Group                        |
| formTitleForEditing   | Depreciation Group                            |
| formAddButtonText     | Add Group                                     |
| formSaveButtonText    | Update Group                                  |
| crud/browse/action    | Bookkeeping/AssetDepreciationGroup/Assets     |
| crud/add/action       | Bookkeeping/AssetDepreciationGroup/Asset/Add  |
| crud/edit/action      | Bookkeeping/AssetDepreciationGroup/Asset/Edit |

## Data Structure

| Column                   | Title                                                      | ADIOS Type | Length | Required | Notes                                                                                    |
| :----------------------- | :--------------------------------------------------------- | :--------: | :----: | :------: | :--------------------------------------------------------------------------------------- |
| id                       | ID                                                         |    int     |   8    |   TRUE   | Jedinečné ID záznamu                                                                     |
| record_info              | Record Info                                                |    json    |        |   TRUE   |                                                                                          |
| id_bkp_accounting_period | Accounting Period                                          |   lookup   |   8    |   TRUE   | ID účtovného obdobia                                                                     |
| number                   | Group Number                                               |    int     |   2    |   TRUE   | Číslo odpisovej skupiny                                                                  |
| period                   | Depreciation Period                                        |    int     |   2    |   TRUE   | Doba odpisovania v rokoch                                                                |
| description              | Description                                                |    text    |        |  FALSE   | Popis                                                                                    |
| coef_first_year          | Coefficient in the first year                              |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie v prvom roku                                 |
| coef_next_year           | Coefficient in next years                                  |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie v ďalších rokoch                             |
| coef_next_year_inc       | Coefficient in next years for the increased residual price |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie v ďalších rokoch pre zvýšenú zostatkovú cenu |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                                | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_accounting_period | [App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod](../../../Bookkeeping/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Cascade  |

### Indexes
[Pre túto tabuľku nie sú definované indexy.]
| Name                              |  Type   |               Column + Order |
| :-------------------------------- | :-----: | ---------------------------: |
| id                                | PRIMARY |                       id ASC |
| number                            |  INDEX  |                   number ASC |
| period                            |  INDEX  |                   period ASC |
| coef_first_year                   |  INDEX  |          coef_first_year ASC |
| coef_next_year                    |  INDEX  |           coef_next_year ASC |
| coef_next_year_inc                |  INDEX  |       coef_next_year_inc ASC |
| id_bkp_accounting_period          |  INDEX  | id_bkp_accounting_period ASC |
| id_bkp_accounting_period___number | UNIQUE  | id_bkp_accounting_period ASC |
|                                   |         |                   number ASC |

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
