# Model Bookkeeping/Asset/AssetDepreciationGroup

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

## Introduction

Táto tabuľka bude slúžiť na evidenciu odpisových skupín pre účtovné obdobia. 

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                               |
| :-------------------- | :---------------------------------- |
| sqlName               | bkp_asset_depreciation_groups       |
| urlBase               | bookkeeping/asset-depreciation-groups   |
| lookupSqlValue        | {%TABLE%}.number + {%TABLE%}.period |
| tableTitle            | Asset Depreciation Groups           |
| formTitleForInserting | New Depreciation Group              |
| formTitleForEditing   | Depreciation Group                  |
| formAddButtonText     | Add Group                           |
| formSaveButtonText    | Update Group                        |

## Data Structure

| Column                   | Title                                                                                    | ADIOS Type | Length | Required | Notes                                                                                     |
| :----------------------- | ---------------------------------------------------------------------------------------- | :--------: | :----: | :------: | :---------------------------------------------------------------------------------------- |
| id                       |                                                                                          |    int     |   11   |   TRUE   | Jedinečné ID záznamu                                                                      |
| id_bkp_accounting_period | ID účtovného obdobia                                                                     |   lookup   |   11   |   TRUE   | ID účtovného obdobia                                                                      |
| number                   | Číslo odpisovej skupiny                                                                  |    int     |   2    |   TRUE   | Číslo odpisovej skupiny                                                                   |
| period                   | Doba odpisovania v rokoch                                                                |    int     |   2    |   TRUE   | Doba odpisovania v rokoch                                                                 |
| description              | Popis                                                                                    |    text    |        |  FALSE   | Popis                                                                                     |
| coef_first_year          | Koeficient odpisu pre zrýchlené odpisovanie v prvom roku                                 |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie  v prvom roku                                 |
| coef_next_year           | Koeficient odpisu pre zrýchlené odpisovanie  v ďalších rokoch                            |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie  v ďalších rokoch                             |
| coef_next_year_inc       | Koeficient odpisu pre zrýchlené odpisovanie v ďalších rokoch pre zvýšenú zostatkovú cenu |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie  v ďalších rokoch pre zvýšenú zostatkovú cenu |

REVIEW DD: coef_* nemaju byt decimals?

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                        | Relation | OnUpdate | OnDelete |
| :----------------------- | :----------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
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
