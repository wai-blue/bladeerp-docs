# AutoGenerate

Automatické generovanie záväzkov na základe existujúcich.

* **Url**: finance/liability/auto-generate/
* **Frekvencia**: 1x denne
* **Kroky**:
    1. Vyhľadať zoznam všetkých záväzkov, ktoré majú nastavené automatické generovanie (col: **auto_generate_days** > 0) a zároveň v daný deň uplynul daný počet dní (col: **auto_generate_days**) od dátumu splatnosti (col: **maturity_date**).
    2. Pre každý záväzok v zozname vykonať nasledovné:
        * Ak už záväzok dosiahol svoj ukončovací dátum (col: **auto_generate_stop_date**), nastaviť v ňom hodnotu počtu dní na nulu (col: **auto_generate_days** = 0), čo zabezpečí zastavenie budúceho auto-generovania. Následne prejsť na ďalší záväzok v zozname.
        * Záväzok, ktorý ešte nedosiahol svoj ukončovací dátum alebo ho nemá nastavený, budeme považovať za tzv. **originál** a vytvoríme jeho kópiu nasledovne:
            * s kópiou hodnôt pre ID veriteľa (col: **id_com_address**), ID číselného radu (col: **id_com_numeric_sequence**), všetkých troch identifikátorov (cols: **variable_symbol**, **specific_symbol**, **constant_symbol**), počtu dní pre auto-generovanie (col: **auto_generate_days**), ukončovacieho dátumu pre auto-generovanie (col: **auto_generate_stop_date**), info o mene (cols: **id_fin_currency**, **exchange_rate**), celkovej hodnoty (col: **price_total**) a poznámky k záväzku (col: **comment**)
            * s novým sekvenčným označením (col: **sequence_code**)
            * s aktuálnym hodnotami pre dátum vzniku (col: **issued_date**), pre predajcu i veriteľa (cols: **supplier**, **creditor**)
            * s adekvátne posunutým dátumom splatnosti (col: maturity_date) ako mal originál.
            * vytvoriť kópie zo všetkých riadkov záväzku (tab: fin_liability_lines)
            * vytvoriť identický zoznam plánovaných platieb (tab: fin_liability_payments) s ekvivalentne posunutými dátumami splatnosti (col: **maturity_date**) a prázdnymi dátumami vykonaných platieb (col: **executed_date**).
            * vytvoriť identické prepojenie na účtovnú osnovu (tab: **fin_liability_accounts**)
        * Po úspešnom vytvorení kópie, je (v rámci rovnakej transakcie) nutné v každom **originále** nastaviť hodnotu počtu dní na nulu (col: **auto_generate_days** = 0), čo zabezpečí, že ďalšie auto-generovanie sa už bude robiť iba z aktuálnej kópie.