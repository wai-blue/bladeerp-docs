# Controller Warehouse/Analysis/ItemSellings

## Description

Shows monthly selling summary for 12 months.

## View

Grid

## Default View Parameters

* layout:
  ```
    A A A
    B B C    
  ```
* areas:
  * A:
    * view: ADIOS\Core\Views\Title
    * params:
      * title: 'Year Warehouse Sellings'
  * B:
    * view: App\Widgets\Warehouse\Analysis\Views\MonthlySellings
    * params:
      * year_back_from_date: [see Parameter Year Back From Date](#parameter-year-back-from-date)
      * dataset:  [see Dataset Monthly Sellings](#dataset-monthly-sellings)
  * C:
    * view: App\Widgets\Warehouse\Analysis\Views\BestSellerItems
    * params:  
      * title: 'Best Seller Items'    
      * year_back_from_date: [see Parameter Year Back From Date](#parameter-year-back-from-date)
      * limit: [see Parameter Limit](#parameter-limit)
      * dataset:  [see Dataset Best Seller Items](#dataset-best-seller-items)

## Parameters Post-processing

### Comment Sold Item
The item is considered as sold when it is a part of payed claim (see [Stockrooms/Models/ClaimItem](./../../Stockrooms/Models/ClaimItem.md)).

### Parameter Year Back From Date
If the parameter (`year_back_from_date`) is entered and valid (`year_back_from_date =< TODAY`) then prepare dataset for 12 months back from given date (i.e. between `year_back_from_date - 12 months` and `year_back_from_date`). Otherwise set the parameter to current date (`year_back_from_date = TODAY`).

### Parameter Limit
The parameter defines how many top items are evaluated and shown. Default value is 5.

### Dataset Monthly Sellings
* `data` - evaluate sell price summary (see `sell_price` from [Stockrooms/Models/ItemPackagePrice](./../../Stockrooms/Models/ItemPackagePrice.md)) of all [sold](#comment-sold-item) warehouse items month by month in given 12 months period.
* `labels` - evaluated months in 3-letter form (e.g. 'Jan', 'Feb', 'Mar',... 'Dec').


### Dataset Best Seller Items
* `virt_sell_price_sum` - evaluate sell price summary (see `sell_price` from [Stockrooms/Models/ItemPackagePrice](./../../Stockrooms/Models/ItemPackagePrice.md)) of every [sold](#comment-sold-item) warehouse item (item by item) in given 12 months period.
* `virt_item_name` - use `name` from [Stockrooms/Models/Item](./../../Stockrooms/Models/Item.md)
* Order dataset by `virt_sell_price_sum` from the biggest summary to lower ones (`DESC`).
