* Model CashdeskDocument:
  * Tymto su podla dokumentacie myslene pohyby. Malo by sa to volat CashdeskTransactions (zamenit Document za Transaction vsade)
* Model BankDocument + BankDocumentLine(?):
  * rovnako, ako CashDeskDocument
  * resp. asi by bolo presnejsie volat to BankAccountTransaction
* Modul Financie nie je vlastne Uctovnictvo? Nemali by sme ho premenovat na BookKeeping?
* https://www.deskera.com/bookkeeping-software
* MainBook/TransactionItem - ako sa bude rozlisovat, ci ide o kredit alebo debet? Iba podla toho, ci je amount < 0?
* Hypoteticka uvaha: Ak by sme chceli spravit import pohybov na bankovo ucte, islo by to do BankAccountTransaction modelu?


* Moduly BookKeeping a Accounting:
  * Bookkeeping typically consists of: payroll, invoicing, receipts and bills, recording business transactions
  * Accounting typically consists of: financial statements and reports, budgets, tax returns, analyzing business performance
* Kto je vlastne account manazer:
  * https://www.topzine.cz/co-znamena-account-manager-vime-co-tato-profese-obnasi
  * https://cs.wikipedia.org/wiki/Account_manager



* Nebolo by lepsie App/Widgets/Bookkeeping/ExchangeRate/Models/Currency prehodit niekam do Common?