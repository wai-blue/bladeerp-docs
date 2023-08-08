# [ModelName]

## Introduction

Táto tabuľka bude slúžiť na ukladanie závierok účtovníctva. Závierku je možné vytvoriť keď sú všetky doklady vybraného účtovného obdobia zaúčtované. Po vytvorení záznamu s závierkou už nebude možné pridávať doklady do už uzavretého obdobia.
Záznam účtovnej závierky už nie je možné meniť. Vymazať je možné iba poslednú závierku v účtovnom období.

## Constants

| Constant | Value | Description |
| - | - | - |

## Properties

| Property | Value |
| - | - |
| sqlName | fin_financial_statements |
| urlBase | finance/financial-statements |
| lookupSqlValue | {%TABLE%}.name |
| tableTitle | Financial Statements |
| formTitleForInserting | New Statement |
| formTitleForEditing | Financial Statement |
| formAddButtonText | Add Statement |
| formSaveButtonText | - |

## SQL Structure

| Column | Description | Type | Length | NULL | Default |
| - | - | - | - | - | - |
| id | Unique record ID | INT | 8 | NOT NULL | 0 |
| name | Name | Názov závierky | VARCHAR | 100 | Y |
| closing_date | Closing Date | Dátum, ku ktorému je závierka vystavená | DATE | 8 | Y |
| id_fin_accounting_period | Financial Period | ID účtovného obdobia | INT | 11 | Y |

## Columns

## Foreign Keys

| Column | Parent table | Relation | OnUpdate | OnDelete |
| - | - | - | - | - |
| id_fin_accounting_period | fin_accounting_periods | 1:N | Cascade | Restrict |

## Indexes

| Name | Type | Column + Order |
| - | - | - |
| id | PRIMARY | id ASC |
| name | UNIQUE | name  | ASC |
| closing_date | INDEX | closing_date | ASC |
| id_fin_accounting_period | INDEX | id_fin_accounting_period | ASC |

## Callbacks

### onBeforeInsert

Pred vytvorením treba skontrolovať, či všetky záznamy z tabuľky fin_transactions za vybrané účtovné obdobie majú príznak is_accounted. Ak nie, nie je možné závierku vytvoriť.

### onAfterInsert

Pri vytvorení závierky sa poznačia aktuálne stavy na jednotlivých účtoch účtovnej osnovy z tabuľky fin_book_accounts zo stĺpca current_balance do tabuľky fin_financial_statement_entries do stĺpca balance za vybrané účtovné obdobie. 

### onBeforeUpdate

Zakázať zmenu záznamu.

### onAfterUpdate

Not used.

### onBeforeDelete

Pred vymazaním závierky je potrebné skontrolovať, či je závierka posledná vo svojom účtovnom období. Ak nie, nie je možné závierku vymazať.

### onAfterDelete

Not used.

## Formatters

### tableCellHTMLlFormatter

Not used.

### tableCellCSVFormatter

Not used.

### tableCellCSSFormatter

Not used.

### tableRowCSSFormatter

Not used.

### cardsCardHtmlFormatter

Not used.
