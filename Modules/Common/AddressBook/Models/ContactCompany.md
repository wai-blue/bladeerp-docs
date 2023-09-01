# Model Common/AddressBook/ContactCompany

REVIEW DD: Po telefonate 31.8. tento model straca vyznam. Company udaje su ulozene priamo v Contact.

## Introduction
Model slúži na evidenciu firemných údajov pre kotakty z adresára.

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                                                         |
| :-------------------- | :------------------------------------------------------------ |
| isCrossTable          | FALSE                                                         |
| sqlName               | com_contact_companies                                         |
| urlBase               | common/address-book/contact-companies                         |
| lookupSqlValue        | concat(company_name, ', ', business_number, ', ', tax_number) |
| tableTitle            | Contact Companies                                             |
| formTitleForInserting | New Contact Company                                           |
| formTitleForEditing   | Contact Company                                               |

## Data Structure
| Column          | Title           | ADIOS Type | Length | Required | Notes                |
| :-------------- | :-------------- | :--------: | :----: | :------: | :------------------- |
| id              |                 |    int     |   8    |   TRUE   | ID záznamu           |
| record_info     | Record Info     |    json    |        |   TRUE   |                      |
| company_name    | Company Name    |  varchar   |  150   |   TRUE   | Názov spoločnosti    |
| business_number | Business Number |  varchar   |   50   |  FALSE   | IČO                  |
| tax_number      | Tax Number      |  varchar   |   50   |  FALSE   | DIČ                  |
| vat_number      | VAT Bumber      |  varchar   |   50   |  FALSE   | DIČ DPH              |
| notes           | Notes           |    text    |        |  FALSE   | Poznámka spoločnosti |

### ADIOS Parameters
No additional ADIOS parameters needs to be defined.

## Foreign Keys
Model does not contain foreign keys.

## Indexes
| Name            |  Type   |      Column + Order |
| :-------------- | :-----: | ------------------: |
| id              | PRIMARY |              id ASC |
| company_name    | UNIQUE  |    company_name ASC |
| business_number | UNIQUE  | business_number ASC |
| tax_number      | UNIQUE  |      tax_number ASC |
| vat_number      | UNIQUE  |      vat_number ASC |

## Callbacks

### onBeforeInsert
Nepovoliť vloženie, ak hodnota **company_name** alebo **business_number** alebo **tax_number** už tabuľke existuje.
REVIEW DD: Na toto su UNIQUE indexy.

### onAfterInsert
Not used.

### onBeforeUpdate
Nepovoliť úpravu, ak hodnota **company_name** alebo **business_number** alebo **tax_number** už tabuľke existuje.
REVIEW DD: Na toto su UNIQUE indexy.

### onAfterUpdate
Not used.

### onBeforeDelete
Nepovoliť vymazanie, ak je firma použitá na niektorom kontakte (tbl: com_contacts)
REVIEW DD: Nevyriesi toto vhodne nastaveny foreign key?

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
