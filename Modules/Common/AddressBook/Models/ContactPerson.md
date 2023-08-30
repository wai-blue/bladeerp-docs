# Model Common/AddressBook/ContactPerson

## Introduction
Model slúži na evidenciu fyzických osôb a ich údajov

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                                       |
| --------------------- | ------------------------------------------- |
| isCrossTable          | FALSE                                       |
| sqlName               | com_contact_persons                         |
| urlBase               | common/address-book/persons                 |
| lookupSqlValue        | concat(first_name, last_name, phone, email) |
| tableTitle            | Persons                                     |
| formTitleForInserting | New Person                                  |
| formTitleForEditing   | Person                                      |

## Data Structure
| Column          | Title            | ADIOS Type | Length | Required | Notes                                    |
| :-------------- | :--------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id              |                  |    int     |   8    |   TRUE   | ID záznamu                               |
| id_created_by   | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by   | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| id_com_contact  | Contact          |    int     |   8    |   TRUE   | ID kontaktu                              |
| first_name      | First Name       |  varchar   |  200   |   TRUE   | Krstné meno                              |
| last_name       | Last Name        |  varchar   |  200   |   TRUE   | Priezvisko                               |
| middle_name     | Middle Name      |  varchar   |  200   |  FALSE   | Stretné meno                             |
| title_before    | Title Before     |  varchar   |   50   |  FALSE   | Titul pred menom                         |
| title_after     | Title After      |  varchar   |   50   |  FALSE   | Titul za menom                           |
| email           | Email            |  varchar   |  100   |   TRUE   | Email                                    |
| phone           | Phone Number     |  varchar   |   20   |  FALSE   | Telefón                                  |

### ADIOS Parameters
No additional ADIOS parameters needs to be defined

## Foreign Keys
| Column         | Model                                                                                          | Relation | OnUpdate | OnDelete |
| :------------- | :--------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_created_by  | ADIOS/Core/User                                                                                |   1:N    | Cascade  | Cascade  |
| id_updated_by  | ADIOS/Core/User                                                                                |   1:N    | Cascade  | Cascade  |
| id_com_contact | [App/Widgets/Common/AddressBook/Models/Contact](../../../Common/AddressBook/Models/Contact.md) |   1:N    | Cascade  | Cascade  |

## Indexes
| Name        |  Type   |  Column + Order |
| :---------- | :-----: | --------------: |
| id          | PRIMARY |          id ASC |
| first_name  |  INDEX  |  first_name ASC |
| middle_name |  INDEX  | middle_name ASC |
| last_name   |  INDEX  |   last_name ASC |
| email       | UNIQUE  |       email ASC |
| phone       |  INDEX  |       phone ASC |

## Callbacks

### onBeforeInsert
Nie je možné pridať osobu s rovnakým emailom (col: **email**).

### onAfterInsert
Not used.

### onBeforeUpdate
Nie je možné nať osobu s rovnakým emailom (col: **email**).

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
