# Action Warehouse/Analysis/MonthlySellings

## Description

Shows monthly selling summary for all 12 months.

## View

Grid

## Default View Parameters

* layout:
  ```
    A A
    B B
    C C
  ```
* areas:
  * A:
    * view: ADIOS\Core\Views\Title
    * params:
      * title: 'Monthly Sellings'
  * B:
    * view: App\Widgets\Warehouse\Analysis\Views\MonthlySelling
    * params:
      * chartTitle: ''
      * idProduct: 1234
  <!-- * C:
    * action: Warehouse/Analysis/BestSellerItems
    * params:
      * year = date('Y') // to show data for current year
      * limit = 10  // to show Top 10 Items -->
