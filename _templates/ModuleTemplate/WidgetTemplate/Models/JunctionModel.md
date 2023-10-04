# Model [Module]/[Widget]/[Model]

## Introduction

[Short description of the junction model for relations M:N.]

## Constants
[No constants are defined for this model.]

## Properties

(see ADIOS.repo/src/Core/Model.php - method `recordSave()` - code `//save cross-table-alignments`)

| Property              | Value                                                                   |
| :-------------------- | :---------------------------------------------------------------------- |
| isJunctionTable       | TRUE                                                                    |
| storeRecordInfo       | FALSE/TRUE [TRUE used only in case of additional columns e.g. amount]   |
| sqlName               | [modulprefix_model_name in plural]                                      |
| urlBase               | - [defined only only in case of additional columns e.g. amount]         |
| lookupSqlValue        | - [defined only only in case of additional columns e.g. amount]         |
| tableTitle            | - [defined only only in case of additional columns e.g. amount]         |
| formTitleForInserting | - [defined only only in case of additional columns e.g. amount]         |
| formTitleForEditing   | - [defined only only in case of additional columns e.g. amount]         |
| crud/browse/action    | - [defined only only in case of additional columns e.g. amount]         |
| crud/add/action       | - [defined only only in case of additional columns e.g. amount]         |
| crud/edit/action      | - [defined only only in case of additional columns e.g. amount]         |
| junctions             | `json`                                                                  |
|                       | `{`                                                                     |
|                       | `  "ContactCategory": {`                                                |
|                       | `    "junctionModel": "App/Common/AddressBook/Models/ContactCategory",` |
|                       | `    "optionsModel": "App/Common/AddressBook/Models/Category",`         |
|                       | `    "masterKeyColumn": "id_com_contact",`                              |
|                       | `    "optionKeyColumn": "id_com_category",`                             |
|                       | `  }`                                                                   |
|                       | `}`                                                                     |


## Data Structure

| Column          | Title    | ADIOS Type | Length | Required | Notes            |
| :-------------- | :------- | :--------: | :----: | :------: | :--------------- |
| id              |          |    int     |   8    |   TRUE   | Unique record ID |
| id_com_contact  | Contact  |    int     |   8    |   TRUE   | [optional]       |
| id_com_category | Category |    int     |   8    |   TRUE   | [optional]       |

### ADIOS Parameters
[No additional ADIOS parameters needs to be defined.]

## Foreign Keys

| Column          | Model                                                           | Relation | OnUpdate | OnDelete |
| :-------------- | :-------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_contact  | [App/Widgets/Common/AddressBook/Models/Contact](./Contact.md)   |   1:N    | Cascade  | Cascade  |
| id_com_category | [App/Widgets/Common/AddressBook/Models/Category](./Category.md) |   1:N    | Cascade  | Restrict |

## Indexes

| Name                             |  Type   |      Column + Order |
| :------------------------------- | :-----: | ------------------: |
| id                               | PRIMARY |              id ASC |
| id_com_contact___id_com_category | UNIQUE  |  id_com_contact ASC |
|                                  |         | id_com_category ASC |

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
