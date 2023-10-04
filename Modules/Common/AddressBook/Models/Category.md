# Model Common/AddressBook/Category

## Introduction
Model slúži na správu kategórií kontaktov.

## Constants
V modeli nie sú použité konštanty.

## Properties

| Property              | Value                            |
| :-------------------- | :------------------------------- |
| isJunctionTable       | FALSE                            |
| storeRecordInfo       | TRUE                             |
| sqlName               | com_categories                   |
| urlBase               | common/address-book/categories   |
| lookupSqlValue        | {%TABLE%}.name                   |
| tableTitle            | Contact Categories               |
| formTitleForInserting | New Contact Category             |
| formTitleForEditing   | Contact Category                 |
| crud/browse/action    | Common/AddressBook/Categories    |
| crud/add/action       | Common/AddressBook/Category/Add  |
| crud/edit/action      | Common/AddressBook/Category/Edit |

## Data Structure
| Column      | Title       | ADIOS Type | Length | Required | Notes       |
| :---------- | :---------- | :--------: | :----: | :------: | :---------- |
| id          |             |    int     |   8    |   TRUE   | ID záznamu  |
| record_info | Record Info |    json    |        |   TRUE   |             |
| is_active   | Is Active?  |  boolean   |   1    |   TRUE   | Je aktívna? |
| name        | Name        |  varchar   |  100   |   TRUE   | Názov       |
| notes       | Notes       |    text    |        |  FALSE   | Poznámka    |


### ADIOS Parameters
| Column    | Parameter   | Value                           |
| :-------- | :---------- | ------------------------------- |
| is_active | description | Is this category active or not? |
|           | default     | 1                               |

### Foreign Keys
Model does not contain foreign keys.

### Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |
| name      | UNIQUE  |       name ASC |

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
