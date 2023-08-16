# [ModelName]

## Introduction

Zostatky na účtoch pri účtovnej závierke. 

Pre tabuľku neexistuje CRUD, napĺňa sa automaticky pri vytvorení účtovnej závierky. Záznamy je možné iba zobraziť a nie je ich možné meniť.

## Constants

| Constant | Value | Description |
| - | - | - |

## Properties

TODO: Je tableTitle spravne?

| Property | Value |
| - | - |
| sqlName | fin_financial_statement_entries |
| urlBase | finance/financial-statement-entries |
| lookupSqlValue |  |
| tableTitle | Account Balances |
| formTitleForInserting |  |
| formTitleForEditing |  |

## SQL Structure

| Column | Description | Type | Length | NULL | Default |
| - | - | - | - | - | - |
| id | Unique record ID | INT | 8 | NOT NULL | 0 |
| balance | Balance | Zostatok na účte pri závierke | DECIMAL | 15,2 | N |
| id_fin_book_account | Book Account | ID účtu z účtovnej osnovy | INT | 11 | Y |
| id_fin_financial_statement | Financial Statement | ID závierky | INT | 11 | Y |

## Columns

## Foreign Keys

| Column | Parent table | Relation | OnUpdate | OnDelete |
| - | - | - | - | - |
| id_fin_book_account | fin_book_accounts | 1:N | Cascade | Restrict |
| id_fin_financial_statement | fin_financial_statements | 1:N | Cascade | Restrict |

## Indexes

| Name | Type | Column + Order |
| - | - | - |
| id | PRIMARY | id ASC |

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
