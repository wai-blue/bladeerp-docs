# Action [Module]/[Widget]/UsingCustomViewAsMainView

## Description

Some custom action rendering some custom view.

## View

App/Core/Views/MyCustomView

## Default View Parameters

* cssClass: inline
* displayMode: (inline|window|desktop)
* ... any parameter accepted by the custom view

## Parameters Post-processing

[No post-processing of default parameters is necessary.]

[When one sentence description is sufficient, then use numbered list (see below).]
1. Post-processing functionality 
2. Post-processing functionality (When one sentence description is sufficient.)
3. Post-processing functionality (When one sentence description is sufficient.)

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