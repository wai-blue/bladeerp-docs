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
  * model: Widgets/AddressBook/Models/Contact
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE
* id_com_contact_category:
  * required: true
  * type: lookup
  * title: Contact Category
  * model: Widgets/AddressBook/Models/ContactCategory
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT

## Callbacks

### onBeforeInsert
Nepoužíva sa.

### onAfterInsert
Nepoužíva sa.

### onBeforeUpdate
Nepoužíva sa.

### onAfterUpdate
Nepoužíva sa.

### onBeforeDelete
Nepoužíva sa.

### onAfterDelete
Nepoužíva sa.

## Formatters

### tableCellHTMLlFormatter
Nepoužíva sa.

### tableCellCSVFormatter
Nepoužíva sa.

### tableCellCSSFormatter
Nepoužíva sa.

### tableRowCSSFormatter
Nepoužíva sa.

### cardsCardHtmlFormatter
Nepoužíva sa.
