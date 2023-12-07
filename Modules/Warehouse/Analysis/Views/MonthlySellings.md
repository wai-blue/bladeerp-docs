# View Warehouse/Analysis/MonthlySellings

## Description

Shows monthly selling summary for 12 months.

## Input Parameters

| Parameter     | PHP Data type | Default value | Description              |
| ------------- | ------------- | ------------- | ------------------------ |
| title         | string        | ""            |                          |
| sellings_data | array         | []            | Sellings data for graph  |
| data_labels   | array         | []            | Labels for data in graph |

## View (View / Description)

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
      * labels: $input['data_labels']
      * dataset: $input['sellings_data']

## View Parameters Post-processing

1. If the parameter `title` is not given (NULL or empty) then area A is hidden.


