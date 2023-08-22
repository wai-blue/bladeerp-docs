# Functional Specification

(Pozn.: Zákazník má možnosť tieto stavy zmeniť alebo vymazať a vytvoriť si vlastné.)

TODO: Bod 2.5: ,,A sú nejaké pripojená,, Prosím skontrolovať štylistickú stránku textu funkčného popisu pre prípadné chyby.

* Rozpracovaná [DRAFT]
	* predvolený stav
	* zmeny aj mazanie sú povolené (col: is_allowed_update=1 a col:is_allowed_delete=1)
	* pohľadávke sa tu ešte nepriradzuje sekvenčný kód (col: is_sequence_code_assigned=0)
	* môže sa použiť v prípade vystavenia predfaktúry
* Potvrdená [CONFIRMED]
	* zmeny aj mazanie už NIE sú povolené (col: is_allowed_update a col:is_allowed_delete)
	* pohľadávke sa tu ešte nepriradzuje sekvenčný kód (col: is_sequence_code_assigned=1)
	* vytvorí sa email pre zákazníka
	* do emailu pripojiť pohľadávku ak je nastavené (col: is_send_claim)
	* do emailu pripojiť objednávky ak je nastavené (col: is_send_order) a sú nejaké pripojená  (tab: fin_claim_orders)
	* odoslať email zákazníkovi
	* ak je pripojený fyzický produkt  (tab: fin_claim_item_products), potom iniciovať odoslanie tovaru zákazníkovi (napr. notifikácia skladu na zabalenie a odoslanie tovaru)
* Tovar odoslaný zákazníkovi [GOODS_SENT]
	* voliteľný stav
	* odpočítať tovar zo skladu ak je nastavené (col: is_remove_stock) a je nejaký produkt pripojený  (tab: fin_claim_item_products)
* V reklamácii [IN_COMPLAINING]
	* email zákazníkovi
* Vybavená [CLOSED] - štandardne uzatvorená požiadavka
* Zrušená [CANCELLED] - neštandardne, resp. predčasne uzatvorená požiadavka
