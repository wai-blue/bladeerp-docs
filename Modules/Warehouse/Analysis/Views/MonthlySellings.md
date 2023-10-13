# View Warehouse/Analysis/MonthlySellings

## Description

Shows monthly selling summary for 12 months.

## View

Grid

## Default View Parameters

* layout:
  ```
    A A A
    B B B    
  ```
* areas:
  * A: 
    * view: ADIOS\Core\Views\Title
    * params:
      * title: $input['title']
  * B:
    * view: ADIOS\Core\Views\Chart
    * params:
      * type: 'line'
      * dataset: $input['dataset']

## Parameters Post-processing
1. If the parameter `title` is not given (NULL or empty) then area A is hidden.


