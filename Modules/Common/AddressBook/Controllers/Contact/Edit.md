# Controller Common/AddressBook/Contact/Edit

## Description

Detail kontaktu.

## View

[App/Widgets/Common/AddressBook/Views/Contact/Edit](./../../Views/Contact/Edit.md)

## Output Parameters

### contact
* model: [App/Widgets/Common/AddressBook/Models/Contact](./../../Models/Contact.md)

### contact_categories
* model: [App/Widgets/Common/AddressBook/Models/ContactCategory](./../../Models/ContactCategory.md)
* filter: contact['id]

### persons
* model:[App/Widgets/Common/AddressBook/Models/Person](./../../Models/Person.md)
* filter: contact['id]

### addresses
* model: [App/Widgets/Common/AddressBook/Models/Address](./../../Models/Address.md)
* filter: contact['id]

## Parameters Post-processing
No post-processing of default parameters is necessary.