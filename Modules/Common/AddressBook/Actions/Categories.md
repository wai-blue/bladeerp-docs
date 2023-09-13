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
* Zobrazí sa iba na aktívnom riadku (`is_active=TRUE`)
* Po stlačení tlačidla sa nastaví `is_active` daného riadka na FALSE.

### rowButtons.activate
* Zobrazí sa iba na neaktívnom riadku (`is_active=FALSE`)
* Po stlačení tlačidla sa nastaví `is_active` daného riadka na TRUE.
