# Action Common/AddressBook/Contact/AsingToCategories

## Description

Assign existing contact to one or multiple existing categories.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/ContactCategory
* displayMode: window
* template:
  * id_com_contact
  * ADIOS/Core/View/Input/Tags:
      * title: Available Categories
      * description: In what categories the contact is?
      * inputParams:
        * model: App/Widgets/Common/AddressBook/Models/Category

## Parameters Post-processing

  1. Only active contacts are available in `id_com_contact`. If the parameter `idContact != NULL` then the field is disabled and value is preselected (`id_com_contact = idContact`).
  2. Only active categories are available inAvailable Categories