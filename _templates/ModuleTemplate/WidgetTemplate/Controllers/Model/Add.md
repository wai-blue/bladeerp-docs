# Controller [Module]/[Widget]/Contollers/[Model]/Add

## Description

Create new [model].

## View

[App/Widgets/Common/AddressBook/Views/Contact/AddAsPerson](../../Views/Contact/AddAsPerson.md)

## View Parameters

### [categories]
[All existing [categories](../../Models/Category.md)]

### [currencies]
[List of all existing [currencies](../../../../Bookkeeping/ExchangeRate/Models/Currency.md)]

## View Data Post-processing
1. Validate all entered inputs.
2. Show all validation errors if any.
3. If case of no validation error then do following:

### Transactions
[Create [new_person](#new_person), [new_address](#new_address) and [new_contact](#new_contact) in one transaction.]

### [new_person]
[Newly created [person](../../Models/Person.md).]

### [new_contact_categories]
[Newly assigned [categories to the contact](../../Models/ContactCategory.md).]

