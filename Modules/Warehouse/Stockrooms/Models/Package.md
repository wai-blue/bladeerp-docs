# Model Warehouse/Stockrooms/Package

## Introduction

Evidence of all existing stockrooms packages (e.g. bottle, can, package, palette).

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                            |
| :-------------------- | :------------------------------- |
| isJunctionTable       | FALSE                            |
| storeRecordInfo       | TRUE                             |
| sqlName               | whs_packages                     |
| urlBase               | warehouse/stockrooms/packages     |
| lookupSqlValue        | {%TABLE%}.name                   |
| tableTitle            | Packages                         |
| formTitleForInserting | New Package                      |
| formTitleForEditing   | Package                          |
| crud/browse/action    | Warehouse/Stockrooms/Packages     |
| crud/add/action       | Warehouse/Stockrooms/Package/Add  |
| crud/edit/action      | Warehouse/Stockrooms/Package/Edit |

## Data Structure

| Column                   | Title                      | ADIOS Type | Length | Required | Notes                                      |
| :----------------------- | -------------------------- | :--------: | :----: | :------: | :----------------------------------------- |
| id                       |                            |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info              | Record Info                |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name                     | Name                       |  varchar   |  100   |   TRUE   |                                            |
| description              | Description                |    text    |        |  FALSE   |                                            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name |  Type   | Column + Order |
| :--- | :-----: | -------------: |
| id   | PRIMARY |         id ASC |
| name | UNIQUE  |       name ASC |

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
