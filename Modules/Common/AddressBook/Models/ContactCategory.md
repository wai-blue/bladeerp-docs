# Model Common/AddressBook/ContactCategory

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


## Data Structure
| Column          | Title            | ADIOS Type | Length | Required | Notes                                    |
| :-------------- | :--------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id              |                  |    int     |   8    |   TRUE   | ID záznamu                               |
| id_created_by   | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by   | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| is_active       | Is Active?       |  boolean   |   1    |   TRUE   | Je aktívna?                              |
| name            | Name             |  varchar   |  100   |   TRUE   | Názov                                    |
| description     | Description      |    text    |        |  FALSE   | Poznámka                                 |

### ADIOS Parameters
| Column    | Parameter   | Value                           |
| :-------- | :---------- | ------------------------------- |
| is_active | description | Is this category active or not? |
|           | default     | 1                               |

## Foreign Keys
| Column        | Model           | Relation | OnUpdate | OnDelete |
| :------------ | :-------------- | :------: | -------- | -------- |
| id_created_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |
| id_updated_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |

## Indexes
| Name      |  Type   | Column + Order |
| :-------- | :-----: | -------------: |
| id        | PRIMARY |         id ASC |
| is_active |  INDEX  | is_active DESC |
| name      | UNIQUE  |       name ASC |

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
