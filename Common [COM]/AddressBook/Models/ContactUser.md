# ContactUser

## Introduction
[Stručný popis o dátach uchovávaných v modeli.]

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

V modeli nie sú použité konštanty.

## Properties

(vid ADIOS.repo/src/Core/Model.php)

| Property              | Value                     |
| --------------------- | ------------------------- |
| isCrossTable          | FALSE                     |
| sqlName               | com_contact_users         |
| urlBase               | common/address-book/users |
| lookupSqlValue        | {%TABLE%}.first_name      |
| tableTitle            | Users                     |
| formTitleForInserting | New User                  |
| formTitleForEditing   | User                      |

## SQL Structure

| Column                 | Description              |   Type   | Length | NULL     | Default |
| :--------------------- | :----------------------- | :------: | :----: | :------- | :-----: |
| id                     | ID záznamu               |   INT    |   8    | NOT NULL |         |
| is_active              | Aktívny používateľ?      | BOOLEAN  |   1    | NOT NULL |    1    |
| first_name             | Krstné meno              | VARCHAR  |  200   | NOT NULL |         |
| last_name              | Priezvisko               | VARCHAR  |  200   | NOT NULL |         |
| email                  | Email                    | VARCHAR  |  100   | NULL     |         |
| phone                  | Telefón                  | VARCHAR  |   20   | NULL     |         |
| title                  | Titul                    | VARCHAR  |   50   | NULL     |         |
| password_hash          | Heslo                    | VARCHAR  |  255   | NULL     |         |
| last_login             | Posledný čas prihlásenia | DATETIME |        | NULL     |         |
| last_ip                | Posledná IP              | VARCHAR  |   40   | NULL     |         |
| last_active_time       | Posledný čas aktivity    | DATETIME |        | NULL     |         |
| last_password_change   | Posledná zmena hesla     | DATETIME |        | NULL     |         |
| new_pass_key           | Hash pre obnovenie hesla | VARCHAR  |   40   | NULL     |         |
| new_pass_key_requested | Čas žiadosti o obnovenie | DATETIME |        | NULL     |         |

## Columns

TODO: Nahradiť vzorové údaje
* name:
  * required: true
  * type: varchar
  * title: Name
  * byte_size: 100
  * showColumn: true
* description:
  * required: false
  * type: text
  * title: Description
  * showColumn: true
* maturity_date:
  * required: true
  * type: date
  * title: Maturity Date
  * showColumn: true
* is_open:
  * required: true
  * type: boolean
  * title: Is open
  * description: Is the document open or not?
  * showColumn: true
* state_sequence:
  * required: true
  * type: int
  * title: Order In Selects
  * description: Order of the item in input lists.
  * byte_size: 6
  * showColumn: true
* balance:
  * required: false
  * type: float
  * title: Balance
  * byte_size: 15
  * decimals: 2
  * showColumn: true
* id_fin_accounting_period:
  * required: true
  * type: lookup
  * title: Previous Accounting Period
  * model: Widgets/Finance/MainBook/Models/AccountingPeriod
  * inputStyle:”select”
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE


## Foreign Keys

[Model neobsahuje cudzie kľúče.]

| Column                   | Parent table           | Relation | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :------: | -------- | -------- |
| id_fin_accounting_period | fin_accounting_periods |   1:N    | Cascade  | Cascade  |
| id_fin_account_type      | fin_account_types      |   1:N    | Cascade  | Restrict |

## Indexes

| Name           |  Type   | Column + Order |
| :------------- | :-----: | -------------: |
| id             | PRIMARY |         id ASC |
| simple_index   |  INDEX  |       name ASC |
| unique_index   | UNIQUE  | start_date ASC |
| combined_index |  INDEX  |    is_open ASC |
|                |         | start_date ASC |

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
