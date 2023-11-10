# Model Common/AddressBook/Contact

## Introduction
Model slúži na evidenciu a správu kontaktov. Ak sa jedná o fyzickú osobu, potom `is_company=FALSE` a ak o právnickú osobu (spoločnosť), potom `is_company=TRUE`. Fyzická osoba (col: **id_com_person**) slúži na evidenciu fyzickej osoby (`is_company=FALSE`) alebo primárnej kontaktnej osoby (napr. konateľ, obchodník a pod.) v prípade spoločnosti (`is_company=TRUE`). Primárna adresa kontaktu (cod: id_com_address) slúži ako fakturačná adresa a všetky prepojené adresy (tab:com_addresses, col: id_com_contact) môžu slúžiť ako doručovacie (aj vrátane fakturačnej). Všetky fyzické osoby (tab: **com_persons**) a adresy (tab: **com_addresses**), tie sú s kontaktom prepojené cez referenciu (viď. modely **Person** a **Address**).

## Constants
No constants are defined for this model.

## Properties
| Property               | Value                                                                             |
| :--------------------- | :-------------------------------------------------------------------------------- |
| isJunctionTable        | FALSE                                                                             |
| storeRecordInfo        | TRUE                                                                              |
| sqlName                | com_contacts                                                                      |
| urlBase                | common/address-book/contacts                                                      |
| lookupSqlValue         | concat(company_name, ', ', company_business_number), id_com_person.lookupSqlValue |
| tableTitle             | Contacts                                                                          |
| formTitleForInserting  | New Contact                                                                       |
| formTitleForEditing    | Contact                                                                           |
| crud/browse/controller | Common/AddressBook/Contacts                                                       |
| crud/add/controller    | Common/AddressBook/Contact/AddAddAsCompany                                        |
| crud/edit/controller   | Common/AddressBook/Contact/Edit                                                   |

TODO: JG k lookupSqlValue - podobne ako v modeli Address, aj tu je potrebné vyriešiť použitie "externej" LOOKUP hodnoty z foreign table v ADIOSe

## Data Structure
| Column                  | Title                   | ADIOS Type | Length | Required | Notes                                 |
| :---------------------- | :---------------------- | :--------: | :----: | :------: | :------------------------------------ |
| id                      |                         |    int     |   8    |   TRUE   |                                       |
| record_info             | Record Info             |    json    |        |   TRUE   |                                       |
| is_active               | Is Active               |  boolean   |   1    |   TRUE   | Aktívny kontakt?                      |
| is_company              | Is the contact company? |  boolean   |   1    |  FALSE   | Ide o spoločnosť alebo fyzickú osobu? |
| company_name            | Company Name            |  varchar   |  150   |  FALSE   | Názov spoločnosti                     |
| company_business_number | Business Number         |  varchar   |   50   |  FALSE   | IČO                                   |
| company_tax_number      | Tax Number              |  varchar   |   50   |  FALSE   | DIČ                                   |
| company_vat_number      | VAT Bumber              |  varchar   |   50   |  FALSE   | DIČ DPH                               |
| id_com_person           | Primary Contact Person  |   lookup   |   8    |  FALSE   | ID fyzickej osoby                     |
| id_com_address          | Primary Address         |   lookup   |   8    |  FALSE   | ID primárnej adresy                   |
| id_bkp_currency         | Primary Currency        |   lookup   |   8    |  FALSE   | ID používanej meny                    |
| language_code           | Primary Language        |  varchar   |   10   |  FALSE   | Preferovaný jazyk                     |
| website                 | WEB page                |  varchar   |  255   |  FALSE   | WEB stránka                           |
| notes                   | Notes                   |    text    |        |  FALSE   | Poznámka ku kontaktu                  |

### ADIOS Parameters
| Column     | Parameter   | Value                               |
| :--------- | :---------- | ----------------------------------- |
| is_active  | description | Is this contact active or not?      |
|            | default     | 1                                   |
| is_company | description | Is this contact for company or not? |
| website    | description | URL address of contact              |
|            | default     | https://                            |

### Foreign Keys
| Column          | Model                                                                                                        | Relation | OnUpdate | OnDelete |
| :-------------- | :----------------------------------------------------------------------------------------------------------- | :------: | -------- | -------- |
| id_com_person   | [App/Widgets/Common/AddressBook/Models/Person](./Person.md)                                                  |   1:1    | Cascade  | Restrict |
| id_com_address  | [App/Widgets/Common/AddressBook/Models/Address](./Address.md)                                                |   1:1    | Cascade  | Restrict |
| id_bkp_currency | [App/Widgets/Bookkeeping/ExchangeRate/Models/Currency](../../../Bookkeeping/ExchangeRate/Models/Currency.md) |   1:1    | Cascade  | Restrict |

### Indexes
| Name                    |  Type   |              Column + Order |
| :---------------------- | :-----: | --------------------------: |
| id                      | PRIMARY |                      id ASC |
| is_active               |  INDEX  |              is_active DESC |
| is_company              |  INDEX  |             is_company DESC |
| company_name            | UNIQUE  |            company_name ASC |
| company_business_number | UNIQUE  | company_business_number ASC |
| company_tax_number      | UNIQUE  |      company_tax_number ASC |
| company_vat_number      | UNIQUE  |      company_vat_number ASC |
| id_com_person           |  INDEX  |           id_com_person ASC |
| id_com_address          |  INDEX  |          id_com_address ASC |
| id_bkp_currency         |  INDEX  |         id_bkp_currency ASC |


## Callbacks

### onBeforeInsert
Ak je kontakt spoločnosťou (`is_company=TRUE`), musí mať vyplnené údaje o spoločnosti (cols: `company_*`)

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
