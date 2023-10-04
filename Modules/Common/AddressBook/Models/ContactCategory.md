# Model Common/AddressBook/ContactCategory

## Introduction
Model slúži na prepojenie kontaktov s kategóriami M:N.

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                |
| :-------------------- | :------------------- |
| isJunctionTable       | TRUE                 |
| storeRecordInfo       | FALSE                |
| sqlName               | com_contact_category |
| urlBase               | -                    |
| lookupSqlValue        | -                    |
| tableTitle            | -                    |
| formTitleForInserting | -                    |
| formTitleForEditing   | -                    |
| crud/browse/action    | -                    |
| crud/add/action       | -                    |
| crud/edit/action      | -                    |
| junctions             | `json`                                                                  |
|                       | `{`                                                                     |
|                       | `  "ContactCategory": {`                                                |
|                       | `    "junctionModel": "App/Common/AddressBook/Models/ContactCategory",` |
|                       | `    "optionsModel": "App/Common/AddressBook/Models/Category",`         |
|                       | `    "masterKeyColumn": "id_com_contact",`                              |
|                       | `    "optionKeyColumn": "id_com_category",`                             |
|                       | `  }`                                                                   |
|                       | `}`                                                                     |


## Data Structure

| Column          | Title    | ADIOS Type | Length | Required | Notes            |
| :-------------- | :------- | :--------: | :----: | :------: | :--------------- |
| id              |          |    int     |   8    |   TRUE   | Unique record ID |
| id_com_contact  | Contact  |   lookup   |   8    |   TRUE   | ID kontaktu      |
| id_com_category | Category |   lookup   |   8    |   TRUE   | ID kategórie     |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined

## Foreign Keys

| Column          | Model                                                           | Relation | OnUpdate | OnDelete |
| :-------------- | :-------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_contact  | [App/Widgets/Common/AddressBook/Models/Contact](./Contact.md)   |   1:N    | Cascade  | Cascade  |
| id_com_category | [App/Widgets/Common/AddressBook/Models/Category](./Category.md) |   1:N    | Cascade  | Restrict |

## Indexes

| Name                             |  Type   |      Column + Order |
| :------------------------------- | :-----: | ------------------: |
| id                               | PRIMARY |              id ASC |
| id_com_contact___id_com_category | UNIQUE  |  id_com_contact ASC |
|                                  |         | id_com_category ASC |

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
