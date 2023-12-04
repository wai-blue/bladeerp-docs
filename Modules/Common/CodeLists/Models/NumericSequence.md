# Model Common/CodeLists/NumericSequence

## Introduction

Numeric sequence serves for unique and squential numbering in specific format (e.g. FA202311001). Numeric sequences are used by the documents (e.g. invoices, credit notes etc.) where such numbering is required by law.

## Constants

### Document Type
| Constant                              | Value | Description           |
| :------------------------------------ | :---: | :-------------------- |
| COM_NUMERIC_SEQUENCE_TYPE_CLAIM       |   1   | Type for Claims       |
| COM_NUMERIC_SEQUENCE_TYPE_CREDIT_NOTE |   2   | Type for Credit Notes |
| COM_NUMERIC_SEQUENCE_TYPE_LIABILITY   |   3   | Type for Liabilities  |
| COM_NUMERIC_SEQUENCE_TYPE_ORDER       |   4   | Type for Orders       |

*Comment*: In case of additional document type new constant must be added.

### Pattern

Whole pattern is defined by parts and separators and is limited maximum  20 characters.

Following parts are allowed to be part of the pattern:
* [PREFIX] - any characters (e.g. 'FA', 'PFA', 'CR' etc.)
* [YY] - Year Pattern - how many digits (from end) should be used in numeric sequence (e.g. 'YY' or 'YYY' or 'YYYY')
* [MM] - Month Forman - how many digits should be used in numeric sequence  (e.g. 'M' or 'MM')
* [NNNNNN] - Sequential Numbering Pattern - how many digits should be used in numeric sequence (e.g. 'N', 'NN' .... 'NNNNNN')

Following separators are allowed to be part of the pattern:
* `-` - dash
* `/` - slash
* `|` - pipe
* `.` - dot
* ` ` - space

Examples of used patterns for April 2023 and 5th number in sequence:
* FA[YY][MM][NNNNN] = FA23040005
* ZF[YYYY].[NNNNNN] = ZF2023.000005
* CN[YY]-[MM]/[NNNN] = CN23-04/0005

## Properties

| Property               | Value                                                                   |
| :--------------------- | :---------------------------------------------------------------------- |
| isJunctionTable        | FALSE                                                                   |
| storeRecordInfo        | TRUE                                                                    |
| sqlName                | com_numeric_sequences                                                   |
| urlBase                | common/codelists/numeric_sequences                                      |
| lookupSqlValue         | {%TABLE%}.name                                                          |
| tableTitle             | Numeric Sequences                                                       |
| formTitleForInserting  | New Numeric Sequence                                                    |
| formTitleForEditing    | Numeric Sequence                                                        |
| crud/browse/controller | Common/CodeLists/NumericSequences                                       |
| crud/add/controller    | Common/CodeLists/NumericSequence/AddOrEdit                              |
| crud/edit/controller   | Common/CodeLists/NumericSequence/AddOrEdit                              |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                                    |
| :---------- | ----------- | :--------: | :----: | :------: | :------------------------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                                         |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author               |
| name        | Name        |  varchar   |  100   |   TRUE   |                                                          |
| type        | Type        |    int     |   2    |   TRUE   | [Type of the document](#document-type)                   |
| pattern     | Pattern     |  varchar   |   20   |   TRUE   | [Pattern of the document](#pattern-of-numeric-sequences) |
| is_active   | Is Active   |  boolean   |   1    |   TRUE   | Flag if sequence is currently used or not                |

### ADIOS Parameters

[No additional ADIOS parameters needs to be defined.]

| Column    | Parameter   | Value                                     |
| :-------- | :---------- | ----------------------------------------- |
| is_active | description | Is the sequence is currently used or not? |
|           | default     | 1                                         |
| pattern   | description | Use only allowed parts for pattern.       |
| type      | enum_values | COM_NUMERIC_SEQUENCE_TYPE_*               |

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| name      | UNIQUE  |       name ASC |
| type      |  INDEX  |      type DESC |
| is_active |  INDEX  | is_active DESC |

## Callbacks

### onBeforeInsert

Allow create only in case of valid [pattern](#pattern).

### onAfterInsert

Not used.

### onBeforeUpdate

Allow update only in case of valid [pattern](#pattern).

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
