# View [Module]/[Widget]/Views/[Model]/[ViewName]

## Description

[Shows monthly selling summary for 12 months.]

## Input Parameters
[No input parameters]
| Parameter | PHP Data type | Default value | Description       |
| --------- | ------------- | ------------- | ----------------- |
| title     | array         | []            | Title of the view |
| dataset   | array         | []            | List of XYZ       |

## Parent View

[Use existing view component here - see ADIOS.repo/src/Core/View/]
[Grid]

## Parent View Parameters
[All input parameters and datasets used in the view must be prepared in Controller which is calling this View.]

* layout:
  ```
    A A A
    B B B    
  ```
* areas:
  * A: 
    * view: ADIOS\Core\Views\Title
    * params:
      * title: $input['title'] [Referenced para prepared by Controller]
  * B:
    * view: ADIOS\Core\Views\Chart
    * params:
      * type: 'line'
      * dataset: $input['dataset'] [Referenced data prepared by Controller]

## Parameters Post-processing
[Define specific behaviour here like conditional hiding/showng parts of view or filtering params and related behaviour.]
[1. If the parameter `title` is not given (NULL or empty) then area A is hidden.]


