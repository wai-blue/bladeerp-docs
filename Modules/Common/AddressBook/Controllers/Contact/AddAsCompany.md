# Controller Common/AddressBook/Contact/AddAsCompany

## Description

Create new contact - company. Natural person data are related to primary contact person from the company.

## View

[App/Widgets/Common/AddressBook/Views/Contact/AddAsCompany](./../../Views/Contact/AddAsCompany.md)

## View Parameters

### categories
All existing [categories](./../../Models/Category.md)

### currencies
All existing [currencies](./../../../../Bookkeeping/ExchangeRate/Models/Currency.md)

## View Data Post-processing
1. Validate all entered inputs.
2. Show all validation errors if any.
3. If case of no validation error then do following:

### Transactions
Create [new_person](#new_person), [new_address](#new_address) and [new_contact](#new_contact) in one transaction.

### new_person
* Newly created [person](./../../Models/Person.md).

### new_address
* Newly created [address](./../../Models/Address.md).

### new_contact
* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)
* Newly created [contact](./../../Models/Contact.md) to company.
* Use ID of newly created [person](#new_person) as primary contact person (`id_com_person`).
* Use ID of newly created [address](#new_address) as primary address (`id_com_address`).

### new_contact_categories
* Newly assigned [categories to the contact](./../../Models/ContactCategory.md).

