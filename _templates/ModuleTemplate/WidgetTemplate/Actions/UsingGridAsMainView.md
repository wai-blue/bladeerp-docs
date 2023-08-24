# Action [Module]/[Widget]/UsingGridAsMainView

## Description

Sample definition of action using a Grid.

## View

Grid

## Default View Parameters v1

(vid ADIOS.repo/src/Core/View/Grid.php)

*Note: "view" is rendered immediately, "action" is rendered via AJAX request*

* layout:
  ```
    A A
    B C
    B C
  ```
* areas:
  * A:
    * view: Form
    * template:
      * id_bkp_accounting_period (readonly)
      * name (readonly)
      * closing_date (readonly)
  * B:
    * action: Widgets/Bookkeeping/MainBook/FinancialStatementsEntries
    * parameters:
      * idFinancialStatement = $data[‘id’]
  * C:
    * (view|action): App/Core/Views/MyCustomView
    * parameters:
      * ... any parameters that the custom view can accept



## Default View Parameters v2

(vid ADIOS.repo/src/Core/View/Grid.php)

*Note: "view" is rendered immediately, "action" is rendered via AJAX request*
| Parameter | Values            |
| --------- | ----------------- |
| layout    | A A<br>B C<br>B C |

### Area A
| Parameter | Values                                                                            |
| --------- | --------------------------------------------------------------------------------- |
| view      | Form                                                                              |
| template  | id_bkp_accounting_period (readonly)<br>name (readonly)<br>closing_date (readonly) |

### Area B
| Parameter  | Values                                                  |
| ---------- | ------------------------------------------------------- |
| action     | Widgets/Bookkeeping/MainBook/FinancialStatementsEntries |
| parameters | idFinancialStatement = $data[‘id’]                      |

### Area C
| Parameter       | Values                                         |
| --------------- | ---------------------------------------------- |
| (view\| action) | App/Core/Views/MyCustomView                    |
| parameters      | any parameters that the custom view can accept |

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

  1. Post-processing functionality #1
  2. Post-processing functionality #2
  3. Post-processing functionality #3