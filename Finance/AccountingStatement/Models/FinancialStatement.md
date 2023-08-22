# Model Finance/AccountingStatement/FinancialStatement

NOTE: DD pretukal.
TODO: JG skontrolovat (aj voci Google Docs). Po skontrolovani vlozit "NOTE: JG skontroloval - v poriadku."

## Introduction

Táto tabuľka bude slúžiť na ukladanie závierok účtovníctva. Závierku je možné vytvoriť keď sú všetky doklady vybraného účtovného obdobia zaúčtované. Po vytvorení záznamu s závierkou už nebude možné pridávať doklady do už uzavretého obdobia.
Záznam účtovnej závierky už nie je možné meniť. Vymazať je možné iba poslednú závierku v účtovnom období.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                        |
| :-------------------- | :--------------------------- |
| sqlName               | fin_financial_statements     |
| urlBase               | finance/financial-statements |
| lookupSqlValue        | {%TABLE%}.name               |
| tableTitle            | Financial Statements         |
| formTitleForInserting | New Statement                |
| formTitleForEditing   | Financial Statement          |
| formAddButtonText     | Add Statement                |
| formSaveButtonText    | -                            |

## Data Structure

| Column                   | Title            | ADIOS Type | Length | Required | Notes                                   |
| :----------------------- | ---------------- | :--------: | :----: | :------: | :-------------------------------------- |
| id                       |                  |    int     |   8    |   TRUE   | Unique record ID                        |
| name                     | Name             |  varchar   |  100   |  FALSE   | Názov závierky                          |
| closing_date             | Closing Date     |    date    |   8    |  FALSE   | Dátum, ku ktorému je závierka vystavená |
| id_fin_accounting_period | Financial Period |   lookup   |   11   |  FALSE   | ID účtovného obdobia                    |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                                                                        | Relation | OnUpdate | OnDelete |
| :----------------------- | :----------------------------------------------------------------------------------------------------------- | :------: | :------: | :------: |
| id_fin_accounting_period | [App/Widgets/Finance/MainBook/Models/AccountingPeriod](../../../Finance/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                     | Type    | Column + Order               |
| :----------------------- | :-----: | :--------------------------- |
| id                       | PRIMARY | id ASC                       |
| name                     | UNIQUE  | name ASC                     |
| closing_date             | INDEX   | closing_date ASC             |
| id_fin_accounting_period | INDEX   | id_fin_accounting_period ASC |

## Callbacks

### onBeforeInsert

Pred vytvorením treba skontrolovať, či všetky záznamy z tabuľky **fin_transactions** za vybrané účtovné obdobie majú príznak **is_accounted**. Ak nie, nie je možné závierku vytvoriť.

### onAfterInsert

Pri vytvorení závierky sa poznačia aktuálne stavy na jednotlivých účtoch účtovnej osnovy z tabuľky **fin_book_accounts** zo stĺpca **current_balance** do tabuľky **fin_financial_statement_entries** do stĺpca **balance** za vybrané účtovné obdobie. 

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
