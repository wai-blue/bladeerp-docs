# Model Warehouse/Inventory/Item

## Introduction

Invenoty item is a distinct product, part, or item that a company procures, manufactures, stores, and tracks within its inventory. Each inventory item is assigned a unique identifier, often referred to as a Stock Keeping Unit (SKU) or part number, which allows for accurate identification and tracking.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                              |
| :-------------------- | :--------------------------------- |
| isJunctionTable       | FALSE                              |
| storeRecordInfo       | TRUE                               |
| sqlName               | whs_inventory_items                          |
| urlBase               | warehouse/inventory/items          |
| lookupSqlValue        | {%TABLE%}.name                     |
| tableTitle            | Inventory Items                    |
| formTitleForInserting | New Inventory Item                 |
| formTitleForEditing   | Inventory Item                     |
| crud/browse/action    | Warehouse/Inventory/Items (plural) |
| crud/add/action       | Warehouse/Inventory/Item/Add       |
| crud/edit/action      | Warehouse/Inventory/Item/Edit      |

## Data Structure

| Column              | Title        | ADIOS Type | Length | Required | Notes                                                             |
| :------------------ | ------------ | :--------: | :----: | :------: | :---------------------------------------------------------------- |
| id                  |              |    int     |   8    |   TRUE   | Unique record ID                                                  |
| record_info         | Record Info  |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author                        |
| name                | Name         |  varchar   |  100   |   TRUE   |                                                                   |
| description         | Description  |    text    |        |  FALSE   |                                                                   |
| is_service          | Is Service   |  boolean   |   1    |   TRUE   | If the item is service (TRUE) or product (FALSE)                  |
| is_active           | Is Active    |  boolean   |   1    |   TRUE   |                                                                   |
| id_bkp_vat          | VAT of item  |   lookup   |   8    |   TRUE   | VAT which is used in case of item price                           |
| id_whs_unit_default | Default Unit |   lookup   |   8    |  FALSE   | Unit wich will be used automatically when item is added somewhere |

### ADIOS Parameters

| Column         | Parameter   | Value                                   |
| :------------- | :---------- | --------------------------------------- |
| is_service     | description | Is the item service or not (= product)? |
|                | default     | 0                                       |
| is_active      | description | Is the item active or not?              |
|                | default     | 1                                       |

### Foreign Keys

| Column              | Model                                                                                | Relation | OnUpdate | OnDelete |
| :------------------ | :----------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_vat          | [App/Widgets/Bookkeeping/Books/Models/Vat](../../../Bookkeeping/Books/Models/Vat.md) |   1:N    | Cascade  | Restrict |
| id_whs_unit_default | [App/Widgets/Warehouse/Inventory/Models/Unit](./Unit.md)                             |   1:N    | Cascade  | Restrict |

### Indexes

| Name                 |  Type   | Column + Order |
| :------------------- | :-----: | -------------: |
| id                   | PRIMARY |         id ASC |
| is_active            |  INDEX  | is_active DESC |
| is_service           |  INDEX  | is_service ASC |

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
