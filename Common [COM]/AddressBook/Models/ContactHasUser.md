# ContactHasUser

## Introduction
Model slúži na prepojenie kontaktov s jeho používateľmi M:N.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                |
| :-------------------- | :------------------- |
| isCrossTable          | TRUE                 |
| sqlName               | com_contact_has_user |
| urlBase               | -                    |
| lookupSqlValue        | -                    |
| tableTitle            | -                    |
| formTitleForInserting | -                    |
| formTitleForEditing   | -                    |

## SQL Structure

| Column              | Description    | Type | Length | NULL     | Default |
| :------------------ | :------------- | :--: | :----: | -------- | :-----: |
| id_com_contact      | ID kontaktu    | INT  |   8    | NOT NULL |         |
| id_com_contact_user | ID používateľa | INT  |   8    | NOT NULL |         |

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
* id_com_contact_user:
  * required: true
  * type: lookup
  * title: Contact User
  * model: Widgets/AddressBook/Models/ContactUser
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT

## Foreign Keys

| Column              | Parent table     | Relation | OnUpdate | OnDelete |
| :------------------ | :--------------- | :------: | -------- | -------- |
| id_com_contact      | com_contacts     |   1:N    | Cascade  | Cascade  |
| id_com_contact_user | com_contact_user |   1:N    | Cascade  | Restrict |

## Indexes

Pre túto tabuľku nie sú definované indexy.

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
