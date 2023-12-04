# Model Common/CodeLists/NumericSequenceConter

## Introduction

Numeric sequence conter serves for evidence of current counter value for pair of the numeric sequence and the year. Untill the counter is an active then the counter value can be incremeted/decremented.

## Constants

[No constants are defined for this model.]

## Properties

| Property               | Value                                           |
| :--------------------- | :---------------------------------------------- |
| isJunctionTable        | FALSE                                           |
| storeRecordInfo        | TRUE                                            |
| sqlName                | com_numeric_sequence_conters                    |
| urlBase                | common/codelists/numeric_sequence_conters       |
| lookupSqlValue         | {%TABLE%}.name                                  |
| tableTitle             | Numeric Sequence Conters                        |
| formTitleForInserting  | New Numeric Sequence Conter                      |
| formTitleForEditing    | Numeric Sequence Conter                          |
| crud/browse/controller | Common/CodeLists/NumericSequenceConters         |
| crud/add/controller    | Common/CodeLists/NumericSequenceConter/AddOrEdit |
| crud/edit/controller   | Common/CodeLists/NumericSequenceConter/AddOrEdit |

## Data Structure

| Column                  | Title                 | ADIOS Type | Length | Required | Notes                                      |
| :---------------------- | --------------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                      |                       |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info             | Record Info           |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_com_numeric_sequence | Numeric Sequence      |   lookup   |   8    |   TRUE   |                                            |
| year                    | Related Year          |  varchar   |   4    |   TRUE   |                                            |
| value                   | Current Counter Value |    int     |   8    |   TRUE   |                                            |
| is_closed               | Is Closed             |  boolean   |   1    |   TRUE   |                                            |

### ADIOS Parameters

[No additional ADIOS parameters needs to be defined.]

| Column    | Parameter   | Value                              |
| :-------- | :---------- | ---------------------------------- |
| is_closed | description | Can be the counter changed or not? |
|           | default     | 0                                  |
| value     | default     | 1                                  |

### Foreign Keys

| Column                  | Model                                                                               | Relation | OnUpdate | OnDelete |
| :---------------------- | :---------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_numeric_sequence | [App/Widgets/Common/CodeLists/Models/NumericSequence](../Models/NumericSequence.md) |   1:N    | Cascade  | Cascade  |

### Indexes

| Name                           |  Type   |                 Column + Order |
| :----------------------------- | :-----: | -----------------------------: |
| id                             | PRIMARY |                         id ASC |
| year                           |  INDEX  |                      year DESC |
| id_com_numeric_sequence___year | UNIQUE  | is_id_com_numeric_sequence ASC |
|                                |         |                       year ASC |
| is_closed                      |  INDEX  |                  is_closed ASC |


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

### getNextCounterValue

* Retuns next counter value formated according to the pattern (col: `id_com_numeric_sequence:LOOKUP:pattern`). Should be called when new document is opened in input form to get initial data from the user but not yet created.
* input: id_com_numeric_sequence
* input: year

### incrementCounterValue

* Performs incrementation of the current counter value and retuns it formated according to the pattern (col: `id_com_numeric_sequence:LOOKUP:pattern`). Should be calledin transaction during new document creation.
* input: id_com_numeric_sequence
* input: year

### decrementCounterValue

* Performs decrementation of the current counter value and retuns it formated according to the pattern (col: `id_com_numeric_sequence:LOOKUP:pattern`).
* input: id_com_numeric_sequence
* input: year

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
