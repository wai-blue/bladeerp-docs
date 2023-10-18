# Model Common/CodeLists/Unit

## Introduction

The list of all physical units available in our system for physical measurement in case of items. The choice of units depends on the nature of the products being stored and the specific needs of the business. 

Following physical units should be predefined in our system:
* **Kilogram (KG)** or **Pound (LB)**: Weight units like kilograms or pounds are used for products that are sold or measured by weight, such as food items, bulk materials, or chemicals.

* **Liter (L)** or **Gallon (GAL)**: Volume units like liters or gallons are used for liquids and certain chemicals. For example, chemicals may be stored and managed in liters.

* **Square Meter (SQM)** or **Square Foot (SQFT)**: Area units are used for products that are measured by their physical area, such as flooring materials or textiles.

* **Cubic Meter (CBM)** or **Cubic Foot (CBFT)**: These units are used for measuring the volume of products, especially for bulky items or items that need to be stored in terms of cubic dimensions.

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                             |
| :--------------------- | :-------------------------------- |
| isJunctionTable        | FALSE                             |
| storeRecordInfo        | TRUE                              |
| sqlName                | com_units                         |
| urlBase                | common/codelists/units            |
| lookupSqlValue         | concat(name, ' ','(', symbol,')') |
| tableTitle             | Units                             |
| formTitleForInserting  | New Unit                          |
| formTitleForEditing    | Unit                              |
| crud/browse/controller | Common/CodeLists/Units            |
| crud/add/controller    | Common/CodeLists/Unit/AddOrEdit   |
| crud/edit/controller   | Common/CodeLists/Unit/AddOrEdit   |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                                      |
| :---------- | ----------- | :--------: | :----: | :------: | :----------------------------------------- |
| id          |             |    int     |   8    |   TRUE   | Unique record ID                           |
| record_info | Record Info |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author |
| name        | Name        |  varchar   |  100   |   TRUE   |                                            |
| symbol      | Symbol      |  varchar   |   10   |   TRUE   |                                            |


### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name    |  Type   | Column + Order |
| :------ | :-----: | -------------: |
| id      | PRIMARY |         id ASC |
| name    | UNIQUE  |       name ASC |
| symbol  | UNIQUE  |     symbol ASC |

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
