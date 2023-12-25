<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Expense</title>

    <style type="text/css">

        body {
            color: #727272;
            background: #ffffff;
            font-size: 12px;
            font-family: "Source Sans Pro", sans-serif;
            /* width: 100%; */
        }
        .clearfix { 
            clear: both;
        }
        .clearfix::after {
           content: "";
           clear: both;
           display: table;
        }

        .text-uppercase{
            text-transform: uppercase;
        }
        .color-blue{
            color: #190adc;
        }
        
        .bbottom{
            border-bottom: 1px solid #eee;
        }
        .box{
          width: 300px
        }
        .fs-12{
            font-size: 12px;
        }
        .pt-50{
            padding-top:50px;
        }
        .pt-20{
            padding-top:20px;
        }
        .text-center{
            text-align: center;
        }
        .txt-dark {
           color: #272B34;
         }

        .table th, .table th, .table .th, .table td {
            padding: 3px 0px 3px 5px;
        }

        .table tfoot td {
            color:#272B34;
        }
        
        .table td {
            padding: 5px;
            border-bottom: 1px solid #eee;
        }

        .table > tbody > tr > td{
            vertical-align: middle;
        }

        .table > thead > tr > th {
            border-bottom: 1px solid #eee !important;
            color: #272B34;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .container {
            width:100%;
        }
        .float-left-block_01 {
            float:left;
            width:150px
            height: 20px;
        }
        .float-right-block_01 {
            float:right;
            width:150%
            height: 20px;
        }

        .float-left-block_02 {
            float:left;
            width:150px
            height: 20px;
        }
        .float-right-block_02 {
            float:right;
            width:150%
            height: 20px;
        }

        .inline-block {
         display: inline-block !important;
        }
        .capitalize-font {
            text-transform: capitalize !important;
        }
        .uppercase-font{
            text-transform: uppercase;
        }
        .text-right{
            text-align : right;
        }
        .text-left{
            text-align : left;
        }
        .address-head {
            font-size: 12px;
            color: #272B34;
            display: block;
        }
        .ls-5 {
            letter-spacing: .5px;
        }
        hr{
            background-color: #eee; height: 1px; border: 0; 
        }
    </style>
</head>
<body>

<div class="container">
  <div class="float-right-block_02">
  <h1>Expense</h1>
  <p class="ls-5">
        <span>Reference&nbsp;&nbsp;  :  <?php echo $expense->title;?></span> <br>
        <span>Date : <?php echo $expense->created_date;?></span> <br>
    </p>

  </div>
  <div class="clearfix"></div>
</div>

<table width="100%" class="table pt-20">
    <thead>
      <tr>
        <th class="text-uppercase">Item</th>
        <th class="text-uppercase">Price</th>
        <th class="text-uppercase">Quantity</th>
        <th class="text-uppercase">Totals</th>
      </tr>
    </thead>
    <tbody>
     <?php if($expense_items):?>
     <?php foreach($expense_items as $expense_item):?>
      <tr>
        <td><?php echo $expense_item->expense_item_title;?></td>
        <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense_item->expense_item_unit_price);?></td>
        <td><?php echo $expense_item->expense_item_qty;?></td>
        <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense_item->expense_item_total);?></td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>
    </tbody>
    <tfoot>
        <tr>
          <td></td>
          <td></td>
          <td class="txt-dark">Subtotal</td>
          <td class="txt-dark"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense->subtotal);?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td class="txt-dark">VAT(%)</td>
          <td class="txt-dark"><?php echo $expense->vat;?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td class="txt-dark">Total</td>
          <td class="txt-dark"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense->total);?></td>
        </tr>
    </tfoot>
  </table>

  <div class="container pt-20">
     <span class="txt-dark head-font inline-block uppercase-font mb-5">Comments</span>
     <p><?php echo nl2br($expense->comments);?>
     <p>
  </div>
  <div class="container pt-20">
     <span class="txt-dark head-font inline-block uppercase-font mb-5">Payment Method</span>
     <p><?php echo nl2br($expense->payment_method);?>
     <p>
  </div>

</body>
</html>
