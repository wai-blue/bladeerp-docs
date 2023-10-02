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
    * action: ADIOS\Core\Views\Chart
    * params:
      * type: 'line'
      * data: 
        * labels: ['Jan', 'Feb',... 'Dec'] // short naming of all months should be listed here
        * datasets:
          [ {
            label: 'Monthly Summary For Warehouse Items',
            data:
               'SELECT SUM(bkpci.price_excl_vat), DATE_FORMAT(bkpc.issue_date, '%Y-%m') AS invoice_month
                FROM whs_claim_items whsi
                JOIN bkp_claim_items bkpci ON bkpci.id = whsi.id_bkp_claim_item
                JOIN bkp_claims      bkpc ON bkpc.id = bkpci.id_bkp_claim
                WHERE bkpc.issue_date >= date('Y').'-01-01' AND bkpc.issue_date <= date('Y').'-12-31'
                GROUP BY invoice_month
                ORDER BY invoice_month;'
          } ]        
  * C:
    * action: Warehouse/Analysis/BestSellerItems
    * params:
      * year = date('Y') // to show data for current year
      * limit = 10  // to show Top 10 Items
      

