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

| Column                   | Title                      | ADIOS Type | Length | Required | Notes                                      |
| :----------------------- | -------------------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                       |                            |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info              | Record Info                |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name                     | Name                       |  varchar   |  100   |   TRUE   |                                            |
| description              | Description                |    text    |        |  FALSE   |                                            |
| id_com_address           | Address                    |    date    |   8    |   TRUE   |                                            |
| is_active                | Is Active                  |  boolean   |   1    |   TRUE   |                                            |

### ADIOS Parameters

| Column         | Parameter   | Value                             |
| :------------- | :---------- | --------------------------------- |
| is_active      | description | Is in use this stockroom or not?  |
|                | default     | 1                                 |

### Foreign Keys

| Column         | Model                                                                                          | Relation | OnUpdate | OnDelete |
| :------------- | :--------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_address | [App/Widgets/Common/AddressBook/Models/Address](../../../Common/AddressBook/Models/Address.md) |   1:N    | Cascade  | Cascade  |

### Indexes

[Model does not contain indexes.]

| Name           |  Type   |     Column + Order |
| :------------- | :-----: | -----------------: |
| id             | PRIMARY |             id ASC |
| name           | UNIQUE  |           name ASC |
| is_active      |  INDEX  |      is_active ASC |
| id_com_address |  INDEX  | id_com_address ASC |

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
