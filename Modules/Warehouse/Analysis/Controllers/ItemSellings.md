# Controller Warehouse/Analysis/ItemSellings

## Description

Prepares data form monthly selling (sales?) summary for 12 months.

## View

App/Widgets/Warehouse/Analysis/ItemSellings

## Output Parameters

### commentSoldItem
The item is considered as sold when it is a part of payed claim (see [Stockrooms/Models/ClaimItem](./../../Stockrooms/Models/ClaimItem.md)).

### yearBackFromDate
If the parameter (`year_back_from_date`) is entered and valid (`year_back_from_date =< TODAY`) then prepare dataset for 12 months back from given date (i.e. between `year_back_from_date - 12 months` and `year_back_from_date`). Otherwise set the parameter to current date (`year_back_from_date = TODAY`).

### limit
The parameter defines how many top items are evaluated and shown. Default value is 5.

### monthlySellings
* `data` - evaluate sell price summary (see `sell_price` from [Stockrooms/Models/ItemPackagePrice](./../../Stockrooms/Models/ItemPackagePrice.md)) of all [sold](#comment-sold-item) warehouse items month by month in given 12 months period.
* `labels` - evaluated months in 3-letter form (e.g. 'Jan', 'Feb', 'Mar',... 'Dec').

### bestSellerItems
* `virt_sell_price_sum` - evaluate sell price summary (see `sell_price` from [Stockrooms/Models/ItemPackagePrice](./../../Stockrooms/Models/ItemPackagePrice.md)) of every [sold](#comment-sold-item) warehouse item (item by item) in given 12 months period.
* `virt_item_name` - use `name` from [Stockrooms/Models/Item](./../../Stockrooms/Models/Item.md)
* Order dataset by `virt_sell_price_sum` from the biggest summary to lower ones (`DESC`).
