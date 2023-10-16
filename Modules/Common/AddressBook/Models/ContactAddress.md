# Model Common/AddressBook/ContactAddress

## Introduction
Model serves as M:N junction from Contacts to Addresses.

## Constants
No constants are defined for this model.

## Properties
| Property        | Value                                                                   |
| :-------------- | :---------------------------------------------------------------------- |
| isJunctionTable | TRUE                                                                    |
| storeRecordInfo | FALSE                                                                   |
| sqlName         | com_contact_address                                                    |
| junctions       | `json`                                                                  |
|                 | `{`                                                                     |
|                 | `  "ContactAddress": {`                                                |
|                 | `    "junctionModel": "App/Common/AddressBook/Models/ContactAddress",` |
|                 | `    "optionsModel": "App/Common/AddressBook/Models/Address",`         |
|                 | `    "masterKeyColumn": "id_com_contact",`                              |
|                 | `    "optionKeyColumn": "id_com_address",`                             |
|                 | `  }`                                                                   |
|                 | `}`                                                                     |


## Data Structure

| Column         | Title   | ADIOS Type | Length | Required | Notes            |
| :------------- | :------ | :--------: | :----: | :------: | :--------------- |
| id             |         |    int     |   8    |   TRUE   | Unique record ID |
| id_com_contact | Contact |   lookup   |   8    |   TRUE   | ID kontaktu      |
| id_com_address | Address |   lookup   |   8    |   TRUE   | ID adresy     |

### ADIOS Parameters

No additional ADIOS parameters needs to be defined

### Foreign Keys

| Column         | Model                                                         | Relation | OnUpdate | OnDelete |
| :------------- | :------------------------------------------------------------ | :------: | -------- | -------- |
| id_com_contact | [App/Widgets/Common/AddressBook/Models/Contact](./Contact.md) |   1:N    | Cascade  | Cascade  |
| id_com_address | [App/Widgets/Common/AddressBook/Models/Address](./Address.md) |   1:N    | Cascade  | Restrict |

### Indexes

| Name                            |  Type   |     Column + Order |
| :------------------------------ | :-----: | -----------------: |
| id                              | PRIMARY |             id ASC |
| id_com_contact                  |  INDEX  | id_com_contact ASC |
| id_com_address                  |  INDEX  | id_com_address ASC |
| id_com_contact___id_com_address | UNIQUE  | id_com_contact ASC |
|                                 |         | id_com_address ASC |

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
