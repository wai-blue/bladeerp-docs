# Model [Module]/[Widget]/[Model]

## Introduction

[Short description of the model.]

## Constants

[No constants are defined for this model.]

| Constant                   | Value | Description                    |
| :------------------------- | :---: | :----------------------------- |
| FIN_BOOK_ACCOUNT_SIDE_BOTH |   1   | Je možné účtovať na obe strany |
| FIN_BOOK_ACCOUNT_SIDE_GET  |   2   | Účet na strane Má dať          |
| FIN_BOOK_ACCOUNT_SIDE_PUT  |   3   | Účet na strane Dal             |

## Properties

(see ADIOS.repo/src/Core/Model.php)

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
| id                       |                            |    int     |   8    |   TRUE   | ID záznamu                     |
| name                     | Name                       |  varchar   |  100   |   TRUE   | Krátky text                    |
| description              | Description                |    text    |        |  FALSE   | Dlhý text                      |
| maturity_date            | Maturity Date              |    date    |   8    |   TRUE   | Dátum splatnosti               |
| is_open                  | Is Open                    |  boolean   |   1    |   TRUE   | Logická hodnota                |
| state_sequence           | State Sequence             |    int     |   6    |   TRUE   | Poradové číslo v select boxoch |
| id_fin_accounting_period | Previous Accounting Period |   lookup   |   8    |   TRUE   | Previous Accounting Period     |
| side                     | Account Side               |    int     |   8    |   TRUE   | Účtovná strana                 |
| price                    | Total Price                |   float    |  15,2  |  FALSE   | Cena                           |
| attached_file            | Path to Attached File      |    file    |  255   |  FALSE   | Relatívna cesta k súboru       |
| profile_image            | Path to Profile Image      |    file    |  255   |  FALSE   | Relatívna cesta k obrázku      |

### ADIOS Parameters

[No additional ADIOS parameters needs to be defined.]

| Column         | Parameter   | Value                             |
| :------------- | :---------- | --------------------------------- |
| is_open        | description | Is the document open or not?      |
|                | default     | 1                                 |
| state_sequence | description | Order of the item in input lists. |
| side           | enum_values | [Enum values](#side)              |
| side           | enum_values | FIN_BOOK_ACCOUNT_SIDE_*           | <- Navrh DD

REVIEW DD: Definicii enum_values nerozumiem. Nikam to neodkazuje. Dal som iny navrh.

### ADIOS DataTypes
TODO: Doplnit linky na dokumentaciu, ked uz bude nahodena
TODO: Moze sa presunut niekde inde? Aby sa to nemuselo stale vymazavat.
[Kapitola sa pouziva iba na prelinkovanie s dokumentaciou. Po dopisani je potrebne kapitolu vymazat.]
* [boolean]
* [color]
* [date]
* [datetime]
* [file]
* [float]
* [image]
* [int](https://github.com/wai-blue/adios-docs/tree/master/Documentation/6.Database)
* [lookup] 
* [password]
* [table]
* [text]
* [time]
* [timestamp] 
* [varchar]
* [year]

### Foreign Keys

[Model does not contain foreign keys.]

| Column                   | Model                                                                                                        | Relation | OnUpdate | OnDelete |
| :----------------------- | :----------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_fin_accounting_period | [App/Widgets/Finance/MainBook/Models/AccountingPeriod](../../../Finance/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Cascade  |
| id_fin_book_account_type | [App/Widgets/Finance/MainBook/Models/BookAccountType](../../../Finance/MainBook/Models/BookAccountType.md)   |   1:N    | Cascade  | Restrict |

### Indexes

[Model does not contain indexes.]

| Name                 |  Type   | Column + Order |
| :------------------- | :-----: | -------------: |
| id                   | PRIMARY |         id ASC |
| simple_index         |  INDEX  |       name ASC |
| unique_index         | UNIQUE  | start_date ASC |
| is_open___start_date |  INDEX  |    is_open ASC |
|                      |         | start_date ASC |

REVIEW DD: Vo viacstlpcovych indexoch nazvy vyskladavat z jednotlivych stlpcov a spajat cez "___"

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
