# [ModelName]

## Introduction
[Stručný popis o dátach uchovávaných v modeli.]

## Constants
[V modeli nie sú použité konštanty.]
### Side
| Constant                   | Value | Description                    |
| :------------------------- | :---: | :----------------------------- |
| FIN_BOOK_ACCOUNT_SIDE_BOTH |   1   | Je možné účtovať na obe strany |
| FIN_BOOK_ACCOUNT_SIDE_GET  |   2   | Účet na strane Má dať          |
| FIN_BOOK_ACCOUNT_SIDE_PUT  |   3   | Účet na strane Dal             |

## Properties
(vid ADIOS.repo/src/Core/Model.php)
| Property              | Value                                     |
| :-------------------- | :---------------------------------------- |
| isCrossTable          | TRUE/FALSE                                |
| sqlName               | [modulprefix_model_name v množnom čísle]  |
| urlBase               | [modul/widget/model-name v množnom čísle] |
| lookupSqlValue        | {%TABLE%}.name                            |
| tableTitle            | [Table Title]                             |
| formTitleForInserting | [New …]                                   |
| formTitleForEditing   | [Model Name]                              |

## Data Structure
| Column                   | Title                      | ADIOS Type | Length | Required | Notes                          |
| :----------------------- | -------------------------- | :--------: | :----: | :------: | :----------------------------- |
| id                       |                            |    INT     |   8    |   TRUE   | ID záznamu                     |
| name                     | Name                       |  VARCHAR   |  100   |   TRUE   | Krátky text                    |
| description              | Description                |    TEXT    |        |  FALSE   | Dlhý text                      |
| maturity_date            | Maturity Date              |    DATE    |   8    |   TRUE   | Dátum splatnosti               |
| is_open                  | Is Open                    |  BOOLEAN   |   1    |   TRUE   | Logická hodnota                |
| state_sequence           | State Sequence             |    INT     |   6    |   TRUE   | Poradové číslo v select boxoch |
| id_fin_accounting_period | Previous Accounting Period |   LOOKUP   |   8    |   TRUE   | Previous Accounting Period     |
| side                     | Account Side               |    INT     |   8    |   TRUE   | Účtovná strana                 |
| price                    | Total Price                |  DECIMAL   |  15,2  |  FALSE   | Cena                           |
| attached_file            | Path to Attached File      |    FILE    |  255   |  FALSE   | Relatívna cesta k súboru       |
| profile_image            | Path to Profile Image      |    FILE    |  255   |  FALSE   | Relatívna cesta k obrázku      |
  

### ADIOS Parameters 
| Column         | Parameter   | Value                             |
| :------------- | :---------- | --------------------------------- |
| is_open        | description | Is the document open or not?      |
| state_sequence | description | Order of the item in input lists. |
| side           | enum_values | [Enum values](#side)              |

## Foreign Keys
[Model neobsahuje cudzie kľúče.]
| Column                   | Model                                                                                                                | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_fin_accounting_period | [App/Widgets/Finance/MainBook/Models/AccountingPeriod](../../../Finance%20[FIN]/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Cascade  |
| id_fin_book_account_type | [App/Widgets/Finance/MainBook/Models/BookAccountType](../../../Finance%20[FIN]/MainBook/Models/BookAccountType.md)   |   1:N    | Cascade  | Restrict |

## Indexes
[Pre túto tabuľku nie sú definované indexy.]
| Name           |  Type   | Column + Order |
| :------------- | :-----: | -------------: |
| id             | PRIMARY |         id ASC |
| simple_index   |  INDEX  |       name ASC |
| unique_index   | UNIQUE  | start_date ASC |
| combined_index |  INDEX  |    is_open ASC |
|                |         | start_date ASC |

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
