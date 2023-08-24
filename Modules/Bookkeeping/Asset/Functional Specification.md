# Functional Specification

Odpisovanie majetku je možné dvomi spôsobmi: rovnomerne a zrýchlene.

## Daňové odpisy

Podľa zákona o dani z príjmov

## Rovnomerné odpisovanie

### Odpisové skupiny

| Odpisová skupina | Doba odpisovania |
| ---------------- | ---------------- |
| 0.               | 2 roky           |
| 1.               | 4 roky           |
| 2.               | 6 rokov          |
| 3.               | 8 rokov          |
| 4.               | 12 rokov         |
| 5.               | 20 rokov         |
| 6.               | 40 rokov         |

### Vzorec pre výpočet

Ročný odpis = vstupná cena / doba odpisovania

Ročný odpis v prvom roku odpisovania = (vstupná cena / doba odpisovania) / 12 * počet mesiacov od zaradenia do užívania

### Príklad odpisovania

TODO: Poznámka: Miesto ,,Majme:,, by som použil: ,,Ku mesiacu Marec máme nasledovné:,, V Google Docs to je vynechané úple, a v aktuálnej verzii mi to neznie byť v dokumentácii v poriadku

Majme:
  * Vstupná cena majetku: 5000,00 EUR
  * Odpisová skupina: 2 (6 roky)
  * Rok a mesiac obstarania: Marec 2023

|  Rok | Zostatková cena | Ročný odpis | Oprávky celkom |
| ---: | --------------: | ----------: | -------------: |
| 2023 |        4 305.56 |      694.44 |         694.44 |
| 2024 |        3 472.23 |      833.33 |       1 527.77 |
| 2025 |         2 638.9 |      833.33 |        2 361.1 |
| 2026 |        1 805.57 |      833.33 |       3 194.43 |
| 2027 |          972.24 |      833.33 |       4 027.76 |
| 2028 |          138.91 |      833.33 |       4 861.09 |
| 2029 |               0 |      138.91 |          5 000 |

Odpisy sa zaokrúhľujú na 2 desatinné miesta matematicky.

## Zrýchlené odpisovanie

### Odpisové skupiny

| Odpisová skupina | V prvom roku | V ďalších rokoch | Pre zvýšenú zostatkovú cenu | Doba odpisovania |
| :--------------- | :----------- | :--------------- | :-------------------------- | :--------------- |
| 2                | 6            | 7                | 6                           | 6 rokov          |
| 3                | 8            | 9                | 8                           | 8 rokov          |

### Vzorce pre výpočet

Odpis v 1. roku odpisovania:

Vstupná cena / koeficient odpisovania v prvom roku odpisovania / počet mesiacov ktoré sa odpisuje

Odpis v ďalších rokoch odpisovania:

Zostatková cena =  vstupná mínus odpisovaná časť v prvom roku v plnej výške (za 12 mesiacov)

(2 x Zostatková cena) / (koeficient odpisovania v ďalších rokoch mínus počet rokov, čo sa odpisuje)

### Príklad odpisovania

Majme:
  * Vstupná cena majetku: 5000,00 EUR
  * Odpisová skupina: 2 (6 roky)
  * Rok a mesiac obstarania: Marec 2023

|  Rok | Zostatková cena | Ročný odpis | Oprávky celkom |
| ---: | --------------: | ----------: | -------------: |
| 2023 |        4 166.67 |      694.44 |         833.33 |
| 2024 |        2 777.78 |    1 388.89 |       2 083.33 |
| 2025 |        1 666.67 |    1 111.11 |       3 194.44 |
| 2026 |          833.34 |      833.33 |       4 027.77 |
| 2027 |          277.78 |      555.56 |       4 583.33 |
| 2028 |               0 |      277.78 |       4 861.11 |
| 2029 |               0 |      138.89 |          5 000 |

## Účtovné odpisy

Podľa zákona o účtovníctve

TODO: Urobiť kontrolu zátvoriek prosím

Účtovná jednotka si určuje výšku odpisov dlhodobého majetku v odpisovom pláne ak je stanovený), na základe očakávaného použitia majetku a intenzity využitia a tiež na základe očakávaného fyzického opotrebenia majetku, ktorý zodpovedá bežným podmienkam využitia. O účtovných odpisoch je účtovná jednotka povinná účtovať mesačne. Začiatok odpisovania, počet desatinných miest a spôsob zaokrúhľovania sa určí účtovná jednotka sama v internom predpise (ak existuje).

Teda účtovná jednotka bude na účty odpisov účtovať mesačne podľa ich interných pravidiel. Ak takúto smernicu nebudú mať budú na daný účet účtovať jednu dvanástinu ročného odpisu. Z našej strany by teda nemal byť potrebný žiaden zásah.

## Vyraďovanie majetku

Pred vyradením dlhodobého hmotného majetku je nutné presvedčiť sa, či je úplne odpísaný, alebo má ešte nejakú zostatkovú cenu.

  * Ak bol úplne odpísaný, t. j. jeho vstupná cena bola cez odpisy premietnutá v daňových výdavkoch, pri vyradení tohto majetku sa už žiadne daňové výdavky neúčtujú.
  * Ak nebol úplne odpísaný, t. j. jeho vstupná cena bola cez odpisy premietnutá v daňových výdavkoch len čiastočne a majetok má určitú zostatkovú cenu, možno ju za istých podmienok považovať za:
    * daňový výdavok
    * je uznaným daňovým výdavkom len do výšky príjmu z jeho predaja
    * nie je uznaným daňovým výdavkom.
