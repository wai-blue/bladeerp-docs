# Transaction

## Introduction

Tabuľka bude obsahovať jednotlivé doklady podvojného účtovníctva. Každý doklad bude obsahovať základné údaje a rozpis na jednotlivé účty.

## Constants

| Constant | Value | Description |
| -------- | ----- | ----------- |
|          |       |             |

## Properties

| Property              | Value                          |
| :-------------------- | :----------------------------- |
| sqlName               | bkp_transactions               |
| urlBase               | bookkeeping/main-book/transactions |
| lookupSqlValue        | -                              |
| tableTitle            | Transactions                   |
| formTitleForInserting | New Transaction                |
| formTitleForEditing   | Transaction                    |

## SQL Structure

| Column                   | Description                                   | Type    | Length | NULL     | Default |
| :----------------------- | :-------------------------------------------- | :-----: | :----: | :------: | :-----: |
| id                       | Unique record ID                              | INT     | 8      | NOT NULL | 0       |
| date_transaction         | Dátum transakcie                              | DATE    | 8      | NOT NULL |         |
| description              | Popis transakcie                              | TEXT    |        | NULL     | ""      |
| amount                   | Celková suma transakcie v hlavnej mene        | DECIMAL | 15,2   | NOT NULL | 0       |
| number                   | Poradové číslo v rámci účtovného obdobia      | INT     | 11     | NOT NULL | 1       |
| is_accounted             | Je doklad zaúčtovaný                          | BOOL    | 1      | NULL     | 0       |
| amount_currency          | Celková suma transakcie v inej mene           | DECIMAL | 15,2   | NOT NULL | 0       |
| exchange_rate            | Kurz meny voči hlavnej mene účtovného obdobia | DECIMAL | 15,4   | NOT NULL | 0       |
| id_bkp_currency          | ID meny                                       | INT     | 8      | NOT NULL | 0       |
| id_bkp_accounting_period | ID účtovného obdobia                          | INT     | 8      | NOT NULL | 0       |

## Columns

* date_transaction:
  * type: date
  * title: Date
  * required: true
  * showColumn: true
* description:
  * type: text
  * title: Description
  * showColumn: true
* amount:
  * type: float
  * title: Total Amount
  * byte_size: 15
  * decimals: 2
  * showColumn: true
* number:
  * type: int
  * title: Serial Number
  * byte_size: 11
  * showColumn: true
  * required: true
* is_accounted:
  * type: boolean
  * title: Is Accounted
  * byte_size: 1
  * showColumn: true
* amount_currency:
  * type: float
  * title: Amount Currency
  * byte_size: 15
  * decimals: 2
  * required: true
* exchange_rate:
  * type: float
  * title: Exchange Rate
  * byte_size: 15
  * decimals: 4
  * required: true
* id_bkp_currency:
  * type: lookup
  * title: Currency
  * model: App/Widgets/Bookkeeping/ExchangeRate/Models/Currency
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
  * foreignKeyOnDelete: RESTRICT

## Foreign Keys

| Column                   | Parent table           | Relation | OnUpdate | OnDelete |
| :----------------------- | :--------------------- | :------: | :------: | :------: |
| id_bkp_accounting_period | bkp_accounting_periods | 1:N      | Cascade  | Restrict |
| id_bkp_currency          | bkp_currencies         | 1:N      | Cascade  | Restrict |

## Indexes

| Name                            | Type    | Column + Order                           |
| :------------------------------ | :-----: | :--------------------------------------- |
| id                              | PRIMARY | id ASC                                   |
| date_transaction                | INDEX   | date_transaction ASC                     |
| id_bkp_accounting_period_number | UNIQUE  | id_bkp_accounting_period ASC, number ASC |

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
