# Controller [Module]/[Widget]/UsingGridAsMainView

## Description

Sample definition of action using a Grid.

## View

Grid

## Default View Parameters

(see ADIOS.repo/src/Core/View/Grid.php)

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
    * action: Widgets/Bookkeeping/Books/FinancialStatementsEntries
    * params:
      * idFinancialStatement = $params[‘id’]
  * C:
    * (view|action): App/Core/Views/MyCustomView
    * params:
      * ... any parameters that the custom view can accept

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

[When one sentence description is sufficient, then use numbered list (see below).]
1. Post-processing functionality 1. 
2. Post-processing functionality 2.
3. Post-processing functionality 3.

[Or use sub-chapters in case of more complicated or multi-sentence descriptions.]
### Comment [Subject (e.g. Sold Item)]
[Comment to the subject (e.g. The item is considered as sold when it is a part of payed claim (see [Stockrooms/Models/ClaimItem](./../../Stockrooms/Models/ClaimItem.md)).)]

### Parameter [Name of parameter (e.g. Limit)]
[Description of the parameter (e.g. The parameter defines how many top items are evaluated and shown. Default value is 5.)]

### Dataset [Name of dataset (e.g. Monthly Sellings)]
[Description of the dataset with all included partial data to have posibility reference them (e.g. from views)]
Example:
* `data` - evaluate sell price summary (see `sell_price` from [Stockrooms/Models/ItemPackagePrice](./../../Stockrooms/Models/ItemPackagePrice.md)) of all [sold](#comment-sold-item) warehouse items month by month in given 12 months period.
* `labels` - evaluated months in 3-letter form (e.g. 'Jan', 'Feb', 'Mar',... 'Dec').

