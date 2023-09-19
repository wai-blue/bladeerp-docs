# Model Warehouse/Inventory/Unit

## Introduction

List of all units available in warehouse for expression of quantity in case of items

## Constants

No constants are defined for this model.
### Unit Of Enums
| Constant                       | Value | Description      |
| :----------------------------- | :---: | :--------------- |
| WHS_INVENTORY_UNIT_OF_QUANTITY |   1   | Unit of quantity |
| WHS_INVENTORY_UNIT_OF_LENGHT   |   2   | Unit of leght    |
| WHS_INVENTORY_UNIT_OF_VOLUME   |   3   | Unit of volume   |
| WHS_INVENTORY_UNIT_OF_MASS     |   4   | Unit of mass     |
| WHS_INVENTORY_UNIT_OF_AREA     |   5   | Unit of area     |


## Properties

| Property              | Value                             |
| :-------------------- | :-------------------------------- |
| isJunctionTable       | FALSE                             |
| storeRecordInfo       | TRUE                              |
| sqlName               | whs_units                         |
| urlBase               | warehouse/inventory/units         |
| lookupSqlValue        | concat(name, ' ','(', symbol,')') |
| tableTitle            | Inventory Units                   |
| formTitleForInserting | New Inventory Unit                |
| formTitleForEditing   | Inventory Unit                    |
| crud/browse/action    | Warehouse/Inventory/Units         |
| crud/add/action       | Warehouse/Inventory/Unit/Add      |
| crud/edit/action      | Warehouse/Inventory/Unit/Edit     |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRUE   |                                            |
| symbol      | Symbol      |  varchar   |   10   |   TRUE   |                                            |
| unit_of     | Unit Of     |    enum    |        |   TRUE   | What is a prupose of the unit              |
| consist_of  | Consist Of  |    int     |   4    |   TRUE   | In case of package the value is > 1        |


### ADIOS Parameters

| Column     | Parameter   | Value                                   |
| :--------- | :---------- | --------------------------------------- |
| unit_of    | description | What is a prupose of the unit ?         |
|            | enum_values | WHS_INVENTORY_UNIT_OF_*                 |
| consist_of | description | Items count which are part of the unit. |
|            | default     | 1                                       |

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name    |  Type   | Column + Order |
| :------ | :-----: | -------------: |
| id      | PRIMARY |         id ASC |
| name    | UNIQUE  |       name ASC |
| symbol  | UNIQUE  |     symbol ASC |
| unit_of |  INDEX  |    unit_of ASC |

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
