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
                            <h6 class="panel-title txt-dark">New Estimate</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/estimates">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation");?>
                           <?php echo form_open('agent/add_estimate', $attribute);?>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                   <div class="col-md-3">
                                        <label class="control-label mb-5" for="estimate_no">Estimate No:</label>
                                        <input type="text" class="form-control" name="estimate_no">
                                        <?php echo form_error('estimate_no'); ?>
                                    </div>

                                   <div class="col-md-3">
                                       <label class="control-label mb-5" for="client_id">Client:</label>
                                       <select class="select2 required" id="selectClient" name="client_id" required>
                                            <option  value="" selected>--Select Client--</option>
                                            <?php foreach($clients as $client):?>
                                            <option value="<?php echo $client->client_id;?>"><?php echo $client->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?php echo form_error('client_id'); ?>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label mb-5" for="date">Date:</label>
                                        <input type="text" class="form-control date_01 required" name="date" placeholder="From">
                                        <?php echo form_error('date'); ?>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label mb-5" for="valid">Valid Until:</label>
                                        <input type="text" class="form-control date_02 required" name="valid" placeholder="To">
                                        <?php echo form_error('valid'); ?>
                                    </div>

                                    <div class="col-xs-6 mt-25">
                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Customer Details:</span>
                                        <address class="mb-15">
                                            <span class="address-head mb-5" id="remoteClientName">Xxxxx, Xxx.</span>
                                            <span id="remoteClientAddress">xxx Xxxx, Xxxx xxx</span> <br>
                                            <span id="remoteClientState">Xxx Xxxxxx, XX xxxxx</span> <br>
                                            <abbr title="Phone">P:</abbr><span id="remoteClientPhone">(xxxx) xxx-xxx</span>
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
                                                <tr class="itemList">
                                                    <td><input type="text" class="form-control item" name="item[]"></td>
                                                    <td><input type="text" class="form-control price" id="price" name="price[]"></td>
                                                    <td><input type="number" min="1" class="form-control quantity" name="quantity[]"></td>
                                                    <td><input type="text" class="form-control totals" name="totals[]" readonly></td>
                                                    <td><button type="button" class="btn btn-default" id="removeFieldBtn"><i class="ti-trash"></i></button></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr class="txt-dark">
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-xs" id="addFieldBtn">Add more</button>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>Subtotal</td>
                                                    <td id="subtotal">0</td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>Discount(%)</td>
                                                    <td><input type="number" class="form-control discount" name="amountdiscount" id="discount" value="0"></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total</td>
                                                    <td id="amounttotal">0</td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col-xs-12">
                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Comments:</span>
                                        <p id="comments">xxxxx..</p>
                                    </div>
                                    <div class="button-list pull-right">
                                        <input type="hidden"  name="amounttotal" id="savedTotal" value="0">
                                        <input type="hidden"  name="amountsubtotal" id="savedSubTotal">
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