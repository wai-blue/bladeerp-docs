# Action Common/AddressBook/Categories

## Description

Zoznam všetkých kategórií, do ktorých je možné priradzovať kontakty

## View

Table

## Default View Parameters

* model: App/Widgets/Common/AddressBook/Models/Category
* showColumns:
  * name
  * notes
  * is_active
* orderBy: 
  * notes ASC
* rowButtons:
  * deactivate
  * activate

### rowButtons.deactivate
* Shown only on active row (`is_active=TRUE`).
* Row item is deactivated `is_active=FALSE` onChange.

### rowButtons.activate
* Shown only on inactive row (`is_active=FALSE`).
* Row item is re-activated `is_active=TRUE` onChange.

