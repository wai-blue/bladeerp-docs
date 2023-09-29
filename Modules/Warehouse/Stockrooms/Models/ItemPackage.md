# Model Warehouse/Stockrooms/ItemPackage

## Introduction

List of available packages for given stockrooms item

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                         |
| :-------------------- | :---------------------------------------------------------------------------- |
| isJunctionTable       | TRUE                                                                          |
| storeRecordInfo       | FALSE                                                                         |
| sqlName               | whs_item_packages                                                             |
| urlBase               | warehouse/stockrooms/item/{id_whs_item}/packages                              |
| tableTitle            | Item Packages                                                                 |
| formTitleForInserting | New Item Package                                                              |
| formTitleForEditing   | Item Package                                                                  |
| crud/browse/action    | Warehouse/Stockrooms/ItemPackages                                             |
| crud/add/action       | Warehouse/Stockrooms/ItemPackage/Add                                          |
| crud/edit/action      | Warehouse/Stockrooms/ItemPackage/Edit                                         |
| junctions             | `json`                                                                        |
|                       | `{`                                                                           |
|                       | `  "ItemPackage": {`                                                          |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Stockrooms/Models/ItemPackage",` |
|                       | `    "optionsModel": "App/Widgets/Warehouse/Stockrooms/Models/Package",`      |
|                       | `    "masterKeyColumn": "id_whs_item",`                                       |
|                       | `    "optionKeyColumn": "id_whs_package",`                                                |
|                       | `  }`                                                                         |
|                       | `}`                                                                           |

## Data Structure

| Column         | Title           | ADIOS Type | Length | Required | Notes                          |
| :------------- | --------------- | :--------: | :----: | :------: | :----------------------------- |
| id             |                 |    int     |   8    |   TRUE   | Unique record ID               |
| id_whs_item    | Stockrooms Item |   lookup   |   8    |   TRUE   |                                |
| id_whs_package | Item Package    |   lookup   |   8    |   TRUE   |                                |
| amount         | Amount          |  decimal   |  15,2  |   TRUE   | Amount of units in the package |
| id_com_unit    | Unit            |   lookup   |        |  FALSE   |                                |

### ADIOS Parameters

| Column | Parameter   | Value                          |
| :----- | :---------- | ------------------------------ |
| amount | description | Amount of items in the package |
|        | default     | 1                              |

### Foreign Keys

| Column         | Model                                                                        | Relation | OnUpdate | OnDelete |
| :------------- | :--------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_item    | [App/Widgets/Warehouse/Stockrooms/Models/Item](./Item.md)                    |   1:N    | Cascade  | Restrict |
| id_whs_package | [App/Widgets/Warehouse/Stockrooms/Models/Package](./Package.md)              |   1:N    | Cascade  | Restrict |
| id_com_unit    | [App/Widgets/Common/Units/Models/Unit](../../../Common/Units/Models/Unit.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name           |  Type   |     Column + Order |
| :------------- | :-----: | -----------------: |
| id             | PRIMARY |             id ASC |
| id_whs_item    |  INDEX  |    id_whs_item ASC |
| id_whs_package |  INDEX  | id_whs_package ASC |

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
