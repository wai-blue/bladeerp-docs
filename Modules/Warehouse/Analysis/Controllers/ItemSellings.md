# Controller Warehouse/Analysis/ItemSellings

## Description

Prepares data form monthly selling summary for 12 months.

## Input Parameters

### year-back-from-date
If the parameter (`year-back-from-date`) is entered and valid (`year-back-from-date =< TODAY`) then prepare dataset for 12 months back from given date (i.e. between `year-back-from-date - 12 months` and `year-back-from-date`). Otherwise set the parameter to current date (`year-back-from-date = TODAY`).

### limit
The parameter defines how many best seller items are evaluated and shown. Default value is 5.

## View

[App/Widgets/Warehouse/Analysis/ItemSellings](../Views/ItemSellings.md)

## View Parameters

### Comment Sold Warehouse Item
The item is considered as sold when it is a part of payed claim (see [App/Widgets/Warehouse/Stockrooms/Models/ClaimItem](../../Stockrooms/Models/ClaimItem.md)).

### monthlySellings
* `sellings_data` - evaluate sell price summary (see col `sell_price` from [App/Widgets/Warehouse/Stockrooms/Models/ItemPackagePrice](../../Stockrooms/Models/ItemPackagePrice.md)) of all [sold warehouse items](#comment-sold-warehouse-item) month by month in given 12 months period (see input [year-back-from-date](#year-back-from-date)).
* `data_labels` - evaluated months in 3-letter form (e.g. 'Jan', 'Feb', 'Mar',... 'Dec').

### bestSellerItems
* `virt_sell_price_sum` - evaluate sell price summary (see col `sell_price` from [App/Widgets/Warehouse/Stockrooms/Models/ItemPackagePrice](../../Stockrooms/Models/ItemPackagePrice.md)) of every [sold warehouse items](#comment-sold-warehouse-item) (item by item) in given 12 months period (see input [year-back-from-date](#year-back-from-date)) and limited count of the warehouse items (see input [limit](#limit)).
* `virt_item_name` - use `name` from [Stockrooms/Models/Item](../../Stockrooms/Models/Item.md)
* Order dataset by `virt_sell_price_sum` from the biggest summary to lower ones (`DESC`).
