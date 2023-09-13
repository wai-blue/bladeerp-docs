# Model Common/AddressBook/Person

## Introduction
Model slúži na evidenciu fyzických osôb a ich údajov

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                                       |
| --------------------- | ------------------------------------------- |
| isJunctionTable       | FALSE                                       |
| storeRecordInfo       | TRUE                                        |
| sqlName               | com_persons                                 |
| urlBase               | common/address-book/persons                 |
| lookupSqlValue        | concat(first_name, last_name, phone, email) |
| tableTitle            | Persons                                     |
| formTitleForInserting | New Person                                  |
| formTitleForEditing   | Person                                      |
| crud/browse/action    | Common/AddressBook/Persons                  |
| crud/add/action       | Common/AddressBook/Person/Add               |
| crud/edit/action      | Common/AddressBook/Person/Edit              |

## Data Structure
| Column         | Title        | ADIOS Type | Length | Required | Notes                          |
| :------------- | :----------- | :--------: | :----: | :------: | :----------------------------- |
| id             |              |    int     |   8    |   TRUE   | ID záznamu                     |
| record_info    | Record Info  |    json    |        |   TRUE   |                                |
| id_com_contact | Contact      |    int     |   8    |   TRUE   | ID kontaktu                    |
| first_name     | First Name   |  varchar   |  200   |   TRUE   | Krstné meno                    |
| last_name      | Last Name    |  varchar   |  200   |  FALSE   | Priezvisko                     |
| middle_name    | Middle Name  |  varchar   |  200   |  FALSE   | Stretné meno                   |
| title_before   | Title Before |  varchar   |   50   |  FALSE   | Titul pred menom               |
| title_after    | Title After  |  varchar   |   50   |  FALSE   | Titul za menom                 |
| email          | Email        |  varchar   |  100   |   TRUE   | Email                          |
| phone          | Phone Number |  varchar   |   50   |  FALSE   | Telefón                        |
| url_linkedin   | LinkedIn URL |  varchar   |  255   |  FALSE   | URL adresa profilu na LinkedIn |

### ADIOS Parameters
| Column       | Parameter   | Value                          |
| :----------- | :---------- | ------------------------------ |
| url_linkedin | description | URL address to LinkeIn profile |
|              | default     | https://                       |

## Foreign Keys
| Column         | Model                                                         | Relation | OnUpdate | OnDelete |
| :------------- | :------------------------------------------------------------ | :------: | -------- | -------- |
| id_com_contact | [App/Widgets/Common/AddressBook/Models/Contact](./Contact.md) |   1:N    | Cascade  | Cascade  |

## Indexes
| Name        |  Type   |  Column + Order |
| :---------- | :-----: | --------------: |
| id          | PRIMARY |          id ASC |
| first_name  |  INDEX  |  first_name ASC |
| middle_name |  INDEX  | middle_name ASC |
| last_name   |  INDEX  |   last_name ASC |
| email       |  INDEX  |       email ASC |
| phone       |  INDEX  |       phone ASC |

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
