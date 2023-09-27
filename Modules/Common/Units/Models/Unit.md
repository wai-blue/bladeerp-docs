# Model Common/Units/Unit

## Introduction

List of all units available in warehouse for expression of quantity in case of items

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                             |
| :-------------------- | :-------------------------------- |
| isJunctionTable       | FALSE                             |
| storeRecordInfo       | TRUE                              |
| sqlName               | com_units                         |
| urlBase               | common/units/units                |
| lookupSqlValue        | concat(name, ' ','(', symbol,')') |
| tableTitle            | Units                             |
| formTitleForInserting | New Unit                          |
| formTitleForEditing   | Unit                              |
| crud/browse/action    | Common/Units/Units                |
| crud/add/action       | Common/Units/Unit/Add             |
| crud/edit/action      | Common/Units/Unit/Edit            |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRUE   |                                            |
| symbol      | Symbol      |  varchar   |   10   |   TRUE   |                                            |


### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name    |  Type   | Column + Order |
| :------ | :-----: | -------------: |
| id      | PRIMARY |         id ASC |
| name    | UNIQUE  |       name ASC |
| symbol  | UNIQUE  |     symbol ASC |

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
