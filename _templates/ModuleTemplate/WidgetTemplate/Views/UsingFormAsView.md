# View [Module]/[Widget]/Views/UsingFormAsMainView

## Description

[Edit main contact of company]

## Input Parameters

| Parameter | PHP Data type | Default value | Description     |
| --------- | ------------- | ------------- | --------------- |
| contact   | array         | []            | Contact to edit |

## Parent View

Form

## Parent View Parameters

(see ADIOS.repo/src/Core/View/Form.php)

* model: [App/Widgets/Common/AddressBook/Models/Contact](../../../../Modules/Common/AddressBook/Models/Contact.md)
* dataset: $input['contact']
* cssClass: inline
* displayMode: (inline|window|desktop)
* template:
  * full_name
  * closing_date
  * state
  * id_user
  * ADIOS/Core/Views/Inputs/Tags:
    * title: Categories of the contact
    * description: In what categories the contact is?
    * inputParams:
      * model: Widgets/Products/Models/ProductDomainAssignment
  * App/Core/Views/Inputs/MyCustomInput:
    * title: Some custom input
    * description: This input is not a part of ADIOS, it's in the Blade's Core
    * inputParams:
      * param1: value1
      * param2: value2
* columns:
  * state
    * readonly = TRUE
  * id_user
    * readonly = TRUE
* defaultValues:
  * id_user = Predvolený je aktuálny používateľ
  * transaction_date = Predvolený je posledný dátum z účtovného obdobia

## View Parameters Post-processing

[No post-processing of view parameters is necessary.]

[When one sentence description is sufficient, then use numbered list (see below).]
1. Post-processing functionality 1. 
2. Post-processing functionality 2.
3. Post-processing functionality 3.

[Or use sub-chapters in case of more complicated or multi-sentence descriptions.]
### Comment [Subject (e.g. Sold Item)]
[Comment to the subject (e.g. The item is considered as sold when it is a part of payed claim (see [Stockrooms/Models/ClaimItem](../../Stockrooms/Models/ClaimItem.md)).)]

### Parameter [Name of parameter (e.g. Limit)]
[Description of the parameter (e.g. The parameter defines how many top items are evaluated and shown. Default value is 5.)]

### Dataset [Name of dataset (e.g. Monthly Sellings)]
[Description of the dataset with all included partial data to have posibility reference them (e.g. from views)]
Example:
* `data` - evaluate sell price summary (see `sell_price` from [Stockrooms/Models/ItemPackagePrice](../../Stockrooms/Models/ItemPackagePrice.md)) of all [sold](#comment-sold-item) warehouse items month by month in given 12 months period.
* `labels` - evaluated months in 3-letter form (e.g. 'Jan', 'Feb', 'Mar',... 'Dec').