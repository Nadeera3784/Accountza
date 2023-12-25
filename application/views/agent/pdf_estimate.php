<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Expenses</title>

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
  <div class="float-left-block_02">
    <?php if($settings->company_logo != ''):?>
    <img  style="max-width: 115px;"  src="<?php echo base_url();?>backend/images/logos/<?php echo $settings->company_logo;?>">
    <?php else : ?>
    <img  style="max-width: 115px;"  src="<?php echo base_url();?>backend/images/company_logo.png">
    <?php endif;?>
  </div>
  <div class="float-right-block_02">
  <h1>Estimate</h1>
  <p class="ls-5">
        <span>Reference  :  <?php echo $estimate->estimate_no;?></span> <br>
        <span>Date :  <?php echo $estimate->estimate_created_date;?> <br>
        <span>Valid Until  : <?php echo $estimate->estimate_valid_unil_date;?></span> <br>
    </p>

  </div>
  <div class="clearfix"></div>
</div>

<div class="container pt-50">
  <div class="float-left-block_01">
  <span class="txt-dark head-font inline-block uppercase-font mb-5">Customer Details:</span>
   <p class="ls-5">
        <span class="address-head mb-5"><?php echo $estimate->name;?></span>
        <span><?php echo $estimate->address;?></span> <br>
        <span><?php echo $estimate->city;?>, <?php echo $estimate->state;?> <?php echo $estimate->postal_code;?></span> <br>
        <span title="Phone"></span><span><?php echo $estimate->phone;?></span>
    </p>
  </div>
  <div class="float-right-block_01">
  <span class="txt-dark head-font inline-block uppercase-font">Company Details:</span>
  <p class="ls-5">
        <span class="address-head mb-5"><?php echo (isset($settings->company_name)) ? $settings->company_name : 'Your company cop'  ;?></span>
        <span><?php echo (isset($settings->company_street_01)) ? $settings->company_street_01 : 'street 01'  ;?>, <?php echo (isset($settings->company_street_02)) ? $settings->company_street_02 : 'street 02'  ;?></span> <br>
        <span><?php echo (isset($settings->company_city)) ? $settings->company_city : 'City'  ;?>,   <?php echo (isset($settings->company_state)) ? $settings->company_state : 'State'  ;?> <?php echo (isset($settings->company_postal_code)) ? $settings->company_postal_code : '000000'  ;?></span> <br>
        <span title="Phone"></span><span><?php echo (isset($settings->company_phone)) ? $settings->company_phone : '092323232323'  ;?></span>
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
     <?php if($estimate_items):?>
     <?php foreach($estimate_items as $estimate_item):?>
      <tr>
        <td><?php echo $estimate_item->estimate_item_name;?></td>
        <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate_item->estimate_item_unit_price);?></td>
        <td><?php echo $estimate_item->estimate_item_qty;?></td>
        <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate_item->estimate_item_total);?></td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>
    </tbody>
    <tfoot>
        <tr>
          <td></td>
          <td></td>
          <td class="txt-dark">Subtotal(<?php echo $settings->company_currency;?>)</td>
          <td class="txt-dark"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate->estimate_subtotal);?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td class="txt-dark">Discount(%)</td>
          <td class="txt-dark"><?php echo $estimate->estimate_discount;?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td class="txt-dark">Total(<?php echo $settings->company_currency;?>)</td>
          <td class="txt-dark"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate->estimate_total);?></td>
        </tr>
    </tfoot>
  </table>

</body>
</html>
