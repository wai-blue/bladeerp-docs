# Action Common/AddressBook/Contact/AsingContactToCategory

## Description

Assign existing contact to existing category.

## View

Form

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/ContactHasCategory
* displayMode: window
* template:
  * id_com_contact
  * id_com_contact_category

## Parameters Post-processing

  1. Only active contacts are available in `id_com_contact`
  2. Only active categories are available in `id_com_contact_category`