# Model Warehouse/Stockrooms/ItemMedia

## Introduction

List of available media files for given stockrooms item

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                                                                       |
| :--------------------- | :-------------------------------------------------------------------------- |
| isJunctionTable        | TRUE                                                                        |
| storeRecordInfo        | FALSE                                                                       |
| sqlName                | whs_item_medias                                                             |
| urlBase                | warehouse/stockrooms/item/{id_whs_item}/medias                              |
| tableTitle             | Item Medias                                                                 |
| formTitleForInserting  | New Item Media                                                              |
| formTitleForEditing    | Item Media                                                                  |
| crud/browse/controller | Warehouse/Stockrooms/ItemMedias                                             |
| crud/add/controller    | Warehouse/Stockrooms/ItemMedia/Add                                          |
| crud/edit/controller   | Warehouse/Stockrooms/ItemMedia/Edit                                         |
| junctions              | `json`                                                                      |
|                        | `{`                                                                         |
|                        | `  "ItemMedia": {`                                                          |
|                        | `    "junctionModel": "App/Widgets/Warehouse/Stockrooms/Models/ItemMedia",` |
|                        | `    "optionsModel": "App/Widgets/Common/CodeLists/Models/Media",`          |
|                        | `    "masterKeyColumn": "id_whs_item",`                                     |
|                        | `    "optionKeyColumn": "id_com_media",`                                    |
|                        | `  }`                                                                       |
|                        | `}`                                                                         |

## Data Structure

| Column             | Title               | ADIOS Type | Length | Required | Notes            |
| :----------------- | ------------------- | :--------: | :----: | :------: | :--------------- |
| id                 |                     |    int     |   8    |   TRUE   | Unique record ID |
| id_whs_item        | Stockrooms Item     |   lookup   |   8    |   TRUE   |                  |
| id_com_media       | Item Media          |   lookup   |   8    |   TRUE   |                  |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column       | Model                                                                                  | Relation | OnUpdate | OnDelete |
| :----------- | :------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_whs_item  | [App/Widgets/Warehouse/Stockrooms/Models/Item](./Item.md)                              |   1:N    | Cascade  | Restrict |
| id_com_media | [App/Widgets/Common/CodeLists/Models/Media](../../../Common/CodeLists/Models/Media.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name         |  Type   |   Column + Order |
| :----------- | :-----: | ---------------: |
| id           | PRIMARY |           id ASC |
| id_whs_item  |  INDEX  |  id_whs_item ASC |
| id_com_media |  INDEX  | id_com_media ASC |

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
