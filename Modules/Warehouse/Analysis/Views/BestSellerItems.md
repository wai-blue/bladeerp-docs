# View Warehouse/Analysis/BestSellerItems

## Description

Show top sellers from warehouse items.

## Input Parameters

| Parameter           | PHP Data type | Default value | Description          |
| ------------------- | ------------- | ------------- | -------------------- |
| title               | string        | ""            |                      |
| virt_sell_price_sum | array         | []            | Summ of sold prices  |
| virt_item_name      | array         | []            | Names of sumed items |

## Parent View

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

## View Parameters Post-processing

No post-processing of view parameters is necessary.
