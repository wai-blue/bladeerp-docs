# Controller [Module]/[Widget]/UsingTableAsMainView

## Description

Sample definition of action using a Table.

## View

Table

## Default View Parameters

(see ADIOS.repo/src/Core/View/Table.php)

* model: App/Widgets/Bookkeeping/Books/Models/AccountingPeriod
* showColumns:
  * name
  * start_date
  * end_date
  * id_bkp_accounting_period
  * virt_some_subselect:
    * type: virtual
    * sql: select from ...
* orderBy: name ASC
* rowButtons:
  * Button1
  * Button2
  * Button3
  * ...

### rowButtons.Button1

Popis funkcie Button1

### rowButtons.Button2

Popis funkcie Button2

### rowButtons.Button3

Popis funkcie Button3

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