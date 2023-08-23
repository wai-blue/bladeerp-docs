# Model [Module]/[Widget]/[Model]

## Introduction

[Short description of the model.]

## Constants

[No constants are defined for this model.]

| Constant                   | Value | Description                    |
| :------------------------- | :---: | :----------------------------- |
| BKP_BOOK_ACCOUNT_SIDE_BOTH |   1   | Je možné účtovať na obe strany |
| BKP_BOOK_ACCOUNT_SIDE_GET  |   2   | Účet na strane Má dať          |
| BKP_BOOK_ACCOUNT_SIDE_PUT  |   3   | Účet na strane Dal             |

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

| Column                   | Title                      | ADIOS Type | Length | Required | Notes                                    |
| :----------------------- | -------------------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id                       |                            |    int     |   8    |   TRUE   | Unique record ID                         |
| id_created_by            | Created By                 |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| created_datetime         | Created Datetime           |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by            | Updated By                 |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| updated_datetime         | Updated Datetime           |  datetime  |   8    |   TRUE   | When the record was updated              |
| name                     | Name                       |  varchar   |  100   |   TRUE   | Krátky text                              |
| description              | Description                |    text    |        |  FALSE   | Dlhý text                                |
| due_date                 | Due Date                   |    date    |   8    |   TRUE   | Dátum splatnosti                         |
| is_open                  | Is Open                    |  boolean   |   1    |   TRUE   | Logická hodnota                          |
| state_sequence           | State Sequence             |    int     |   6    |   TRUE   | Poradové číslo v select boxoch           |
| id_bkp_accounting_period | Previous Accounting Period |   lookup   |   8    |   TRUE   | Previous Accounting Period               |
| side                     | Account Side               |    int     |   8    |   TRUE   | Účtovná strana                           |
| price                    | Total Price                |   float    |  15,2  |  FALSE   | Cena                                     |
| attached_file            | Path to Attached File      |    file    |  255   |  FALSE   | Relatívna cesta k súboru                 |
| profile_image            | Path to Profile Image      |    file    |  255   |  FALSE   | Relatívna cesta k obrázku                |

### ADIOS Parameters

[No additional ADIOS parameters needs to be defined.]

| Column         | Parameter   | Value                             |
| :------------- | :---------- | --------------------------------- |
| is_open        | description | Is the document open or not?      |
|                | default     | 1                                 |
| state_sequence | description | Order of the item in input lists. |
| side           | enum_values | [Enum values](#side)              |
| side           | enum_values | BKP_BOOK_ACCOUNT_SIDE_*           | <- Navrh DD

REVIEW DD: Definicii enum_values nerozumiem. Nikam to neodkazuje. Dal som iny navrh.

### ADIOS DataTypes
TODO: Doplnit linky na dokumentaciu, ked uz bude nahodena
TODO: Moze sa presunut niekde inde? Aby sa to nemuselo stale vymazavat.
TODO: Zdalo sa nam, ze tu je to najlepsie miesto, kedze je prakticke mat tieto info "po ruke". Ak najdeme lepsie miesto, presunieme. A inak, je tu toho viac, co sa vo finale vymazava.
[Kapitola sa pouziva iba na prelinkovanie s dokumentaciou. Po dopisani je potrebne kapitolu vymazat.]
* [boolean]
* [color]
* [date]
* [datetime]
* [file]
* [float]
* [image]
* [int](https://github.com/wai-blue/adios-docs/blob/main/Documentation/6.Database/Data%20Types/Integer.md)
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
| id_created_by            | ADIOS/Core/User                                                                                              |   1:N    | Cascade  | Cascade  |
| id_updated_by            | ADIOS/Core/User                                                                                              |   1:N    | Cascade  | Cascade  |
| id_bkp_accounting_period | [App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod](../../../Bookkeeping/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account_type | [App/Widgets/Bookkeeping/MainBook/Models/BookAccountType](../../../Bookkeeping/MainBook/Models/BookAccountType.md)   |   1:N    | Cascade  | Restrict |

### Indexes

[Model does not contain indexes.]

| Name                 |  Type   |       Column + Order |
| :------------------- | :-----: | -------------------: |
| id                   | PRIMARY |               id ASC |
| id_created_by        |  INDEX  |    id_created_by ASC |
| created_datetime     |  INDEX  | created_datetime ASC |
| id_updated_by        |  INDEX  |    id_updated_by ASC |
| updated_datetime     |  INDEX  | updated_datetime ASC |
| simple_index         |  INDEX  |             name ASC |
| unique_index         | UNIQUE  |       start_date ASC |
| is_open___start_date |  INDEX  |          is_open ASC |
|                      |         |       start_date ASC |

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
