# Model Warehouse/Stockrooms/ItemMediafile

## Introduction

List of available mediafiles for given stockrooms item

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                                                         |
| :-------------------- | :---------------------------------------------------------------------------- |
| isJunctionTable       | TRUE                                                                          |
| storeRecordInfo       | FALSE                                                                         |
| sqlName               | whs_item_mediafiles                                                             |
| urlBase               | warehouse/stockrooms/item/{id_whs_item}/mediafiles                              |
| tableTitle            | Item Mediafiles                                                                 |
| formTitleForInserting | New Item Mediafile                                                              |
| formTitleForEditing   | Item Mediafile                                                                  |
| crud/browse/action    | Warehouse/Stockrooms/ItemMediafiles                                             |
| crud/add/action       | Warehouse/Stockrooms/ItemMediafile/Add                                          |
| crud/edit/action      | Warehouse/Stockrooms/ItemMediafile/Edit                                         |
| junctions             | `json`                                                                        |
|                       | `{`                                                                           |
|                       | `  "ItemMediafile": {`                                                          |
|                       | `    "junctionModel": "App/Widgets/Warehouse/Stockrooms/Models/ItemMediafile",` |
|                       | `    "optionsModel": "App/Widgets/Warehouse/Stockrooms/Models/Mediafile",`      |
|                       | `    "masterKeyColumn": "id_whs_item",`                                       |
|                       | `    "optionKeyColumn": "id_whs_mediafile",`                                                |
|                       | `  }`                                                                         |
|                       | `}`                                                                           |

## Data Structure

| Column           | Title           | ADIOS Type | Length | Required | Notes            |
| :--------------- | --------------- | :--------: | :----: | :------: | :--------------- |
| id               |                 |    int     |   8    |   TRUE   | Unique record ID |
| id_whs_item      | Stockrooms Item |   lookup   |   8    |   TRUE   |                  |
| id_whs_mediafile | Item Mediafile  |   lookup   |   8    |   TRUE   |                  |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column           | Model                                                               | Relation | OnUpdate | OnDelete |
| :--------------- | :------------------------------------------------------------------ | :------: | -------- | -------- |
| id_whs_item      | [App/Widgets/Warehouse/Stockrooms/Models/Item](./Item.md)           |   1:N    | Cascade  | Restrict |
| id_whs_mediafile | [App/Widgets/Warehouse/Stockrooms/Models/Mediafile](./Mediafile.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name             |  Type   |       Column + Order |
| :--------------- | :-----: | -------------------: |
| id               | PRIMARY |               id ASC |
| id_whs_item      |  INDEX  |      id_whs_item ASC |
| id_whs_mediafile |  INDEX  | id_whs_mediafile ASC |

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
