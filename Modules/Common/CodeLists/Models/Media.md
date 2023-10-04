# Model Common/CodeLists/Media

## Introduction

Evidence of all media files in system.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                       |
| :-------------------- | :-------------------------- |
| isJunctionTable       | FALSE                       |
| storeRecordInfo       | TRUE                        |
| sqlName               | com_medias                  |
| urlBase               | common/codelists/medias     |
| lookupSqlValue        | {%TABLE%}.media             |
| tableTitle            | Medias                      |
| formTitleForInserting | New Media                   |
| formTitleForEditing   | Media                       |
| crud/browse/action    | Common/CodeLists/Medias     |
| crud/add/action       | Common/CodeLists/Media/Add  |
| crud/edit/action      | Common/CodeLists/Media/Edit |

## Data Structure

| Column            | Title              | ADIOS Type | Length | Required | Notes                                      |
| :---------------- | ------------------ | :--------: | :----: | :------: | :----------------------------------------- |
| id                |                    |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info       | Record Info        |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| id_com_media_type | Media Type         |   lookup   |        |   TRUE   |                                            |
| media             | Path to Media File |    file    |  255   |   TRUE   | Path to picture, video etc.                |
| description       | Description        |    text    |        |  FALSE   |                                            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column            | Model                                                       | Relation | OnUpdate | OnDelete |
| :---------------- | :---------------------------------------------------------- | :------: | -------- | -------- |
| id_com_media_type | [App/Widgets/Common/CodeLists/Models/Media](./MediaType.md) |   1:N    | Cascade  | Cascade  |

### Indexes

| Name              |  Type   |        Column + Order |
| :---------------- | :-----: | --------------------: |
| id                | PRIMARY |                id ASC |
| id_com_media_type |  INDEX  | id_com_media_type ASC |

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
