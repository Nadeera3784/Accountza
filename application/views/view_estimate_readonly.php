<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
	<meta name="googlebot" content="noindex,nofollow,noarchive,nosnippet,noodp" />
    <meta name="robots" content="noindex,nofollow,noarchive,nosnippet,noodp" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Accountza.io">
    <title>Accountza</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>frontend/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>frontend/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>frontend/images/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url();?>frontend/site.webmanifest">
    <link rel="mask-icon" href="<?php echo base_url();?>frontend/images/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo base_url();?>frontend/images/favicon-32x32.png">
    <link href="<?php echo base_url();?>frontend/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>frontend/css/materialdesignicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>frontend/css/readonly.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid readonly-container">
  <header>
  <?php if($estimate->estimates_status == 'pending'):?>    
  <div class="row">
    <div class="col-sm-12 text-sm-right">
    <a href="<?php echo base_url('readonly/reject_estimate/'.$this->hasher->encrypt($estimate->estimate_id));?>" class="btn btn-danger"><i class="mdi mdi-close"></i> Reject</a> 
    <a href="<?php echo base_url('readonly/approve_estimate/'.$this->hasher->encrypt($estimate->estimate_id));?>" class="btn btn-primary"><i class="mdi mdi-check"></i> Approve</a> 
    </div>
  </div>
  <?php endif;?>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
        <?php if($settings->company_logo != ''):?>
            <img id="logo" style="max-width: 120px;" src="<?php echo base_url();?>backend/images/logos/<?php echo $settings->company_logo;?>" title="logo" alt="logo">
        <?php else : ?>
            <img id="logo" style="max-width: 120px;" src="<?php echo base_url();?>backend/images/company_logo.png" title="logo" alt="logo">
        <?php endif;?>
    </div>
    <div class="col-sm-5 text-center text-sm-right">
      <h4 class="text-7 mb-0">Estimate</h4>
    </div>
  </div>
  <hr>
  </header>
  <main>
  <div class="row">
    <div class="col-sm-6"><strong>Date:</strong> <?php echo $estimate->estimate_created_date;?></div>
    <div class="col-sm-6 text-sm-right"> <strong>Reference: </strong> <?php echo $estimate->estimate_no;?></div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Customer Details:</strong>
      <address>
      <?php echo $estimate->name;?><br>
      <?php echo $estimate->address;?><br>
      <?php echo $estimate->city;?>, <?php echo $estimate->state;?> <?php echo $estimate->postal_code;?><br>
	  <?php echo $estimate->phone;?>
      </address>
    </div>
    <div class="col-sm-6 order-sm-0"> <strong>Company Details:</strong>
      <address>
      <?php echo (isset($settings->company_name)) ? $settings->company_name : 'N/A'  ;?><br>
      <?php echo (isset($settings->company_street_01)) ? $settings->company_street_01 : 'N/A'  ;?>, <?php echo (isset($settings->company_street_02)) ? $settings->company_street_02 : 'N/A'  ;?><br>
      <?php echo (isset($settings->company_city)) ? $settings->company_city : 'N/A'  ;?>,   <?php echo (isset($settings->company_state)) ? $settings->company_state : 'N/A'  ;?> <?php echo (isset($settings->company_postal_code)) ? $settings->company_postal_code : 'N/A'  ;?> <br>
      <?php echo (isset($settings->company_phone)) ? $settings->company_phone : 'N/A'  ;?>
      </address>
    </div>
  </div>  
  <div class="card">
    <div class="card-header px-2 py-0">
      <table class="table mb-0">
        <thead>
          <tr>
            <td><strong>Item</strong></td>
		      	<td class="text-center border-0"><strong>Price</strong></td>
		      	<td class="text-center border-0"><strong>Quantity</strong></td>
            <td class="text-right border-0"><strong>Totals</strong></td>
          </tr>
        </thead>
      </table>
    </div>
    <div class="card-body px-2">
      <div class="table-responsive">
        <table class="table">
          <tbody>
           <?php if($estimate_items):?>
            <?php foreach($estimate_items as $estimate_item):?> 
            <tr class="border-bottom">
              <td class="border-0"><?php echo $estimate_item->estimate_item_name;?></td>
              <td class="border-0"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate_item->estimate_item_unit_price);?></td>
              <td class="border-0"><?php echo $estimate_item->estimate_item_qty;?></td>
			  <td class="text-right border-0"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate_item->estimate_item_total);?></td>
            </tr>
              <?php endforeach;?>
            <?php endif;?>

            <tr>
              <td colspan="3" class="bg-light-2 text-right"><strong>Sub Total:</strong></td>
              <td class="bg-light-2 text-right"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate->estimate_subtotal);?></td>
            </tr>
            <tr>
              <td colspan="3" class="bg-light-2 text-right"><strong>Discount(%):</strong></td>
              <td class="bg-light-2 text-right"><?php echo $estimate->estimate_discount;?></td>
            </tr>
            <tr>
              <td colspan="3" class="bg-light-2 text-right"><strong>Total:</strong></td>
              <td class="bg-light-2 text-right"><?php echo  get_currency_symbol($settings->company_currency) ."". currency_format($estimate->estimate_total);?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </main>
  <!-- Footer -->
  <footer class="text-center mt-4">
  <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
   <div class="btn-group btn-group-sm d-print-none"> 
      <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="mdi mdi-cloud-print-outline"></i> Print</a> 
    </div>
  </footer>
</div>
    <?php $this->load->view('js');?>
</body>
</html>
