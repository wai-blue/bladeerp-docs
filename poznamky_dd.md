* Model CashdeskDocument:
  * Tymto su podla dokumentacie myslene pohyby. Malo by sa to volat CashdeskTransactions (zamenit Document za Transaction vsade)
* Model CashdeskDocumentLine:
  * Tymto su podla dokumentacie myslene pohyby. Malo by sa to volat CashdeskTransactions (zamenit Document za Transaction vsade)
  * Nema byt namiesto "lines" pouzite "items"?
* Model BankDocument + BankDocumentLine(?):
  * rovnako, ako CashDeskDocument
  * resp. asi by bolo presnejsie volat to BankAccountTransaction
* Modul Financie nie je vlastne Uctovnictvo? Nemali by sme ho premenovat na BookKeeping?
* https://www.deskera.com/bookkeeping-software
* MainBook/TransactionEntry - ako sa bude rozlisovat, ci ide o kredit alebo debet? Iba podla toho, ci je amount < 0?
* Hypoteticka uvaha: Ak by sme chceli spravit import pohybov na bankovo ucte, islo by to do BankAccountTransaction modelu?


* what is the difference between accounting and bookkeeping?
  * Bookkeeping focuses on recording and organizing financial data. Accounting is the interpretation and presentation of that data to business owners and investors.
  * https://www.xero.com/us/glossary/accounting-bookkeeping/#:~:text=Bookkeeping%20focuses%20on%20recording%20and,to%20business%20owners%20and%20investors.
  * Na zaklade tohoto by sme sa mali zamysliet nad rozclenenim Finance modulu na BookKeeping a Accounting:
    * Bookkeeping typically consists of: payroll, invoicing, receipts and bills, recording business transactions
    * Accounting typically consists of: financial statements and reports, budgets, tax returns, analyzing business performance
  * Resp. mi to vychadza tak, ze aktualne Finance je BookKeeping. A Accounting je samostatny modul s prepojenim na projekty, ulohy atd...
  * BookKeeping - modul pre uctovnika
  * Accounting - modul pre account manazera, t.j. cloveka, ktory ma na starosti, aby firma mala zisk / aby projekty neboli stratove
    * Kto je vlastne account manazer:
      * https://www.topzine.cz/co-znamena-account-manager-vime-co-tato-profese-obnasi
      * https://cs.wikipedia.org/wiki/Account_manager

