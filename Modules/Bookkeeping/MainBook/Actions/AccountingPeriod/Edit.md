# Action Bookkeeping/MainBook/AccountingPeriods/Edit

## Description

Detail nového účtovného obdobia.

## View

Grid

## Default View Parameters

### Layout

```
A
B
C
```

### Area A

#### View

UI/InlineForm

REVIEW DD: view "UI/InlineForm" neexistuje. Asi je myslene view "Form" a "cssClass" inline.

#### Columns

| Názov stĺpca             | Typ inputu | Poznámka                                                    |
| :----------------------- | :--------: | :---------------------------------------------------------- |
| name                     | TEXT       |                                                             |
| start_date               | DATE       | Dátum musí byť väčší ako dátum posledného účtovného obdobia |
| end_date                 | DATE       | Dátum musí byť väčší, nanajvýš rovný ako start_date         |
| id_bkp_accounting_period | LOOKUP     |                                                             |
| id_bkp_currency          | LOOKUP     |                                                             |
| is_open                  | BOOL       |                                                             |

### Area B

| Parameter                | Value                                |
| :----------------------- | :----------------------------------- |
| Action                   | Widgets/Bookkeeping/MainBook/BookAccount |
| id_bkp_accounting_period | $params[‘id’]                          |

### Area C

| Parameter                | Value                        |
| :----------------------- | :--------------------------- |
| Action                   | Widgets/Bookkeeping/MainBook/Vat |
| id_bkp_accounting_period | $params[‘id’]                  |

Ak je účtovné obdobie otvorené, bude sa zobrazovať button na **uzatvorenie účtovného obdobia**. Uzavreté účtovné obdobie sa už nesmie meniť. Účtovné obdobie sa nesmie dátumami prekrývať s iným účtovným obdobím. Ak má účtované doklady v tabuľke **bkp_transactions**, je potrebné skontrolovať v akom rozsahu sú zaúčtované a neumožniť nastavenie **start_date** a **end_date** mimo tohoto rozsahu.

Ak je účtovné obdobie uzavreté, bude sa zobrazovať button na **otvorenie účtovného obdobia**.

## Parameters Post-processing

No post-processing of default parameters is necessary.