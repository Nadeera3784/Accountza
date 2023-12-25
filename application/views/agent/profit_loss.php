<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Profit & Loss </h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Profit & Loss </span></li>
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
                            <h6 class="panel-title txt-dark">Generate</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <?php $attribute = array("class" => "mb-30",  "id" => "genericFormValidation");?>
                            <?php echo form_open('agent/profit_loss', $attribute);?>
                                <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                        <label class="control-label mr-10" for="report_type">Report Type:</label>
                                        <select name="report_type" id="report_type" class="form-control required">
                                            <option value="">---Select Type---</option>
                                            <option value="1" <?php echo ($type == "1") ? "selected" : " ";?>>Paid & Unpaid (Including paid & unpaid invoices and expenses)</option>
                                            <option value="2" <?php echo ($type == "2") ? "selected" : " ";?>>Paid(Including only paid invoices and expenses)</option>
                                        </select>  
                                        <?php echo form_error('report_type'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                        <label class="control-label" for="start_date">From:</label>
                                        <input type="text" class="form-control required" id="start_date" name="start_date" placeholder="Pick a date" value="<?php echo $this->form_validation->set_value('start_date');?>">
                                        <?php echo form_error('start_date'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                        <label class="control-label" for="end_date">To:</label>
                                        <input type="text" class="form-control required" id="end_date" name="end_date" placeholder="Pick a date" value="<?php echo $this->form_validation->set_value('end_date');?>">
                                        <?php echo form_error('end_date'); ?>
                                    </div>	
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mt-20">Search</button>
                                    </div>
                                </div>
                                </div>
                            <?php echo form_close();?>  
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($expenses)):?>
            <div class="col-sm-12 col-xs-12 animate-element">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Summary</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="flex-stat flex-stat-3 text-center">
                                    <span class="block">Income</span>
                                    <span class="block"><span class="txt-orange weight-300 counter-anim data-rep"> <?php echo get_currency_symbol($settings->company_currency);?> <?php echo currency_format($invoices['sum']);?></span></span>
                                 </div>
                               </div>
                                <div class="col-md-4">
                                    <div class="flex-stat flex-stat-3 text-center">
                                        <span class="block">Expenses</span>
                                        <span class="block"><span class="txt-orange weight-300 counter-anim data-rep"><?php echo get_currency_symbol($settings->company_currency);?> <?php echo currency_format($expenses['sum']);?></span></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="flex-stat flex-stat-3 text-center">
                                        <span class="block">Net Profit</span>
                                        <span class="block"><span class="txt-orange weight-300 counter-anim data-rep"><?php echo get_currency_symbol($settings->company_currency);?> <?php echo currency_format($invoices['sum'] - $expenses['sum']);?></span></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr class="light-grey-hr row mt-10 mb-15">
                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="pull-left"><span class="pull-left txt-dark capitalize-font font-15 pl-10 pt-5">Income</span></div>
                                            <span class="clabels-text font-12 inline-block txt-dark text-right capitalize-font pull-right"><span class="block font-15 mb-5"><?php echo get_currency_symbol($settings->company_currency);?> <?php echo currency_format($invoices['sum']);?></span></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <hr class="light-grey-hr row mt-10 mb-15">
                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="pull-left"><span class="pull-left txt-dark capitalize-font font-15 pl-10 pt-5">Expenses</span></div>
                                            <span class="clabels-text font-12 inline-block txt-dark text-right capitalize-font pull-right"><span class="block font-15 mb-5"><?php echo get_currency_symbol($settings->company_currency);?> <?php echo currency_format($expenses['sum']);?></span></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <hr class="light-grey-hr row mt-10 mb-15">
                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="pull-left"><span class="pull-left txt-dark capitalize-font font-15 pl-10 pt-5">Net Profit</span></div>
                                            <span class="clabels-text font-12 inline-block txt-dark text-right capitalize-font pull-right"><span class="block font-15 mb-5"><?php echo get_currency_symbol($settings->company_currency);?> <?php echo currency_format($invoices['sum'] - $expenses['sum']);?></span></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                 </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>