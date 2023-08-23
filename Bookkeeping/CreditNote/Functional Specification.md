# Functional Specification

Vzor, aké informácie bude detailná karta obsahovať:
1. Základné údaje
2. Základné údaje o zákazníkovi
3. Položky dobropisu vrátane evidenčného čísla dobropisu
4. Evidenčné číslo daňového dokladu na ktorý sa viaže dobropis

Prednastavené stavy dobropisu:
(Pozn.: Zákazník má možnosť tieto stavy zmeniť alebo vymazať a vytvoriť si vlastné.)

1. Rozpracovaná [DRAFT]
    * predvolený stav
    * zmeny aj mazanie sú povolené (col: **is_allowed_update=1** a **col:is_allowed_delete=1**)
    * dobropisu sa tu ešte nepriradzuje sekvenčný kód (col: is_sequence_code_assigned=0)
    * môže sa použiť v prípade vystavenia predfaktúry
2. Potvrdená [CONFIRMED]
    * zmeny aj mazanie už NIE sú povolené (col: **is_allowed_update** a **col:is_allowed_delete**)
    * dobropisu sa tu ešte nepriradzuje sekvenčný kód (col: **is_sequence_code_assigned=1**)
    * vytvorí sa email pre zákazníka
    * do emailu pripojiť dobropis ak je nastavené (col: **is_send_credit_note**)
    * do emailu pripojiť pôvodné pohľadávky ak je nastavené (col: **is_send_claim**) a sú nejaké pripojená  (tab: **bkp_credit_note_claims**)
    * odoslať email zákazníkovi
3. Tovar vrátený neporušený od zákazníka [STOCKS_REVERTED]
    * voliteľný stav
    * ak dobropis obsahuje nejaký produkt (tab: bkp_credit_note_line_products) a je nastavené vrátenie skladových zásob do pôvodného stavu (col: is_revert_stock), potom je potrebné pripočítať späť skladové množstvá všetkých produktov
4. Vybavená [CLOSED] - štandardne uzatvoren
5. Zrušená [CANCELLED] - neštandardne, resp. predčasne uzatvorená požiadavka
