# AssetDepreciationGroup

## Introduction
Táto tabuľka bude slúžiť na evidenciu odpisových skupín pre účtovné obdobia. 

## Constants
V modeli nie sú použité konštanty.

## Properties

| Property              | Value                               |
| :-------------------- | :---------------------------------- |
| sqlName               | fin_asset_depreciation_groups       |
| urlBase               | finance/asset-depreciation-groups   |
| lookupSqlValue        | {%TABLE%}.number + {%TABLE%}.period |
| tableTitle            | Asset Depreciation Groups           |
| formTitleForInserting | New Depreciation Group              |
| formTitleForEditing   | Depreciation Group                  |
| formAddButtonText     | Add Group                           |
| formSaveButtonText    | Update Group                        |

## SQL Structure

REVIEW DD: V Google Docs bola struktura tejto tabulka ina, ako v napr. v MainBook.

| Názov                    | Popis                                                                                     | Typ  | Dĺžka | Povinný |
| :----------------------- | :---------------------------------------------------------------------------------------- | :--- | :---- | :------ |
| id                       | Jedinečné ID záznamu                                                                      | INT  | 11    | Y       |
| id_fin_accounting_period | ID účtovného obdobia                                                                      | INT  | 11    | Y       |
| number                   | Číslo odpisovej skupiny                                                                   | INT  | 2     | Y       |
| period                   | Doba odpisovania v rokoch                                                                 | INT  | 2     | Y       |
| description              | Popis                                                                                     | TEXT |       | N       |
| coef_first_year          | Koeficient odpisu pre zrýchlené odpisovanie  v prvom roku                                 | INT  | 2     | Y       |
| coef_next_year           | Koeficient odpisu pre zrýchlené odpisovanie  v ďalších rokoch                             | INT  | 2     | Y       |
| coef_next_year_inc       | Koeficient odpisu pre zrýchlené odpisovanie  v ďalších rokoch pre zvýšenú zostatkovú cenu | INT  | 2     | Y       |

## Foreign Keys

| Column                   | Parent table           | Relation | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :------: | -------- | -------- |
| id_fin_accounting_period | fin_accounting_periods |   1:N    | Cascade  | Cascade  |

## Indexes
[Pre túto tabuľku nie sú definované indexy.]
| Name                            |  Type   |               Column + Order |
| :------------------------------ | :-----: | ---------------------------: |
| id                              | PRIMARY |                       id ASC |
| id_fin_accounting_period_number | UNIQUE  | id_fin_accounting_period ASC |
|                                 |         |                   number ASC |

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
