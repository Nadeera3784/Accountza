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
              <?php if(!isset($settings)):?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                   Please update your company details
                     <a class="text-primary" href="<?php echo base_url();?>agent/company_settings">  Update</a>
                </div>
              <?php endif;?>
            </div>
    
        </div>
    
        <div class="row">
            <div class="col-sm-12 col-xs-12 animate-element">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Update Estimate</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/estimates">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation");?>
                           <?php echo form_open('agent/save_estimate', $attribute);?>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                   <div class="col-md-3">
                                        <label class="control-label mb-5" for="estimate_no">Estimate No:</label>
                                        <input type="text" class="form-control" name="estimate_no" value="<?php echo $estimate->estimate_no;?>">
                                        <?php echo form_error('estimate_no'); ?>
                                    </div>

                                   <div class="col-md-3">
                                       <label class="control-label mb-5" for="client_id">Client:</label>
                                       <select class="select2 required" id="selectClient" name="client_id" required>
                                            <option  value="" selected>--Select Client--</option>
                                            <?php foreach($clients as $client):?>
                                              <option value="<?php echo $client->client_id;?>" <?php echo  ($client->client_id  == $estimate->client_id) ? "selected" : "" ;?>><?php echo $client->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?php echo form_error('client_id'); ?>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label mb-5" for="date">Date:</label>
                                        <input type="text" class="form-control date_01 required" name="date" value="<?php echo $estimate->estimate_created_date;?>">
                                        <?php echo form_error('date'); ?>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label mb-5" for="valid">Valid Until:</label>
                                        <input type="text" class="form-control date_02 required" name="valid" value="<?php echo $estimate->estimate_valid_unil_date;?>">
                                        <?php echo form_error('valid'); ?>
                                    </div>
                                    <div class="col-xs-12  mt-5">
                                       <label class="control-label mb-5" for="status">Status:</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="draft" <?php echo ($estimate->estimates_status == 'draft') ? 'selected' : '' ;?>>Draft</option>
                                            <option value="pending" <?php echo ($estimate->estimates_status == 'pending') ? 'selected' : '' ;?>>Pending</option>
                                            <option value="declined" <?php echo ($estimate->estimates_status == 'declined') ? 'selected' : '' ;?>>Declined</option>
                                            <option value="accepted" <?php echo ($estimate->estimates_status == 'accepted') ? 'selected' : '' ;?>>Accepted</option>
                                        </select> 
                                        <?php echo form_error('client_id'); ?>
                                    </div>
                                    <div class="col-xs-6 mt-25">
                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Customer Details:</span>
                                        <address class="mb-15">
                                            <span class="address-head mb-5" id="remoteClientName"><?php echo $estimate->name;?></span>
                                            <span id="remoteClientAddress"><?php echo $estimate->address;?></span> <br>
                                            <span id="remoteClientState"><?php echo $estimate->city;?>, <?php echo $estimate->state;?> <?php echo $estimate->postal_code;?></span> <br>
                                            <abbr title="Phone">P:</abbr><span id="remoteClientPhone"><?php echo $estimate->phone;?></span>
                                        </address>
                                    </div>
                                    <div class="col-xs-6 mt-25 text-right">
                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Company Details:</span>
                                        <address class="mb-15">
                                            <span class="address-head mb-5"><?php echo (isset($settings->company_name)) ? $settings->company_name : 'Your company cop'  ;?></span>
                                            <?php echo (isset($settings->company_street_01)) ? $settings->company_street_01 : 'street 01'  ;?>, <?php echo (isset($settings->company_street_02)) ? $settings->company_street_02 : 'street 02'  ;?> <br>
                                            <?php echo (isset($settings->company_city)) ? $settings->company_city : 'City'  ;?>,   <?php echo (isset($settings->company_state)) ? $settings->company_state : 'State'  ;?> <?php echo (isset($settings->company_postal_code)) ? $settings->company_postal_code : '000000'  ;?> <br>
                                            <abbr title="Phone">P:</abbr><?php echo (isset($settings->company_phone)) ? $settings->company_phone : '092323232323'  ;?>
                                        </address>
                                    </div>
                                    <div class="seprator-block"></div>
                                    <div class="col-md-12">
                                        <?php echo form_error('amountsubtotal'); ?>
                                        <table class="table" id="invoiceTable">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Totals</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="dyanmicContent">
                                               <?php if($estimate_items):?>
                                                    <?php foreach($estimate_items as $estimate_item):?>
                                                        <tr class="itemList">
                                                            <td><input type="text" class="form-control item" name="item[]" value="<?php echo $estimate_item->estimate_item_name;?>"></td>
                                                            <td><input type="text" class="form-control price" id="price" name="price[]" value="<?php echo currency_format($estimate_item->estimate_item_unit_price);?>"></td>
                                                            <td><input type="number" min="1" class="form-control quantity" name="quantity[]" value="<?php echo $estimate_item->estimate_item_qty;?>"></td>
                                                            <td><input type="text" class="form-control totals" name="totals[]" value="<?php echo currency_format($estimate_item->estimate_item_total);?>" readonly></td>
                                                            <td>
                                                              <input type="hidden"  name="item_id[]" id="item_id" value="<?php echo $estimate_item->estimate_item_id;?>">
                                                              <button type="button" class="btn btn-default" id="removeAjaxEstimateItem" data-id="<?php echo $this->hasher->encrypt($estimate_item->estimate_item_id);?>"><i class="ti-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="txt-dark">
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-xs" id="addFieldBtn">Add more</button>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>Subtotal</td>
                                                    <td id="subtotal"><?php echo currency_format($estimate->estimate_subtotal);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td> 
                                                    </td>
                                                    <td></td>
                                                    <td>Discount(%)</td>
                                                    <td><input type="number" class="form-control discount" name="amountdiscount" id="discount" value="<?php echo ($estimate->estimate_discount) ? currency_format($estimate->estimate_discount) : '0';?>"></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total</td>
                                                    <td id="amounttotal"><?php echo currency_format($estimate->estimate_total);?></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col-xs-12">
                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Comments:</span>
                                        <p id="comments"><?php echo $estimate->notes;?></p>
                                    </div>
                                    <div class="button-list pull-right">
                                        <input type="hidden"  name="amounttotal" id="savedTotal" value="<?php echo ($estimate->estimate_total) ? currency_format($estimate->estimate_total) : '0';?>">
                                        <input type="hidden"  name="amountsubtotal" id="savedSubTotal" value="<?php echo currency_format($estimate->estimate_subtotal);?>">
                                        <input type="hidden"  name="id" id="id" value="<?php echo $this->hasher->encrypt($estimate->estimate_id);?>">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php echo form_close();?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>