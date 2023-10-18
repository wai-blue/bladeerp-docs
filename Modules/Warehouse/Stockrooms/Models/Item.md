# Model Warehouse/Stockrooms/Item

## Introduction

Invenoty item is a distinct product, part, or item that a company procures, manufactures, stores, and tracks within its stockrooms. Each stockrooms item is assigned a unique identifier, often referred to as a Stock Keeping Unit (SKU) or part number, which allows for accurate identification and tracking.

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                          |
| :--------------------- | :----------------------------- |
| isJunctionTable        | FALSE                          |
| storeRecordInfo        | TRUE                           |
| sqlName                | whs_items                      |
| urlBase                | warehouse/stockrooms/items     |
| lookupSqlValue         | {%TABLE%}.name                 |
| tableTitle             | Stockrooms Items               |
| formTitleForInserting  | New Stockrooms Item            |
| formTitleForEditing    | Stockrooms Item                |
| crud/browse/controller | Warehouse/Stockrooms/Items     |
| crud/add/controller    | Warehouse/Stockrooms/Item/Add  |
| crud/edit/controller   | Warehouse/Stockrooms/Item/Edit |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRUE   |                                            |
| description | Description |    text    |        |  FALSE   |                                            |
| is_active   | Is Active   |  boolean   |   1    |   TRUE   |                                            |
| vat_level   | VAT Level   |    int     |   2    |   TRUE   |                                            |

### ADIOS Parameters

| Column    | Parameter   | Value                        |
| :-------- | :---------- | ---------------------------- |
| is_active | description | Is the item active or not?   |
|           | default     | 1                            |
| vat_level | enum_values | BKP_BOOK_ACCOUNT_VAT_LEVEL_* |

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |
| vat_level |  INDEX  |  vat_level ASC |

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
