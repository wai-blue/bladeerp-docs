# View Warehouse/Analysis/ItemSellings

## Description

Shows monthly selling summary for 12 months.

## Input Parameters

| Parameter        | PHP Data type | Default value | Description           |
| ---------------- | ------------- | ------------- | --------------------- |
| monthlySellings  | array         |               | Monthly sellings data |
| bestSellerItems  | array         |               | Best seller data      |

## Parent View

Grid

## Parent View Parameters

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
    * view: [App\Widgets\Warehouse\Analysis\Views\MonthlySellings](../Views/MonthlySellings.md)
    * params:
      * dataset: $input['monthlySellings']
  * C:
    * view: [App\Widgets\Warehouse\Analysis\Views\BestSellerItems](../Views/BestSellerItems.md)
    * params:
      * title: 'Best Seller Items'
      * dataset: $input['bestSellerItems']
