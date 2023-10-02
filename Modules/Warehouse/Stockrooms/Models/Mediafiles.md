# Model Warehouse/Stockrooms/Mediafile

## Introduction

Evidence of all media files related to the items.

## Constants

### Media File Types
| Constant                     | Value | Description                    |
| :--------------------------- | :---: | :----------------------------- |
| WHS_MEDIA_FILE_TYPE_PICTURE  |   1   | Simple picture                 |
| WHS_MEDIA_FILE_TYPE_DOCUMENT |   2   | Manual or any kind of document |
| WHS_MEDIA_FILE_TYPE_VIDEO    |   3   | Presentation video             |

## Properties

| Property              | Value                               |
| :-------------------- | :---------------------------------- |
| isJunctionTable       | FALSE                               |
| storeRecordInfo       | TRUE                                |
| sqlName               | whs_mediafiles                      |
| urlBase               | warehouse/stockrooms/mediafiles     |
| lookupSqlValue        | {%TABLE%}.name                      |
| tableTitle            | Mediafiles                          |
| formTitleForInserting | New Mediafile                       |
| formTitleForEditing   | Mediafile                           |
| crud/browse/action    | Warehouse/Stockrooms/Mediafiles     |
| crud/add/action       | Warehouse/Stockrooms/Mediafile/Add  |
| crud/edit/action      | Warehouse/Stockrooms/Mediafile/Edit |

## Data Structure

| Column      | Title              | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ------------------ | :--------: | :----: | :------: | :----------------------------------------- |
| id          |                    |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info        |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| madia_type  | Media Type         |    enum    |        |   TRUE   | How and when the media file can be used    |
| media_file  | Path to Media File |    file    |  255   |   TRUE   | Path to picture, video etc.                |
| description | Description        |    text    |        |  FALSE   |                                            |


### ADIOS Parameters

| Column     | Parameter   | Value                       |
| :--------- | :---------- | --------------------------- |
| madia_type | description | Type of the media file      |
|            | default     | WHS_MEDIA_FILE_TYPE_PICTURE |
|            | enum_values | WHS_MEDIA_FILE_TYPE_*       |

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
