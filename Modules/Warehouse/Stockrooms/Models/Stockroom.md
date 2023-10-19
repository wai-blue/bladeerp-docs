# Model Warehouse/Stockrooms/Stockroom

## Introduction

Evidence of all stockrooms

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                               |
| :--------------------- | :---------------------------------- |
| isJunctionTable        | FALSE                               |
| storeRecordInfo        | TRUE                                |
| sqlName                | whs_stockrooms                      |
| urlBase                | warehouse/stockrooms                |
| lookupSqlValue         | {%TABLE%}.name                      |
| tableTitle             | Stockrooms                          |
| formTitleForInserting  | New Stockroom                       |
| formTitleForEditing    | Stockroom                           |
| crud/browse/controller | Warehouse/Stockrooms                |
| crud/add/controller    | Warehouse/Stockrooms/Stockroom/Add  |
| crud/edit/controller   | Warehouse/Stockrooms/Stockroom/Edit |

## Data Structure

| Column         | Title            | ADIOS Type | Length | Required | Notes                                      |
| :------------- | ---------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id             |                  |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info    | Record Info      |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name           | Name             |  varchar   |  100   |   TRUE   |                                            |
| description    | Description      |    text    |        |  FALSE   |                                            |
| is_active      | Is Active        |  boolean   |   1    |   TRUE   |                                            |
| street_1       | Street - 1. line |  varchar   |  200   |   TRUE   | Ulica - 1. riadok                          |
| street_2       | Street - 2. line |  varchar   |  200   |  FALSE   | Ulica - 2. riadok                          |
| city           | City             |  varchar   |  200   |   TRUE   | Mesto                                      |
| postal_code    | ZIP              |  varchar   |   20   |   TRUE   | PSČ                                        |
| id_com_country | Country          |   lookup   |   8    |  FALSE   | ID krajiny                                 |
| location       | GPS Location     |  mappoint  |        |  FALSE   | GPS location                               |

### ADIOS Parameters

| Column         | Parameter   | Value                             |
| :------------- | :---------- | --------------------------------- |
| is_active      | description | Is in use this stockroom or not?  |
|                | default     | 1                                 |

### Foreign Keys

[Model does not contain foreign keys.]

### Indexes

[Model does not contain indexes.]

| Name           |  Type   |     Column + Order |
| :------------- | :-----: | -----------------: |
| id             | PRIMARY |             id ASC |
| name           | UNIQUE  |           name ASC |
| is_active      |  INDEX  |      is_active ASC |

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
