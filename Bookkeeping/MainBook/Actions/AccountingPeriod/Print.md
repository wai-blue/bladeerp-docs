# Bookkeeping/MainBook/AccountingPeriods/Print

Tlač účtovnej osnovy účtovného obdobia. Výstupný formát bude HTML. V hlavičke tlače bude názov, dátumy začiatku a konca účtovného obdobia. Telo tlačovej zostavy budú tvoriť záznamy z tabuľky **bkp_book_account** patriace danej závierke.

| Názov stĺpca                     | Formát zobrazenia | Zoradenie | Filter |
| :------------------------------- | :---------------: | :-------: | ------ |
| name                             | TEXT              |           |        |
| account                          | NUMBER            | ASC       |        |
| opening_balance                  | DECIMAL           |           |        |
| current_balance                  | DECIMAL           |           |        |
| bkp_book_account_types.name      | LOOKUP            |           |        |
| bkp_book_account_categories.name | LOOKUP            |           |        |
