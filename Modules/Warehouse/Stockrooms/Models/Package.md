# Model Warehouse/Stockrooms/Package

## Introduction

Evidence of all existing stockrooms packages related with specific units.

Following packages should be predefined in our system:
* **Each (EA)**: This is a generic unit of measurement used for individual items or products. It's often used for items that are sold or counted one by one, such as electronics, tools, or consumer goods.
* **Case (CS)**: A case typically contains multiple units of the same product bundled together. Case quantities can vary based on the product and manufacturer. For example, a case of canned beverages might contain 24 cans.

* **Pallet (PLT)**: A pallet is a platform used for stacking and transporting goods. It's often used for bulk storage and shipping. Products can be measured in terms of the number of pallets they occupy or the number of items on a pallet.

* **Carton (CTN)**: Similar to a case, a carton is a smaller packaging unit that contains a certain quantity of a product. It's commonly used for smaller items or items that are grouped for easier handling.

* **Roll (ROL)**: This unit is used for products that are sold in rolls, such as paper, textiles, or tape.

* **Piece per Hour (PPH)**: In some cases, especially in manufacturing or distribution environments, productivity units like "pieces per hour" are used to measure how fast items are picked, packed, or assembled.


## Constants

No constants are defined for this model.

## Properties

| Property               | Value                             |
| :--------------------- | :-------------------------------- |
| isJunctionTable        | FALSE                             |
| storeRecordInfo        | TRUE                              |
| sqlName                | whs_packages                      |
| urlBase                | warehouse/stockrooms/packages     |
| lookupSqlValue         | {%TABLE%}.name                    |
| tableTitle             | Packages                          |
| formTitleForInserting  | New Package                       |
| formTitleForEditing    | Package                           |
| crud/browse/controller | Warehouse/Stockrooms/Packages     |
| crud/add/controller    | Warehouse/Stockrooms/Package/Add  |
| crud/edit/controller   | Warehouse/Stockrooms/Package/Edit |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRUE   |                                            |
| description | Description |    text    |        |  FALSE   |                                            |
| id_com_unit | Unit        |   lookup   |        |  FALSE   |                                            |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column      | Model                                                                                | Relation | OnUpdate | OnDelete |
| :---------- | :----------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_unit | [App/Widgets/Common/CodeLists/Models/Unit](../../../Common/CodeLists/Models/Unit.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name        |  Type   |  Column + Order |
| :---------- | :-----: | --------------: |
| id          | PRIMARY |          id ASC |
| name        | UNIQUE  |        name ASC |
| id_com_unit |  INDEX  | id_com_unit ASC |

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
