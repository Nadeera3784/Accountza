<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Estimates</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Estimates</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <?php $this->load->view('agent/alert'); ?>
            </div>
    
        </div>
    
        <div class="row">
            <div class="col-sm-12 col-xs-12 animate-element">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <span class="panel-title txt-dark mr-10">Estimate - <span class="label label-primary"><?php echo $estimate->estimate_no;?></span></span>

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/estimates">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="center-block text-center mb-10">
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>readonly/view_estimate/<?php echo $this->hasher->encrypt($estimate->estimate_id);?>">Preview</a>
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/download_estimate/<?php echo $this->hasher->encrypt($estimate->estimate_id);?>">Download</a>
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/send_estimate/<?php echo $this->hasher->encrypt($estimate->estimate_id);?>">Send</a>
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/update_estimate/<?php echo $this->hasher->encrypt($estimate->estimate_id);?>">Edit</a>
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/estimate_invoice/<?php echo $this->hasher->encrypt($estimate->estimate_id);?>">Convert to Invoice</a>
                                </div>

                                <div class="col-md-8 col-md-offset-2 main_card pt-10 mb-20" id="invoice_card">
                                   <div class="row">
                                       <div class="col-xs-6">
                                            <?php if($settings->company_logo != ''):?>
                                            <img  style="max-width: 115px;"  src="<?php echo base_url();?>backend/images/logos/<?php echo $settings->company_logo;?>">
                                            <?php else : ?>
                                            <img  style="max-width: 115px;"  src="<?php echo base_url();?>backend/images/company_logo.png">
                                            <?php endif;?>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <h1>Estimate</h1>
                                            <address>
                                                <span class="txt-dark head-font capitalize-font mb-5">Reference:</span>
                                                <?php echo $estimate->estimate_no;?><br>

                                                <span class="txt-dark head-font capitalize-font mb-5">Date:</span>
                                                <?php echo $estimate->estimate_created_date;?><br>

                                                <span class="txt-dark head-font capitalize-font mb-5">Valid Until:</span>
                                                <?php echo $estimate->estimate_valid_unil_date;?><br>

                                            </address>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="seprator-block"></div>

                                        <div class="col-xs-6 mt-25">
                                            <span class="txt-dark head-font inline-block capitalize-font mb-5">Customer Details:</span>
                                            <address class="mb-15">
                                                <span class="address-head mb-5" id="remoteClientName"><?php echo $estimate->name;?></span>
                                                <span id="remoteClientAddress"><?php echo $estimate->address;?></span> <br>
                                                <span id="remoteClientState"><?php echo $estimate->city;?>, <?php echo $estimate->state;?> <?php echo $estimate->postal_code;?></span> <br>
                                                <span title="Phone"></span><span id="remoteClientPhone"><?php echo $estimate->phone;?></span>
                                            </address>
                                        </div>

                                        <div class="col-xs-6 mt-25 text-right">
                                            <span class="txt-dark head-font inline-block capitalize-font mb-5">Company Details:</span>
                                            <address class="mb-15">
                                                <span class="address-head mb-5"><?php echo (isset($settings->company_name)) ? $settings->company_name : 'Your company cop'  ;?></span>
                                                <?php echo (isset($settings->company_street_01)) ? $settings->company_street_01 : 'street 01'  ;?>, <?php echo (isset($settings->company_street_02)) ? $settings->company_street_02 : 'street 02'  ;?> <br>
                                                <?php echo (isset($settings->company_city)) ? $settings->company_city : 'City'  ;?>,   <?php echo (isset($settings->company_state)) ? $settings->company_state : 'State'  ;?> <?php echo (isset($settings->company_postal_code)) ? $settings->company_postal_code : '000000'  ;?> <br>
                                                <span title="Phone"></span><?php echo (isset($settings->company_phone)) ? $settings->company_phone : '092323232323'  ;?>
                                            </address>
                                        </div>
                                        <div class="seprator-block"></div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Totals</th>
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
                                                    <tr class="txt-dark">
                                                            <td>
                                                            </td>
                                                            <td>
                                                            </td>
                                                            <td>Subtotal</td>
                                                            <td id="subtotal"><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($estimate->estimate_subtotal);?></td>
                                                        </tr>
                                                        <tr class="txt-dark">
                                                            <td></td>
                                                            <td></td>
                                                            <td>Discount(%)</td>
                                                            <td id="discount"><?php echo $estimate->estimate_discount;?></td>
                                                        </tr>
                                                        <tr class="txt-dark">
                                                            <td></td>
                                                            <td></td>
                                                            <td>Total</td>
                                                            <td id="amounttotal"><?php echo  get_currency_symbol($settings->company_currency) ."". currency_format($estimate->estimate_total);?></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>