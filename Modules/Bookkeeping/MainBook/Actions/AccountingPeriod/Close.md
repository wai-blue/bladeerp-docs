# Action Bookkeeping/MainBook/AccountingPeriods/Close

## Description

Akcia bude slúžiť na uzavretie otvoreného účtovného obdobia. Uzavrieť účtovné obdobie bude možné až vtedy, keď budú zaúčtované všetky účtovné doklady. Po uzatvorení bude príznak is_open nastavený na FALSE.

Ak pri uzatváraní účtovného obdobia nebude vytvorené nové účtovné obdobie, automaticky sa vytvorí podľa parametrov uzatváraného obdobia.

Pri uzatvorení účtovného obdobia sa musia preniesť  Aktuálne zostatky na účtoch v účtovnej zostave do počiatočných hodnôt novej účtovnej osnovy a prepočítať aktuálny zostatok. Toto sa deje väčšinou na konci roka, keď sa už účtujú doklady nového roka a ešte sa účtujú doklady predchádzajúceho roka.

## View

Unknown

## Default View Parameters

Not defined yet.

## Parameters Post-processing

No post-processing of default parameters is necessary.