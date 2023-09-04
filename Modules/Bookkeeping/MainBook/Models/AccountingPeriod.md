# Model BookKeeping/MainBook/AccountingPeriod

## Introduction

Budú tu zapísané všetky účtovné obdobia, ktoré sa používali alebo používajú. Všetky operácie sa týkajú účtovného obdobia. Takéto obdobie býva zvyčajne jeden kalendárny rok, ale je možné nastaviť aj kratšie účtovné obdobia.

Práca s účtovnými obdobiami musí byť výlučne v kompetencii Hlavného účtovníka.

Účtovanie dokladov je možné iba do otvoreného účtovného obdobia.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                    |
| :-------------------- | :--------------------------------------- |
| sqlName               | bkp_accounting_periods                   |
| urlBase               | bookkeeping/main-book/accounting-periods |
| lookupSqlValue        | {%TABLE%}.name                           |
| tableTitle            | Accounting periods                       |
| formTitleForInserting | New Accounting Period                    |
| formTitleForEditing   | Accounting Period                        |

## Data Structure

| Column                   | Title                      | ADIOS Type | Length | Required | Notes                                                                                     |
| :----------------------- | -------------------------- | :--------: | :----: | :------: | :---------------------------------------------------------------------------------------- |
| id                       |                            |    int     |   8    |   TRUE   | Unique record ID                                                                          |
| id_created_by            | Created By                 |   lookup   |   8    |   TRUE   | Reference to user who created the record                                                  |
| create_datetime          | Created Datetime           |  datetime  |   8    |   TRUE   | When the record was created                                                               |
| id_updated_by            | Updated By                 |   lookup   |   8    |   TRUE   | Reference to user who updated the record                                                  |
| update_datetime          | Updated Datetime           |  datetime  |   8    |   TRUE   | When the record was updated                                                               |
| name                     | Name                       |  varchar   |  100   |   TRUE   | Názov účtovného obdobia                                                                   |
| start_date               | Start Date                 |    date    |   8    |   TRUE   | Začiatok účtovného obdobia                                                                |
| end_date                 | End Date                   |    date    |   8    |   TRUE   | Koniec účtovného obdobia                                                                  |
| is_open                  | Is Open                    |  boolean   |   1    |   TRUE   | Príznak, či je účtovné obdobie otvorené a je možné v rámci tohto obdobia pridávať doklady |
| id_bkp_accounting_period | Previous Accounting Period |    lookup     |   8    |  FALSE   | ID predchádzajúceho účtovného obdobia                                                     |
| id_bkp_currency          | Main Currency              |    lookup     |   8    |   TRUE   | Hlavná mena účtovného obdobia                                                             |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                  | Relation | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :------: | -------- | -------- |
| id_created_by            | ADIOS/Core/Models/User |   1:N    | Cascade  | Cascade  |
| id_updated_by            | ADIOS/Core/Models/User |   1:N    | Cascade  | Cascade  |
| id_bkp_accounting_period | bkp_accounting_periods |   1:N    | Cascade  | Cascade  |
| id_bkp_currency          | bkp_currencies         |   1:N    | Cascade  | Restrict |

### Indexes

| Name                     |  Type   |               Column + Order |
| :----------------------- | :-----: | ---------------------------: |
| id                       | PRIMARY |                       id ASC |
| id_created_by            |  INDEX  |            id_created_by ASC |
| create_datetime          |  INDEX  |          create_datetime ASC |
| id_updated_by            |  INDEX  |            id_updated_by ASC |
| update_datetime          |  INDEX  |          update_datetime ASC |
| name                     | UNIQUE  |                     name ASC |
| start_date               | UNIQUE  |               start_date ASC |
| end_date                 | UNIQUE  |                 end_date ASC |
| is_open                  |  INDEX  |                  is_open ASC |
| id_bkp_accounting_period |  INDEX  | id_bkp_accounting_period ASC |
| id_bkp_currency          |  INDEX  |          id_bkp_currency ASC |
| is_open___start_date     |  INDEX  |                  is_open ASC |
|                          |         |               start_date ASC |

## Callbacks

### onBeforeInsert

Pred vytvorením nového účtovného obdobia je potrebné skontrolovať, či dátum konca predchádzajúceho účtovného obdobia sa neprekrýva s dátumom začiatku nového účtovného obdobia.

### onAfterInsert

Pri vytváraní nového účtovného obdobia sa vytvorí kópia účtovnej osnovy a do nového záznamu sa zapíše ID obdobia z ktorého sa nové obdobie vytvorilo. Ak bude otvorených viacero účtovných období, bude na výber, z ktorého účtovného obdobia sa má nový záznam vytvoriť.

Zároveň sa skopírujú do tabuľky **bkp_depreciation_groups** záznamy z predchádzajúceho účtovného obdobia a nastaví sa im **id_bkp_accounting_period** podľa vytvoreného obdobia.

Pri vytváraní kópie účtovného obdobia je potrebné aktualizovať stĺpec  **id_bkp_book_accounts** v tabuľke **bkp_bank_account**.

### onBeforeUpdate

Not used.

### onAfterUpdate

Not used.

### onBeforeDelete

Pred vymazaním účtovného obdobia treba skontrolovať, či sú k účtovnému obdobiu priradené doklady v tabuľke **bkp_transactions** a závierky v tabuľke **bkp_closing_periods**. Ak sú, nie je možné účtovné obdobie vymazať.

### onAfterDelete

Not used.

## Formatters

V tomto modeli nie sú použité formátery.
