# Functional Specification

Sumárny syntetický účet má analytický účet vždy “000”.

Možné hodnoty pre Typ účtu:

* Aktíva
* Pasíva
* Premenlivý zostatok
* Nákladový daňový
* Nákladový nedaňový
* Výnosový daňový
* Výnosový nedaňový
* Uzávierkový

Aktíva sú položky majetku, ktoré nám zarábajú ďalšie peniaze.  Prínosy aktív sa účtujú na stranu Má syntdať a úbytky na stranu DAL.

Pasíva sú položky za ktoré musíme vydávať peniaze, tiež je to peňažné vyjadrenie hodnoty majetku (zdroje financovania). Prínosy pasív sa účtujú na stranu DAL a úbytky na stranu Má dať

Účty s premenlivým zostatkom, môžu mať zostatok na strane MD alebo na strane Dal.

Na nákladových účtoch sa účtujú peňažné vyjadrenia spotreby majetkových zložiek, spotreby cudzích výkonov alebo nárast záväzkov. Vznik a zvýšenie nákladov sa zachytáva na príslušnom nákladovom účte na strane Má dať, zníženie na strane Dal, prípadne ako storno nákladu na strane Má dať.

Na výnosových účtoch sa účtuje predaj tovaru, výrobkov služieb a znamenajú nárast majetku podniku alebo pokles jeho záväzkov. Vznik a zvýšenie výnosov účtujeme na stranu Dal príslušného výnosového účtu, zníženie na stranu Má dať.

Konečný stav nákladových výnosových účtov sa na konci obdobia prenáša na účet  Účet ziskov a strát.

Možné hodnoty pre Druh účtu:

* Súvahový
* Výsledkový
* Nezadaný

Ak k syntetickému účtu existuje aspoň jeden analytický účet, nie je možné účtovať na syntetický účet a je potrebné účtovať iba na analytický účet.
