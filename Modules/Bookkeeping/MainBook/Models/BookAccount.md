# BookAccount

## Introduction

Tento model obsahuje všetky údaje, ktoré sa  týkajú účtovnej osnovy. Budú tu zapísané všetky používané účty v rámci Podvojného účtovníctva (nie bankové účty).

Vzor účtovnej osnovy https://www.ako-uctovat.sk/uctovna-osnova.php.

## Constants

| Constant                            | Value | Description                                                                               |
| :---------------------------------- | :---: | :---------------------------------------------------------------------------------------- |
| BKP_BOOK_ACCOUNT_SIDE_BOTH          | 1     | Je možné účtovať na obe strany                                                            |
| BKP_BOOK_ACCOUNT_SIDE_GET           | 2     | Účet na strane Má dať                                                                     |
| BKP_BOOK_ACCOUNT_SIDE_PUT           | 3     | Účet na strane Dal                                                                        |
| BKP_BOOK_ACCCOUNT_STATE_DEFAULT     | 1     | Počiatočný stav, je možné na účet účtovať aj vytvárať podúčty                             |
| BKP_BOOK_ACCCOUNT_STATE_SUMMARY     | 2     | Po vytvorení prvého podúčtu sa nastaví tento stav a už nie je možné na tento účet účtovať |
| BKP_BOOK_ACCCOUNT_STATE_ACCOUNTABLE | 3     | Po prvom zaúčtovaní na účet sa nastaví tento stav a nie je možné na účte vytvárať podúčty |

## Properties

| Property              | Value                            |
| :-------------------- | :------------------------------- |
| sqlName               | bkp_book_accounts                |
| urlBase               | bookkeeping/main-book/book-accounts/ |
| lookupSqlValue        | {%TABLE%}.name                   |
| tableTitle            | Book Accounts                    |
| formTitleForInserting | New Account                      |
| formTitleForEditing   | Book Account                     |

## SQL Structure

| Column                       | Description                           | Type    | Length | NULL     | Default |
| :--------------------------- | :------------------------------------ | :-----: | :----: | :------: | :-----: |
| id                           | Unique record ID                      | INT     | 8      | NOT NULL | 0       |
| name                         | Názov účtu                            | VARCHAR | 100    | NOT NULL | ""      |
| description                  | Popis účtu                            | TEXT    |        | NULL     | ""      |
| account                      | Číslo účtu                            | VARCHAR | 3      | NOT NULL | ""      |
| state                        | Stav účtu                             | ENUM    | 1      | NOT NULL | 1       |
| side                         | Strana, na ktorú sa účtuje            | ENUM    | 1      | NOT NULL | 1       |
| opening_balance              | Počiatočný stav na účte               | DECIMAL | 15,2   | NOT NULL | 0       |
| current_balance              | Aktuálny zostatok na účte             | DECIMAL | 15,2   | NOT NULL | 0       |
| id_parent                    | Nadriadený účet v stromovej štruktúre | INT     | 8      | NULL     |         |
| id_bkp_book_account_type     | Typ účtu                              | INT     | 8      | NOT NULL | 0       |
| id_bkp_book_account_category | Druh účtu                             | INT     | 8      | NOT NULL | 0       |
| id_bkp_accounting_period     | ID účtovného obdobia                  | INT     | 8      | NOT NULL | 0       |

## Columns

* name:
  * type: varchar
  * title: Name
  * byte_size: 100
  * required: true
  * showColumn: true
* description:
  * type: text
  * title: Description
  * showColumn: false
* account:
  * type: varchar
  * title: Account
  * byte_size: 3
  * required: true
  * showColumn: true
* state:
  * type: int
  * title: Account State
  * enum_values:
    * “1”: Accounting default #BKP_BOOK_ACCCOUNT_STATE_DEFAULT
    * “2”: Accounting enabled #BKP_BOOK_ACCCOUNT_STATE_SUMMARY
    * “3”: Accounting disabled #BKP_BOOK_ACCCOUNT_STATE_ACCOUNTABLE
  * required: true
  * showColumn: true
  * default_value: 1
* side:
  * type: int
  * title: Account Side
  * enum_values:
    * “1”: Both #BKP_BOOK_ACCOUNT_SIDE_BOTH
    * “2”: Get #BKP_BOOK_ACCOUNT_SIDE_GET
    * “3”: Put #BKP_BOOK_ACCOUNT_SIDE_PUT
  * required: true
  * showColumn: true
* opening_balance:
  * type: float
  * title: Opening Balance
  * byte_size: 15
  * decimals: 2
  * showColumn: true
* current_balance:
  * type: float
  * title: Current Balance
  * byte_size: 15
  * decimals: 2
  * showColumn: true
* id_parent:
  * type: lookup
  * title: Parent Account
  * model: App/Widgets/Bookkeeping/MainBook/Models/BookAccount
  * required: false
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* id_bkp_book_account_type:
  * type: lookup
  * title: Book Account Type
  * model: App/Widgets/Bookkeeping/MainBook/Models/BookAccountType
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* id_bkp_book_account_category:
  * type: lookup
  * title: Book Account Category
  * model: App/Widgets/Bookkeeping/MainBook/Models/BookAccountCategory
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: RESTRICT
* id_bkp_accounting_period:
  * type: lookup
  * title: Accounting Period
  * model: App/Widgets/Bookkeeping/MainBook/Models/AccountingPeriod
  * required: true
  * showColumn: true
  * foreignKeyOnUpdate: CASCADE
  * foreignKeyOnDelete: CASCADE

## Foreign Keys

| Column                       | Parent table                | Relation | OnUpdate | OnDelete |
| :--------------------------- | :-------------------------- | :------: | :------: | :------: |
| id_parent                    | bkp_book_accounts           | 1:N      | Cascade  | Restrict |
| id_bkp_accounting_period     | bkp_accounting_periods      | 1:N      | Cascade  | Cascade  |
| id_bkp_book_account_type     | bkp_book_account_types      | 1:N      | Cascade  | Restrict |
| id_bkp_book_account_category | bkp_book_account_categories | 1:N      | Cascade  | Restrict |

## Indexes

| Name                     | Type    | Column + Order                                           |
| :----------------------- | :-----: | :------------------------------------------------------: |
| id                       | PRIMARY | id ASC                                                   |
| name                     | INDEX   | name ASC                                                 |
| period_id_parent_account | UNIQUE  | id_bkp_accounting_period ASC, id_parent ASC, account ASC |
| period                   | INDEX   | id_bkp_accounting_period ASC                             |
| type                     | INDEX   | type ASC                                                 |
| category                 | INDEX   | category ASC                                             |

## Callbacks

### onBeforeInsert

Skontrolovať, či parent účet je v stave BKP_BOOK_ACCCOUNT_STATE_DEFAULT alebo BKP_BOOK_ACCCOUNT_STATE_SUMMARY. Ak nie, nepovoliť založenie účtu.

### onAfterInsert

Nastaviť pre parent účte stav BKP_BOOK_ACCCOUNT_STATE_SUMMARY.

### onBeforeUpdate

Not used.

### onAfterUpdate

Not used.

### onBeforeDelete

Ak existujú záznamy na tento účet v tabuľke bkp_transaction_entires, nie je možné účet vymazať.

### onAfterDelete

Ak neexistujú iné podúčty pre parent účet, nastaviť pre parent účet stav BKP_BOOK_ACCCOUNT_STATE_DEFAULT.

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
