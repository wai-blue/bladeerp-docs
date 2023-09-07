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
	* odoslať email zákazníkovi
* Tovar odoslaný zákazníkovi [GOODS_SENT]
	* voliteľný stav
* V reklamácii [IN_COMPLAINING]
	* email zákazníkovi
* Vybavená [CLOSED] - štandardne uzatvorená požiadavka
* Zrušená [CANCELLED] - neštandardne, resp. predčasne uzatvorená požiadavka
