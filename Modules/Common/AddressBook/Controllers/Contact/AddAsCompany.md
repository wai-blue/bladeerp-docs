# Controller Common/AddressBook/Contact/AddAsCompany

## Description

Create new contact - company. Natural person data are related to primary contact person from the company.

## View

[App/Widgets/Common/AddressBook/Views/Contact/AddAsCompany](./../../Views/Contact/AddAsCompany.md)

## Output Parameters

### categories
* model: [App/Widgets/Common/AddressBook/Models/Category](./../../Models/Category.md)

### new_contact
* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)

### new_contact_categories
* model: [App/Widgets/Common/AddressBook/Models/ContactCategory](./../../Models/ContactCategory.md)

### new_person
* model:[App/Widgets/Common/AddressBook/Models/Person](./../../Models/Person.md)

### new_address
* model: [App/Widgets/Common/AddressBook/Models/Address](./../../Models/Address.md)

## Parameters Post-processing

### Transactions
Create new [person](#new_person), new [address](#new_address) and new contact [contact](#new_contact) in one transaction.

### new_person
* model:[App/Widgets/Common/AddressBook/Models/Person](./../../Models/Person.md)

### new_address
* model: [App/Widgets/Common/AddressBook/Models/Address](./../../Models/Address.md)

### new_contact
* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)
* Use ID of newly created [person](#new_person) as primary contact person (`id_com_person`).
* Use ID of newly created [address](#new_address) as primary address (`id_com_address`).
