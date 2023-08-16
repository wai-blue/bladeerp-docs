# CashdeskReceipt

TODO: V yml prerobit z CashdeskDocumentEntry.

## Introduction

Položky pohybu na pokladni.

## Constants

V modeli nie sú použité konštanty.

## Properties

| Property              | Value                          |
| :-------------------- | :----------------------------- |
| sqlName               | fin_cashdesk_receipt_items     |
| urlBase               | finance/cashdesk/receipt/items |
| lookupSqlValue        | -                              |
| tableTitle            | Cashdesk Receipt Items         |
| formTitleForInserting | New Cashdesk Receipt Item      |
| formTitleForEditing   | Cashdesk Receipt Item          |
| formAddButtonText     | Add Receipt Item               |
| formSaveButtonText    | Update Receipt Item            |

## SQL Structure

| Názov                    | Title             | Popis                     | Typ     | Dĺžka | Povinný |
| :----------------------- | :---------------- | :------------------------ | :------ | :---- | :------ |
| id                       | ID                | Jedinečné ID záznamu      | INT     | 11    | Y       |
| id_fin_cashdesk_document | Cashdesk Document | ID pokladničného dokladu  | INT     | 11    | Y       |
| id_fin_book_account      | Book Account      | ID účtu z účtovnej osnovy | INT     | 11    | Y       |
| amount                   | Amount            | Suma položky transakcie   | DECIMAL | 15,2  | N       |


## Foreign Keys

| Stĺpec                   | Parent tabuľka         | Väzba | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :---- | :------- | :------- |
| id_fin_cashdesk_document | fin_cashdesk_documents | 1:N   | Cascade  | Restrict |
| id_fin_book_account      | fin_book_accounts      | 1:N   | Cascade  | Restrict |

## Indexes

| Názov | Typ     | Stĺpec | Zoradenie |
| :---- | :------ | :----- | :-------- |
| id    | PRIMARY | id     | ASC       |

## Columns


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
