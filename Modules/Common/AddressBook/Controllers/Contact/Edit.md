# Controller Common/AddressBook/Contact/Edit

## Description

Detail of contact.

## View

[App/Widgets/Common/AddressBook/Views/Contact/Edit](../../Views/Contact/Edit.md)

## View Parameters

### categories
All existing [categories](../../Models/Category.md) which can be assigned to the contact.

### contact
Selected [contact](../../Models/Contact.md) to edit.

### contact_categories
All [contact categories](../../Models/ContactCategory.md) related to the contact (`contact['id]`).

### persons
All existing [natural persons](../../Models/Person.md) related to the contact (`contact['id]`).

### addresses
All existing [addresses](../../Models/Address.md) related to the contact (`contact['id]`).

## View Data Post-processing
No post-processing of view data is necessary.