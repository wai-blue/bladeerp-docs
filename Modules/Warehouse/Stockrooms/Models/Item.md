# Model Warehouse/Stockrooms/Item

## Introduction

Invenoty item is a distinct product, part, or item that a company procures, manufactures, stores, and tracks within its stockrooms. Each stockrooms item is assigned a unique identifier, often referred to as a Stock Keeping Unit (SKU) or part number, which allows for accurate identification and tracking.

## Constants

### Item Types Enums
| Constant              | Value | Description     |
| :-------------------- | :---: | :-------------- |
| WHS_ITEM_TYPE_PRODUCT |   1   | Item is PRODUCT |
| WHS_ITEM_TYPE_SERVICE |   2   | Item is SERVICE |

## Properties

| Property              | Value                          |
| :-------------------- | :----------------------------- |
| isJunctionTable       | FALSE                          |
| storeRecordInfo       | TRUE                           |
| sqlName               | whs_items                      |
| urlBase               | warehouse/stockrooms/items     |
| lookupSqlValue        | {%TABLE%}.name                 |
| tableTitle            | Stockrooms Items               |
| formTitleForInserting | New Stockrooms Item            |
| formTitleForEditing   | Stockrooms Item                |
| crud/browse/action    | Warehouse/Stockrooms/Items     |
| crud/add/action       | Warehouse/Stockrooms/Item/Add  |
| crud/edit/action      | Warehouse/Stockrooms/Item/Edit |

## Data Structure

| Column                      | Title           | ADIOS Type | Length | Required | Notes                                      |
| :-------------------------- | --------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                          |                 |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info                 | Record Info     |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name                        | Name            |  varchar   |  100   |   TRUE   |                                            |
| description                 | Description     |    text    |        |  FALSE   |                                            |
| type                        | Item Type       |    enum    |   1    |   TRUE   | Type of item (product, service,...)        |
| is_active                   | Is Active       |  boolean   |   1    |   TRUE   |                                            |
| vat_level                   | VAT Level       |    int     |   2    |   TRUE   |                                            |
| id_whs_item_package_default | Default Package |   lookup   |   8    |  FALSE   | Default Package used primary for the item. |


### ADIOS Parameters

| Column    | Parameter   | Value                        |
| :-------- | :---------- | ---------------------------- |
| type      | enum_values | WHS_ITEM_TYPE_*              |
| is_active | description | Is the item active or not?   |
|           | default     | 1                            |
| vat_level | enum_values | BKP_BOOK_ACCOUNT_VAT_LEVEL_* |

### Foreign Keys

| Column                      | Model                                                                   | Relation | OnUpdate | OnDelete |
| :-------------------------- | :---------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_item_package_default | [App/Widgets/Warehouse/Stockrooms/Models/ItemPackage](./ItemPackage.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |
| type      |  INDEX  |       type ASC |

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
