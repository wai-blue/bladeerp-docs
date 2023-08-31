# Functional Specification

(Pozn.: Zákazník má možnosť tieto stavy zmeniť alebo vymazať a vytvoriť si vlastné.)

* Rozpracovaná [DRAFT]
	* predvolený stav
	* zmeny aj mazanie sú povolené (col: **is_allowed_update**=1 a col:**is_allowed_delete**=1)
	* pohľadávke sa tu ešte nepriradzuje sekvenčný kód (col: **is_set_sequence_code**=0)
	* môže sa použiť v prípade vystavenia predfaktúry
* Potvrdená [CONFIRMED]
	* zmeny aj mazanie už NIE sú povolené (col: **is_allowed_update** a col:**is_allowed_delete**)
	* pohľadávke sa tu ešte nepriradzuje sekvenčný kód (col: **is_set_sequence_code**=1)
	* vytvorí sa email pre zákazníka
	* do emailu pripojiť pohľadávku ak je nastavené (col: **is_send_claim**)
	* do emailu pripojiť objednávky ak je nastavené (col: **is_send_order**) a sú nejaké pripojené  (tab: **bkp_claim_orders**)
	* odoslať email zákazníkovi
	* ak je pripojený fyzický produkt  (tab: **bkp_claim_item_products**), potom iniciovať odoslanie tovaru zákazníkovi (napr. notifikácia skladu na zabalenie a odoslanie tovaru)
* Tovar odoslaný zákazníkovi [GOODS_SENT]
	* voliteľný stav
	* odpočítať tovar zo skladu ak je nastavené (col: **is_remove_stock**) a je nejaký produkt pripojený  (tab: **bkp_claim_item_products**)
* V reklamácii [IN_COMPLAINING]
	* email zákazníkovi
* Vybavená [CLOSED] - štandardne uzatvorená požiadavka
* Zrušená [CANCELLED] - neštandardne, resp. predčasne uzatvorená požiadavka
