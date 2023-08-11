# [ModelName]

## Introduction
[Stručný popis o dátach uchovávaných v modeli.]

## Constants

[V modeli nie sú použité konštanty.]

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

## SQL Structure

| Column         | Description                    |  Type   | Length | NULL     | Default |
| :------------- | :----------------------------- | :-----: | :----: | :------- | :-----: |
| id             | ID záznamu                     |   INT   |   8    | NOT NULL |         |
| name           | Krátky text                    | VARCHAR |  100   | NOT NULL |   “”    |
| description    | Dlhý text                      |  TEXT   |        | NULL     |         |
| maturity_date  | Dátum splatnosti               |  DATE   |   8    | NOT NULL |         |
| is_open        | Logická hodnota                | BOOLEAN |   1    | NOT NULL |    1    |
| state_sequence | Poradové číslo v select boxoch |   INT   |   6    | NOT NULL |         |

## Columns

(vid ADIOS.repo/src/Core/DB/DataTypes, hladaj $params)

* name:
  * required: true
  * type: varchar
  * title: Name
  * byte_size: 100
  * showColumn: true
* description:
  * required: false
  * type: text
  * title: Description
  * showColumn: true
* maturity_date:
  * required: true
  * type: date
  * title: Maturity Date
  * showColumn: true
* is_open:
  * required: true
  * type: boolean
  * title: Is open
  * description: Is the document open or not?
  * showColumn: true
* state_sequence:
  * required: true
  * type: int
  * title: Order In Selects
  * description: Order of the item in input lists.
  * byte_size: 6
  * showColumn: true
* balance:
  * required: false
  * type: float
  * title: Balance
  * byte_size: 15
  * decimals: 2
  * showColumn: true
* id_fin_accounting_period:
  * required: true
  * type: lookup
  * title: Previous Accounting Period
  * model: Widgets/Finance/MainBook/Models/AccountingPeriod
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE


## Foreign Keys

[Model neobsahuje cudzie kľúče.]

| Column                   | Parent table           | Relation | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :------: | -------- | -------- |
| id_fin_accounting_period | fin_accounting_periods |   1:N    | Cascade  | Cascade  |
| id_fin_account_type      | fin_account_types      |   1:N    | Cascade  | Restrict |

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

Nepoužíva sa.

### onAfterInsert

Nepoužíva sa.

### onBeforeUpdate

Nepoužíva sa.

### onAfterUpdate

Nepoužíva sa.

### onBeforeDelete

Nepoužíva sa.

### onAfterDelete

Nepoužíva sa.

## Formatters

### tableCellHTMLlFormatter

Nepoužíva sa.

### tableCellCSVFormatter

Nepoužíva sa.

### tableCellCSSFormatter

Nepoužíva sa.

### tableRowCSSFormatter

Nepoužíva sa.

### cardsCardHtmlFormatter

Nepoužíva sa.
