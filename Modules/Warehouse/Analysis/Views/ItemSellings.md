# View Warehouse/Analysis/ItemSellings

## Description

Shows monthly selling summary for 12 months.

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
    * view: App\Widgets\Warehouse\Analysis\Views\MonthlySellings
    * params:
      * yearBackFromDate: Controller->yearBackFromDate
      * dataset: Controller->dataset
  * C:
    * view: App\Widgets\Warehouse\Analysis\Views\BestSellerItems
    * params:
      * title: 'Best Seller Items'
      * year_back_from_date: Controller->yearBackFromDate
      * limit: Controller->limit
      * dataset: Controller->dataset
