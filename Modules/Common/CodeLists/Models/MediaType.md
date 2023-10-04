# Model Common/CodeLists/MediaType

## Introduction

Code list for media file types.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                           |
| :-------------------- | :------------------------------ |
| isJunctionTable       | FALSE                           |
| storeRecordInfo       | TRUE                            |
| sqlName               | com_media_types                 |
| urlBase               | common/codelists/media-types    |
| lookupSqlValue        | {%TABLE%}.name                  |
| tableTitle            | Media Types                     |
| formTitleForInserting | New Media Type                  |
| formTitleForEditing   | Media Type                      |
| crud/browse/action    | Common/CodeLists/MediaTypes     |
| crud/add/action       | Common/CodeLists/MediaType/Add  |
| crud/edit/action      | Common/CodeLists/MediaType/Edit |

## Data Structure

| Column      | Title              | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ------------------ | :--------: | :----: | :------: | :----------------------------------------- |
| id          |                    |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info        |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name               |  varchar   |   50   |   TRUE   |                                            |
| description | Description        |    text    |        |  FALSE   |                                            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

Model does not contain foreign keys.

### Indexes

Model does not contain indexes.

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
