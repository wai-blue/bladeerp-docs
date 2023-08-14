# ContactCategory

## Introduction
Model slúži na správu kategórií kontaktov.

## Constants
V modeli nie sú použité konštanty.

## Properties

| Property              | Value                                  |
| :-------------------- | :------------------------------------- |
| isCrossTable          | FALSE                                  |
| sqlName               | com_contact_categories                 |
| urlBase               | common/address-book/contact-categories |
| lookupSqlValue        | {%TABLE%}.name                         |
| tableTitle            | Contact Categories                     |
| formTitleForInserting | New Contact Category                   |
| formTitleForEditing   | Contact Category                       |


## SQL Structure
| Column      | Description |  Type   | Length | NULL     | Default |
| :---------- | :---------- | :-----: | :----: | :------- | :-----: |
| id          | ID záznamu  |   INT   |   8    | NOT NULL |         |
| is_active   | Je aktívna? | BOOLEAN |   1    | NOT NULL |    1    |
| name        | Názov       | VARCHAR |  100   | NOT NULL |         |
| description | Poznámka    |  TEXT   |        | NULL     |         |

## Foreign Keys
Tabuľka neobsahuje cudzie kľúče.

## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |
| name      | UNIQUE  |       name ASC |

## Columns
* name:
  * required: true
  * type: varchar
  * title: Category Name
  * byte_size: 100
  * showColumn: true
* description:
  * required: false
  * type: text
  * title: Description
  * showColumn: true
* is_active:
  * required: true
  * type: boolean
  * title: Is Active
  * description: Is the category active or not?
  * showColumn: true

## Callbacks
### onBeforeInsert
Nepovoliť vloženie, ak hodnota **name** už tabuľke existuje.

### onAfterInsert
Not used.

### onBeforeUpdate
Neuložiť zmenu, ak hodnota **name** už tabuľke existuje.

### onAfterUpdate
Not used.

### onBeforeDelete
Nepovoliť vymazanie, ak je kategória použitá na niektorom kontakte (tbl: **com_contact_has_category**)

### onAfterDelete
Not used.

## Formatters

### tableCellHTMLlFormatter
Not used.

### tableCellCSVFormatter
Not used.

### tableCellCSSFormatter
Not used.

### tableRowCSSFormatter
Not used.

### cardsCardHtmlFormatter
Not used.
