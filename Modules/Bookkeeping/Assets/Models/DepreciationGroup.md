# Model Bookkeeping/Assets/DepreciationGroup

## Introduction

Táto tabuľka bude slúžiť na evidenciu odpisových skupín pre účtovné obdobia.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                          |
| :-------------------- | :--------------------------------------------- |
| storeRecordInfo       | TRUE                                           |
| sqlName               | bkp_asset_depreciation_groups                  |
| urlBase               | bookkeeping/asset-depreciation-groups          |
| lookupSqlValue        | {%TABLE%}.number + {%TABLE%}.period            |
| tableTitle            | Asset Depreciation Groups                      |
| formTitleForInserting | New Depreciation Group                         |
| formTitleForEditing   | Depreciation Group                             |
| formAddButtonText     | Add Group                                      |
| formSaveButtonText    | Update Group                                   |
| crud/browse/action    | Bookkeeping/Assets/DepreciationGroups          |
| crud/add/action       | Bookkeeping/Assets/DepreciationGroup/AddOrEdit |
| crud/edit/action      | Bookkeeping/Assets/DepreciationGroup/AddOrEdit |

## Data Structure

| Column                   | Title                                                      | ADIOS Type | Length | Required | Notes                                                                                    |
| :----------------------- | :--------------------------------------------------------- | :--------: | :----: | :------: | :--------------------------------------------------------------------------------------- |
| id                       | ID                                                         |    int     |   8    |   TRUE   | Unique record ID                                                                         |
| record_info              | Record Info                                                |    json    |        |   TRUE   |                                                                                          |
| id_bkp_accounting_period | Accounting Period                                          |   lookup   |   8    |   TRUE   |                                                                                          |
| number                   | Group Number                                               |    int     |   2    |   TRUE   |                                                                                          |
| period                   | Depreciation Period                                        |    int     |   2    |   TRUE   |                                                                                          |
| description              | Description                                                |    text    |        |  FALSE   |                                                                                          |
| coef_first_year          | Coefficient in the first year                              |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie v prvom roku                                 |
| coef_next_year           | Coefficient in next years                                  |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie v ďalších rokoch                             |
| coef_next_year_inc       | Coefficient in next years for the increased residual price |    int     |   2    |   TRUE   | Koeficient odpisu pre zrýchlené odpisovanie v ďalších rokoch pre zvýšenú zostatkovú cenu |

### ADIOS Parameters

| Column | Parameter | Value   |
| :----- | :-------- | ------- |
| period | unit      | year(s) |

### Foreign Keys

| Column                   | Model                                                    | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_accounting_period | App/Widgets/Bookkeeping/Books/Models/AccountingPeriod |   1:N    | Cascade  | Cascade  |

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
