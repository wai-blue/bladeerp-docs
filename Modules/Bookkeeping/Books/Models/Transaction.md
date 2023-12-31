# Model Bookkeeping/Books/Transaction

## Introduction

Tabuľka bude obsahovať jednotlivé doklady podvojného účtovníctva. Každý doklad bude obsahovať základné údaje a rozpis na jednotlivé účty.

## Constants

No constants are defined for this model.

## Properties

| Property               | Value                              |
| :--------------------- | :--------------------------------- |
| storeRecordInfo        | TRUE                               |
| sqlName                | bkp_transactions                   |
| urlBase                | bookkeeping/books/transactions     |
| lookupSqlValue         | -                                  |
| tableTitle             | Transactions                       |
| formTitleForInserting  | New Transaction                    |
| formTitleForEditing    | Transaction                        |
| crud/browse/controller | Bookkeeping/Books/Transactions     |
| crud/add/controller    | Bookkeeping/Books/Transaction/Add  |
| crud/edit/controller   | Bookkeeping/Books/Transaction/Edit |

## Data Structure

| Column                   | Title             | ADIOS Type | Length | Required | Notes                                         |
| :----------------------- | ----------------- | :--------: | :----: | :------: | :-------------------------------------------- |
| id                       |                   |    int     |   8    |   TRUE   | Unique record ID                              |
| record_info              | Record Info       |    json    |        |   TRUE   | Info about INSERT and UPDATE time & author    |
| transaction_date         | Transaction Date  |    date    |   8    |   TRUE   | Dátum transakcie                              |
| description              | Description       |    text    |        |  FALSE   | Popis transakcie                              |
| amount                   | Amount            |  decimal   |  15,2  |   TRUE   | Celková suma transakcie v hlavnej mene        |
| number                   | Number            |    int     |   11   |   TRUE   | Poradové číslo v rámci účtovného obdobia      |
| is_accounted             | Is Accounted      |  boolean   |   1    |  FALSE   | Je doklad zaúčtovaný                          |
| amount_currency          | Amount Currency   |  decimal   |  15,2  |   TRUE   | Celková suma transakcie v inej mene           |
| exchange_rate            | Exchange Rate     |  decimal   |  15,4  |   TRUE   | Kurz meny voči hlavnej mene účtovného obdobia |
| id_bkp_currency          | Currency          |   lookup   |   8    |   TRUE   | ID meny                                       |
| id_bkp_accounting_period | Accounting Period |   lookup   |   8    |   TRUE   | ID účtovného obdobia                          |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined.

### Foreign Keys

| Column                   | Model                                                    | Relation | OnUpdate | OnDelete |
| :----------------------- | :------------------------------------------------------- | :------: | -------- | -------- |
| id_bkp_accounting_period | App/Widgets/Bookkeeping/Books/Models/AccountingPeriod |   1:N    | Cascade  | Cascade  |
| id_bkp_accounting_period | App/Widgets/Bookkeeping/Books/Models/AccountingPeriod |   1:N    | Cascade  | Cascade  |
| id_bkp_currency          | App/Widgets/Bookkeeping/ExchangeRate/Currency            |   1:N    | Cascade  | Restrict |

### Indexes

| Name                              |  Type   |               Column + Order |
| :-------------------------------- | :-----: | ---------------------------: |
| id                                | PRIMARY |                       id ASC |
| transaction_date                  |  INDEX  |         transaction_date ASC |
| number                            |  INDEX  |                   number ASC |
| is_accounted                      |  INDEX  |             is_accounted ASC |
| id_bkp_currency                   |  INDEX  |          id_bkp_currency ASC |
| id_bkp_accounting_period          |  INDEX  | id_bkp_accounting_period ASC |
| id_bkp_accounting___period_number | UNIQUE  | id_bkp_accounting_period ASC |
|                                   |         |                   number ASC |

## Callbacks

### onBeforeInsert

Ak pridávam položku v inej ako hlavne mene, je nutné skontrolovať, či existuje kurz pre danú menu k účtovnému dátumu. Ak neexistuje, opýtať sa, či sa použije predchádzajúci alebo ponúknuť nahodenie kurzu pre daný dátum. V prípade, že je mena rovnaká ako hlavná mena účtovného obdobia, bude stĺpex exchange_rate = 1 a stĺpec amount=amount_currency.

### onAfterInsert

Not used.

### onBeforeUpdate

Treba zapamätať stav stĺpca is_accounted. Zároveň treba skontrolovať, či súčet položiek na strane Má dať sa rovná súčtu položiek na strane Dal. Ak sa nerovná, nie je možné označiť doklad ako zaúčtovaný.

Dokument po uzávierke nie je možné meniť.

### onAfterUpdate

Ak prišlo k zmene stĺpca is_accounted, je potrebné zmeniť zostatok na účtoch účtovnej osnovy. Ak sa doklad otvoril, treba sumy na účtoch odrátať, ak zatvoril, tak prirátať.

### onBeforeDelete

Treba od účtov v účtovnej osnove odrátať sumy z položiek dokladu. Dokument po uzávierke nie je možné vymazať.

### onAfterDelete

Not used.

## Formatters

V tomto modeli nie sú použité formátery.

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
