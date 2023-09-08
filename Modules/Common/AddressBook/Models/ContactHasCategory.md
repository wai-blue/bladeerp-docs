# Model Common/AddressBook/ContactHasCategory

## Introduction
Model slúži na prepojenie kontaktov s kategóriami M:N.

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                    |
| :-------------------- | :----------------------- |
| isCrossTable          | TRUE                     |
| storeRecordInfo       | FALSE                    |
| sqlName               | com_contact_has_category |
| urlBase               | -                        |
| lookupSqlValue        | -                        |
| tableTitle            | -                        |
| formTitleForInserting | -                        |
| formTitleForEditing   | -                        |

## Data Structure
| Column                  | Title    | ADIOS Type | Length | Required | Notes        |
| :---------------------- | :------- | :--------: | :----: | :------: | :----------- |
| id_com_contact          | Contact  |    int     |   8    |   TRUE   | ID kontaktu  |
| id_com_contact_category | Category |    int     |   8    |   TRUE   | ID kategórie |

### ADIOS Parameters
No additional ADIOS parameters needs to be defined

## Foreign Keys
| Column                  | Model                                                                                          | Relation | OnUpdate | OnDelete |
| :---------------------- | :--------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_contact          | [App/Widgets/Common/AddressBook/Models/Contact](../../../Common/AddressBook/Models/Contact.md) |   1:N    | Cascade  | Cascade  |
| id_com_contact_category | com_contact_category                                                                           |   1:N    | Cascade  | Restrict |

## Indexes
Model does not contain indexes.

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
