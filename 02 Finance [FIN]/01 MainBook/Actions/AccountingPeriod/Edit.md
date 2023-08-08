# Finance/MainBook/AccountingPeriods/Edit

## Description

Detail nového účtovného obdobia.

## Main View

UI/Grid

## Layout

```
A
B
C
```

## Area A

### Main View

UI/InlineForm

### Columns

Názov stĺpca	Typ inputu	Poznámka
name	TEXT	
start_date	DATE	Dátum musí byť väčší ako dátum posledného účtovného obdobia
end_date	DATE	Dátum musí byť väčší, nanajvýš rovný ako start_date
id_fin_accounting_period	LOOKUP	
id_fin_currency	LOOKUP	
is_open	BOOL	

## Area B

| Parameter | Value |
| - | - |
| Action | Widgets/Finance/MainBook/BookAccount |
| id_fin_accounting_period | $data[‘id’] |

## Area C

| Parameter | Value |
| - | - |
| Action | Widgets/Finance/MainBook/Vat |
| id_fin_accounting_period | $data[‘id’] |

Ak je účtovné obdobie otvorené, bude sa zobrazovať button na **uzatvorenie účtovného obdobia**. Uzavreté účtovné obdobie sa už nesmie meniť. Účtovné obdobie sa nesmie dátumami prekrývať s iným účtovným obdobím. Ak má účtované doklady v tabuľke **fin_transactions**, je potrebné skontrolovať v akom rozsahu sú zaúčtované a neumožniť nastavenie **start_date** a **end_date** mimo tohoto rozsahu.

Ak je účtovné obdobie uzavreté, bude sa zobrazovať button na **otvorenie účtovného obdobia**.
