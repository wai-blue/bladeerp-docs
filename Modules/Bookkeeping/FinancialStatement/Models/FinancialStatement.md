# Model Bookkeeping/FinancialStatement/FinancialStatement

NOTE: DD pretukal.
NOTE: PA skontroloval - chyby opravene

## Introduction

Táto tabuľka bude slúžiť na ukladanie závierok účtovníctva. Závierku je možné vytvoriť keď sú všetky doklady vybraného účtovného obdobia zaúčtované. Po vytvorení záznamu s závierkou už nebude možné pridávať doklady do už uzavretého obdobia.
Záznam účtovnej závierky už nie je možné meniť. Vymazať je možné iba poslednú závierku v účtovnom období.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                  |
| :-------------------- | :----------------------------------------------------- |
| sqlName               | bkp_financial_statements                               |
| urlBase               | bookkeeping/financial-statements                       |
| lookupSqlValue        | {%TABLE%}.name                                         |
| tableTitle            | Financial Statements                                   |
| formTitleForInserting | New Statement                                          |
| formTitleForEditing   | Financial Statement                                    |
| formAddButtonText     | Add Statement                                          |
| formSaveButtonText    | -                                                      |
| crud/browse/action    | Bookkeeping/FinancialStatement/FinancialStatements     |
| crud/add/action       | Bookkeeping/FinancialStatement/FinancialStatement/Add  |
| crud/edit/action      | Bookkeeping/FinancialStatement/FinancialStatement/Edit |

## Data Structure

| Column                   | Title             | ADIOS Type | Length | Required | Notes                                   |
| :----------------------- | ----------------- | :--------: | :----: | :------: | :-------------------------------------- |
| id                       |                   |    int     |   8    |   TRUE   | Unique record ID                        |
| record_info              | Record Info       |    json    |        |   TRUE   |                                         |
| name                     | Name              |  varchar   |  100   |   TRUE   | Názov závierky                          |
| closing_date             | Closing Date      |    date    |   8    |   TRUE   | Dátum, ku ktorému je závierka vystavená |
| id_bkp_accounting_period | Accounting Period |   lookup   |   8    |   TRUE   | ID účtovného obdobia                    |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                                | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------------- | :------: | :------: | :------: |
| id_bkp_accounting_period | [App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod](../../../Bookkeeping/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                     |  Type   |               Column + Order |
| :----------------------- | :-----: | ---------------------------: |
| id                       | PRIMARY |                       id ASC |
| name                     | UNIQUE  |                     name ASC |
| closing_date             |  INDEX  |             closing_date ASC |
| id_bkp_accounting_period |  INDEX  | id_bkp_accounting_period ASC |

## Callbacks

### onBeforeInsert

Pred vytvorením treba skontrolovať, či všetky záznamy z tabuľky **bkp_transactions** za vybrané účtovné obdobie majú príznak **is_accounted**. Ak nie, nie je možné závierku vytvoriť.

### onAfterInsert

Pri vytvorení závierky sa poznačia aktuálne stavy na jednotlivých účtoch účtovnej osnovy z tabuľky **bkp_book_accounts** zo stĺpca **current_balance** do tabuľky **bkp_financial_statement_entries** do stĺpca **balance** za vybrané účtovné obdobie.

### onBeforeUpdate

Zakázať zmenu záznamu.

### onAfterUpdate

Not used.

### onBeforeDelete

Pred vymazaním závierky je potrebné skontrolovať, či je závierka posledná vo svojom účtovnom období. Ak nie, nie je možné závierku vymazať.

### onAfterDelete

Not used.

## Formatters

V tomto modeli nie sú použité formátery.

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
