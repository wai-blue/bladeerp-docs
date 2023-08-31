# Model Common/AddressBook/ContactCompany

## Introduction
Model slúži na evidenciu firemných údajov pre kotakty z adresára.

## Constants
V modeli nie sú použité konštanty.

## Properties
| Property              | Value                                             |
| :-------------------- | :------------------------------------------------ |
| isCrossTable          | FALSE                                             |
| sqlName               | com_contact_companies                             |
| urlBase               | common/address-book/contact-companies             |
| lookupSqlValue        | concat(company_name, business_number, tax_number) |
| tableTitle            | Contact Companies                                 |
| formTitleForInserting | New Contact Company                               |
| formTitleForEditing   | Contact Company                                   |

## Data Structure
| Column          | Title            | ADIOS Type | Length | Required | Notes                                    |
| :-------------- | :--------------- | :--------: | :----: | :------: | :--------------------------------------- |
| id              |                  |    int     |   8    |   TRUE   | ID záznamu                               |
| id_created_by   | Created By       |   lookup   |   8    |   TRUE   | Reference to user who created the record |
| create_datetime | Created Datetime |  datetime  |   8    |   TRUE   | When the record was created              |
| id_updated_by   | Updated By       |   lookup   |   8    |   TRUE   | Reference to user who updated the record |
| update_datetime | Updated Datetime |  datetime  |   8    |   TRUE   | When the record was updated              |
| company_name    | Company Name     |  varchar   |  150   |   TRUE   | Názov spoločnosti                        |
| business_number | Business Number  |  varchar   |   50   |  FALSE   | IČO                                      |
| tax_number      | Tax Number       |  varchar   |   50   |  FALSE   | DIČ                                      |
| vat_number      | VAT Bumber       |  varchar   |   50   |  FALSE   | DIČ DPH                                  |
| description     | Description      |    text    |        |  FALSE   | Poznámka spoločnosti                     |

REVIEW DD: Description alebo poznamka? Pls zjednotit, alebo vytvorit dva samostatne stlpce.

### ADIOS Parameters
No additional ADIOS parameters needs to be defined.

## Foreign Keys
| Column        | Model           | Relation | OnUpdate | OnDelete |
| :------------ | :-------------- | :------: | -------- | -------- |
| id_created_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |
| id_updated_by | ADIOS/Core/User |   1:N    | Cascade  | Cascade  |

## Indexes
| Name            |  Type   |      Column + Order |
| :-------------- | :-----: | ------------------: |
| id              | PRIMARY |              id ASC |
| company_name    | UNIQUE  |    company_name ASC |
| business_number | UNIQUE  | business_number ASC |
| tax_number      | UNIQUE  |      tax_number ASC |

REVIEW DD: `vat_number` nemusi byt unique?

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
