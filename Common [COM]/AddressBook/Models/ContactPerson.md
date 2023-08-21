# ContactPerson

## Introduction
Model slúži na evidenciu fyzických osôb a ich údajov

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                       |
| --------------------- | --------------------------- |
| isCrossTable          | FALSE                       |
| sqlName               | com_contact_persons         |
| urlBase               | common/address-book/persons |
| lookupSqlValue        | {%TABLE%}.first_name        |
| tableTitle            | Persons                     |
| formTitleForInserting | New Person                  |
| formTitleForEditing   | Person                      |

## SQL Structure
| Column         | Description      |  Type   | Length | NULL     | Default |
| :------------- | :--------------- | :-----: | :----: | :------- | :-----: |
| id             | ID záznamu       |   INT   |   8    | NOT NULL |         |
| id_com_contact | ID kontaktu      |   INT   |   8    | NOT NULL |         |
| first_name     | Krstné meno      | VARCHAR |  200   | NOT NULL |         |
| last_name      | Priezvisko       | VARCHAR |  200   | NOT NULL |         |
| middle_name    | Stretné meno     | VARCHAR |  200   | NULL     |         |
| title_before   | Titul pred menom | VARCHAR |   50   | NULL     |         |
| title_after    | Titul za menom   | VARCHAR |   50   | NULL     |         |
| email          | Email            | VARCHAR |  100   | NOT NULL |         |
| phone          | Telefón          | VARCHAR |   20   | NULL     |         |

## Foreign Keys
| Column              | Parent table      | Relation | OnUpdate | OnDelete |
| :------------------ | :---------------- | :------: | -------- | -------- |
| id_com_contact      | com_contacts      |   1:N    | Cascade  | Cascade  |

## Indexes
| Name        |  Type   |  Column + Order |
| :---------- | :-----: | --------------: |
| id          | PRIMARY |          id ASC |
| first_name  |  INDEX  |  first_name ASC |
| middle_name |  INDEX  | middle_name ASC |
| last_name   |  INDEX  |   last_name ASC |
| email       | UNIQUE  |       email ASC |
| phone       |  INDEX  |       phone ASC |

## Columns
* id_com_contact:
  * required: true
  * type: lookup
  * title: Contact
  * model: App/Widgets/Common/AddressBook/Models/Contact
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* first_name:
  * required: true
  * type: varchar
  * title: Name
  * byte_size: 200
  * showColumn: true
* last_name:
  * required: true
  * type: varchar
  * title: Name
  * byte_size: 200
  * showColumn: true
* middle_name:
  * required: false
  * type: varchar
  * title: Name
  * byte_size: 200
  * showColumn: true
* title_before:
  * required: false
  * type: varchar
  * title: Name
  * byte_size: 50
  * showColumn: true
* title_after:
  * required: false
  * type: varchar
  * title: Name
  * byte_size: 50
  * showColumn: true
* email:
  * required: true
  * type: varchar
  * title: Name
  * byte_size: 100
  * showColumn: true
* phone:
  * required: false
  * type: varchar
  * title: Name
  * byte_size: 20
  * showColumn: true

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
