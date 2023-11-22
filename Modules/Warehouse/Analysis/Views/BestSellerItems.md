# View Warehouse/Analysis/BestSellerItems

## Description

Show top sellers from warehouse items.

## View

Table

## Default View Parameters

* params:
  * title: $input['title']
  * showTitle: FALSE when $input['title'] is empty. TRUE otherwise.
* showColumns:
  * virt_item_name:
    * type: virtual
    * data: $input['virt_item_name']
  * virt_sell_price_sum:
    * type: virtual
    * data: $input['virt_sell_price_sum']

## View Data Post-processing

No post-processing of view data is necessary.
