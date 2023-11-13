# Controller Common/AddressBook/Contact/Edit

## Description

Detail kontaktu.

## View

[App/Widgets/Common/AddressBook/Views/Contact/Edit](./../../Views/Contact/Edit.md)

## View Parameters

### categories
All existing [categories](./../../Models/Category.md) which can be assigned to the contact.

### contact
Selected [contact](./../../Models/Contact.md) to edit.

### contact_categories
All [contact categories](./../../Models/ContactCategory.md) related to the contact (`contact['id]`).

### persons
All existing [natural persons](./../../Models/Person.md) related to the contact (`contact['id]`).

### addresses
All existing [addresses](./../../Models/Address.md) related to the contact (`contact['id]`).

## View Data Post-processing
1. Validate all entered inputs.
2. Show all validation errors if any.
3. If case of no validation error then save the data.