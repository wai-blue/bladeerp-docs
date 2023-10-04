# View Warehouse/Analysis/MonthlySellings

## Description

Shows monthly selling summary for all 12 months.

## Parent View

ADIOS\Core\Views\Chart

## Custom Params

* chartTitle: the title of this chart
* idProduct: if > 0, chart data are filtered by the idProduct

## Parent View Parameters

* title: customParams['chartTitle']
* datasets: [see description](#dataset-for-the-chart-area-b)
<!-- * data:
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
    } ] -->

## Parameters Post-processing

### Dataset for the Chart (Area B)

... blabla