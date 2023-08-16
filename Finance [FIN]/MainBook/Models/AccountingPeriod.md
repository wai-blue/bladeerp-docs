# AccountingPeriod

## Introduction

Budú tu zapísané všetky účtovné obdobia, ktoré sa používali alebo používajú. Všetky operácie sa týkajú účtovného obdobia. Takéto obdobie býva zvyčajne jeden kalendárny rok, ale je možné nastaviť aj kratšie účtovné obdobia. 
Práca s účtovnými obdobiami musí byť výlučne v kompetencii Hlavného účtovníka.
Účtovanie dokladov je možné iba do otvoreného účtovného obdobia.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property | Value |
| - | - |
| sqlName | fin_accounting_periods |
| urlBase | finance/main-book/accounting-periods |
| lookupSqlValue | {%TABLE%}.name |
| tableTitle | Accounting periods |
| formTitleForInserting | New Accounting Period |
| formTitleForEditing | Accounting Period |

## SQL Structure

| Názov | Popis | Typ | Dĺžka | NULL | Default |
| - | - | - | - | - | - |
| id | Unique record ID | INT | 8 | NOT NULL | 0 |
| name | Názov účtovného obdobia | VARCHAR | 100 | NOT NULL | "" |
| start_date | Začiatok účtovného obdobia | DATE | 8 | NOT NULL |  |
| end_date | Koniec účtovného obdobia | DATE | 8 | NOT NULL |  |
| is_open | Príznak, či je účtovné obdobie otvorené a je možné v rámci tohto obdobia pridávať doklady | BOOLEAN | 1 | NOT NULL | 1 |
| id_fin_accounting_period | ID predchádzajúceho účtovného obdobia | INT | 8 | NULL |  |
| id_fin_currency | Hlavná mena účtovného obdobia | INT | 8 | NOT NULL |  |

## Columns

* name:
  * type: varchar
  * title: Name
  * byte_size: 100
  * required: true
  * showColumn: true
* start_date:
  * type: date
  * title: Start date
  * byte_size: 8
  * required: true
  * showColumn: true
* end_date:
  * type: date
  * title: End date
  * byte_size: 8
  * required: true
  * showColumn: true
* is_open:
  * type: boolean
  * title: Is Open
  * byte_size: 1
  * showColumn: true
  * default_value: true
* id_fin_accounting_period:
  * type: lookup
  * title: Previous Accounting Period
  * model: Widgets/Finance/MainBook/Models/AccountingPeriod
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
  * showColumn: true
* id_fin_currency:
  * type: lookup
  * title: Main Currency
  * model: Widgets/Finance/ExchangeRate/Models/Currency
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
  * showColumn: true
  * required: true

## Foreign Keys

| Stĺpec | Parent tabuľka | Väzba | OnUpdate | OnDelete |
| - | - | - | - | - |
| id_fin_accounting_period |  fin_accounting_periods |  1:N |  Cascade |  Cascade |
| id_fin_currency |  fin_currencies |  1:N |  Cascade |  Restrict |

## Indexes

| Názov | Typ | Stĺpec + Zoradenie |
| - | - | - |
| id | PRIMARY | id ASC |
| name | UNIQUE | name ASC |
| start_date_u | UNIQUE | start_date ASC |
| is_open_start_date | INDEX | is_open ASC, start_date ASC |

## Callbacks

### onBeforeInsert

Pred vytvorením nového účtovného obdobia je potrebné skontrolovať, či dátum konca predchádzajúceho účtovného obdobia sa neprekrýva s dátumom začiatku nového účtovného obdobia.

### onAfterInsert

Pri vytváraní nového účtovného obdobia sa vytvorí kópia účtovnej osnovy a do nového záznamu sa zapíše ID obdobia z ktorého sa nové obdobie vytvorilo. Ak bude otvorených viacero účtovných období, bude na výber, z ktorého účtovného obdobia sa má nový záznam vytvoriť.

Zároveň sa skopírujú do tabuľky **fin_depreciation_groups** záznamy z predchádzajúceho účtovného obdobia a nastaví sa im **id_fin_accounting_period** podľa vytvoreného obdobia.

Pri vytváraní kópie účtovného obdobia je potrebné aktualizovať stĺpec  **id_fin_book_accounts** v tabuľke **fin_bank_account**.

### onBeforeUpdate

Not used.

### onAfterUpdate

Not used.

### onBeforeDelete

Pred vymazaním účtovného obdobia treba skontrolovať, či sú k účtovnému obdobiu priradené doklady v tabuľke **fin_transactions** a závierky v tabuľke **fin_closing_periods**. Ak sú, nie je možné účtovné obdobie vymazať.

### onAfterDelete

Not used.

## Formatters

V tomto modeli nie sú použité formátery.
