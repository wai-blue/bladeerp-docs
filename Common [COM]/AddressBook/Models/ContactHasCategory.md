# ContactHasCategory

## Introduction
Model slúži na prepojenie kontaktov s kategóriami M:N.

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                    |
| :-------------------- | :----------------------- |
| isCrossTable          | TRUE                     |
| sqlName               | com_contact_has_category |
| urlBase               | -                        |
| lookupSqlValue        | -                        |
| tableTitle            | -                        |
| formTitleForInserting | -                        |
| formTitleForEditing   | -                        |

## SQL Structure
| Column                  | Description  | Type | Length | NULL     | Default |
| :---------------------- | :----------- | :--: | :----: | -------- | :-----: |
| id_com_contact          | ID kontaktu  | INT  |   8    | NOT NULL |         |
| id_com_contact_category | ID kategórie | INT  |   8    | NOT NULL |         |

## Foreign Keys
| Column                  | Parent table         | Relation | OnUpdate | OnDelete |
| :---------------------- | :------------------- | :------: | -------- | -------- |
| id_com_contact          | com_contacts         |   1:N    | Cascade  | Cascade  |
| id_com_contact_category | com_contact_category |   1:N    | Cascade  | Restrict |

## Indexes
Pre túto tabuľku nie sú definované indexy.

## Columns
* id_com_contact:
  * required: true
  * type: lookup
  * title: Contact
  * model: App/Widgets/AddressBook/Models/Contact
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE
* id_com_contact_category:
  * required: true
  * type: lookup
  * title: Contact Category
  * model: App/Widgets/AddressBook/Models/ContactCategory
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT

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
