# Controller Bookkeeping/Assets/Asset/Print

REVIEW DD: Definicia vzhladu tlacovych reportov je este pole neorane. Kazdy report moze vyzerat uplne inac, co nie je pripad formularov v appke, pretoze tie vykazuju vela prvkov "standardizacie". Takze tento zapis zatial neriesim / nekontrolujem.

## Description

Tlač karty majetku. Výstup bude vo formáte HTML. Obsah bude identický s detailom majetku.

## View

Bookkeeping/Assets/Views/Asset/Print

### Example

| ROK | Účtovný odpis  | Účtovný odpis | Daňový odpis   | Daňový odpis | Rozdiel | Zostatková účtovná cena | Zostatková daňová cena | Zaúčtované dňa |
| --- | -------------- | ------------- | -------------- | ------------ | ------- | ----------------------- | ---------------------- | -------------- |
|     | Koeficient v % | Suma v mene   | Koeficient v % | Suma v mene  |         |                         |                        |                |

## Default View Parameters

| Parameter | Values     |
| --------- | ---------- |
| id        | ID majetku |

## Parameters Post-processing

No post-processing of default parameters is necessary.