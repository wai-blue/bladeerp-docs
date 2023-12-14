# Controller Warehouse/Stockrooms/Item/AddOrEdit

## Description

Add new warehouse item or edit existing one.

## View

[App/Widgets/Warehouse/Stockrooms/Views/Item/AddOrEdit](../../Views/Item/AddOrEdit.md)

## View Parameters

### warehouseItem
Existing warehouse item but only in case of edit. Otherwise empty.

### medias
All existing [media](../../Models/ItemMedia.md) related to the item (col `id_whs_item`).

### packages
All existing [packages](../../Models/ItemPackage.md) related to the item (col `id_whs_item`).

## View Parameters Post-processing

No post-processing of view parameters is necessary.