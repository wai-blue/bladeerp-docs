# Model [Module]/[Widget]/[Model]

## Introduction

[Short description of the model.]

## Constants

[No constants are defined for this model.]

### Side Enums
| Constant                   | Value | Description                    |
| :------------------------- | :---: | :----------------------------- |
| BKP_BOOK_ACCOUNT_SIDE_BOTH |   1   | Je možné účtovať na obe strany |
| BKP_BOOK_ACCOUNT_SIDE_GET  |   2   | Účet na strane Má dať          |
| BKP_BOOK_ACCOUNT_SIDE_PUT  |   3   | Účet na strane Dal             |

## Properties

(see ADIOS.repo/src/Core/Model.php)

| Property              | Value                                                             |
| :-------------------- | :---------------------------------------------------------------- |
| isJunctionTable       | TRUE/FALSE                                                        |
| storeRecordInfo       | TRUE/FALSE                                                        |
| sqlName               | [modulprefix_model_name v množnom čísle]                          |
| urlBase               | [modul/widget/model-name v množnom čísle]                         |
| lookupSqlValue        | {%TABLE%}.name                                                    |
| tableTitle            | [Table Title]                                                     |
| formTitleForInserting | [New …]                                                           |
| formTitleForEditing   | [Model Name]                                                      |
| crud/browse/action    | [Module]/[Widget]/[Model]s (plural)                               |
| crud/add/action       | [Module]/[Widget]/[Model]/Add                                     |
| crud/edit/action      | [Module]/[Widget]/[Model]/Edit                                    |
| junctions             | `json`                                                            |
|                       | `{`                                                               |
|                       | `  "ContactCategory": {`                                          |
|                       | `    "junctionModel": "App/Widgets/AddressBook/ContactCategory",` |
|                       | `    "optionsModel": "App/Widgets/AddressBook/Category",`         |
|                       | `    "masterKeyColumn": "id_com_contact",`                        |
|                       | `    "optionKeyColumn": "id_com_category",`                       |
|                       | `  }`                                                             |
|                       | `}`                                                               |

## Data Structure

| Column                   | Title                      | ADIOS Type | Length | Required | Notes                                      |
| :----------------------- | -------------------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                       |                            |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info              | Record Info                |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name                     | Name                       |  varchar   |  100   |   TRUE   | [optional]                                 |
| description              | Description                |    text    |        |  FALSE   | [optional]                                 |
| due_date                 | Due Date                   |    date    |   8    |   TRUE   | [optional]                                 |
| is_open                  | Is Open                    |  boolean   |   1    |   TRUE   | [optional]                                 |
| state_sequence           | State Sequence             |    int     |   6    |   TRUE   | [optional]                                 |
| id_bkp_accounting_period | Previous Accounting Period |   lookup   |   8    |   TRUE   | [optional]                                 |
| side                     | Account Side               |    int     |   8    |   TRUE   | [optional]                                 |
| price                    | Total Price                |   float    |  15,2  |  FALSE   | [optional]                                 |
| attached_file            | Path to Attached File      |    file    |  255   |  FALSE   | [optional]                                 |
| profile_image            | Path to Profile Image      |    file    |  255   |  FALSE   | [optional]                                 |

### ADIOS Parameters

[No additional ADIOS parameters needs to be defined.]

| Column         | Parameter   | Value                             |
| :------------- | :---------- | --------------------------------- |
| is_open        | description | Is the document open or not?      |
|                | default     | 1                                 |
| state_sequence | description | Order of the item in input lists. |
| side           | enum_values | BKP_BOOK_ACCOUNT_SIDE_*           |

### Foreign Keys

[Model does not contain foreign keys.]

| Column                   | Model                                                                                                                | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_accounting_period | [App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod](../../../Bookkeeping/MainBook/Models/AccountingPeriod.md) |   1:N    | Cascade  | Cascade  |
| id_bkp_book_account_type | [App/Widgets/Bookkeeping/MainBook/Models/BookAccountType](../../../Bookkeeping/MainBook/Models/BookAccountType.md)   |   1:N    | Cascade  | Restrict |

### Indexes

[Model does not contain indexes.]

| Name                 |  Type   |      Column + Order |
| :------------------- | :-----: | ------------------: |
| id                   | PRIMARY |              id ASC |
| simple_index         |  INDEX  |            name ASC |
| unique_index         | UNIQUE  |      start_date ASC |
| is_open___start_date |  INDEX  |         is_open ASC |
|                      |         |      start_date ASC |

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
