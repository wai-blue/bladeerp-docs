# Controller Common/AddressBook/Contact/AddAsCompany

## Description

Create new contact - company. Natural person data are related to primary contact person from the company.

## View

[App/Widgets/Common/AddressBook/Views/Contact/AddAsCompany](../../Views/Contact/AddAsCompany.md)

## View Parameters

No view parameters are prepared.

## View Parameters Post-processing

* Use ID of newly created person as primary contact person (`id_com_person`).
* Use ID of newly created address as primary address (`id_com_address`).

