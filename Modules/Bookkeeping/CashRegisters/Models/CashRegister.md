# Model Bookkeeping/Banks/BashRegister

## Introduction

List of cash registers used in the company.

## Constants

No constants are defined for this model.

## Properties

| Property              | Value                                            |
| :-------------------- | :----------------------------------------------- |
| storeRecordInfo       | TRUE                                             |
| sqlName               | bkp_banks                                        |
| urlBase               | bookkeeping/cash-registers                       |
| lookupSqlValue        | {%TABLE%}.name                                   |
| tableTitle            | Banks                                            |
| formTitleForInserting | New Bank                                         |
| formTitleForEditing   | Bank                                             |
| formAddButtonText     | Add                                              |
| formSaveButtonText    | Update                                           |
| crud/browse/action    | Bookkeeping/CashRegisters/CashRegisters          |
| crud/add/action       | Bookkeeping/CashRegisters/CashRegister/AddOrEdit |
| crud/edit/action      | Bookkeeping/CashRegisters/CashRegister/AddOrEdit |

## Data Structure

| Column      | Title       | ADIOS Type | Length | Required | Notes                |
| :---------- | ----------- | :--------: | :----: | :------: | :------------------- |
| id          | ID          |    int     |   11   |   TRUE   | Unique record ID     |
| record_info | Record Info |    json    |        |   TRUE   |                      |
| name        | Name        |  varchar   |  100   |   TRUE   | Názov bankového účtu |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

Model does not contain foreign keys.

### Indexes

| Name                |  Type   |          Column + Order |
| :------------------ | :-----: | ----------------------: |
| id                  | PRIMARY |                  id ASC |

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
Účet na ktorý obsahuje záznamy v tabuľke bkp_cash_registers_transactions nie je možné vymazať.

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
