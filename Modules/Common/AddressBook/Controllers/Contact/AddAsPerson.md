# Controller Common/AddressBook/Contact/AddAsPerson

## Description

Create new contact - natural person.

## View

[App/Widgets/Common/AddressBook/Views/Contact/AddAsPerson](./../../Views/Contact/AddAsPerson.md)

## View Parameters

### currencies
* model: [App/Widgets/Common/AddressBook/Models/Category](./../../Models/Category.md)

## Parameters Post-processing

### Create Contact
* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)

### Create Person
* model:[App/Widgets/Common/AddressBook/Models/Person](./../../Models/Person.md)

### Create Address
* model: [App/Widgets/Common/AddressBook/Models/Address](./../../Models/Address.md)

### Update Contact
* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)
* Use ID of newly created [person](#new_person) as primary contact person (`id_com_person`).
* Use ID of newly created [address](#new_address) as primary address (`id_com_address`).  
