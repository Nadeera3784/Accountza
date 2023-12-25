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
              <div id="AjaxResponse"></div>
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
            <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Estimate List</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>agent/add_estimate"> New</a>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#filterElement" aria-expanded="false" aria-controls="filterElement">Filter</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                        <div class="form-inline mb-30 collapse" id="filterElement">
                               <div class="form-group mr-15">
                                    <label class="control-label" for="client_id">Client:</label>
                                    <select name="client_id" id="client_id" class="form-control required">
                                        <option value="">---Select Client---</option>
                                         <?php foreach($clients as $client):?>
                                            <option value="<?=$client->client_id;?>"> <?=ucwords($client->name);?></option>
                                          <?php endforeach;?>
                                        </select>  
                                </div>
                                <div class="form-group mr-15">
                                    <label class="control-label" for="status">Status:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">---Select Status---</option>
                                        <option value="draft">Draft</option>
                                        <option value="pending">Pending</option>
                                        <option value="declined">Declined</option>
                                        <option value="accepted">Accepted</option>
                                    </select>  
                                </div>
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10" for="start_date">From:</label>
                                    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Pick a date">
                                </div>
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10" for="end_date">To:</label>
                                    <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Pick a date">
                                </div>	
                                <div class="form-group mr-15">
                                        <button type="button" name="applyEstimatesFilter" id="applyEstimatesFilter" class="btn btn-primary">Apply</button>
                                </div>
                                <div class="form-group mr-15">
                                        <button type="button" name="resetEstimatesFilter" id="resetEstimatesFilter" class="btn btn-default">Clear</button>
                                </div>
                            </div>  
                            <table id="EstimatesDataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Estimate No</th>
                                        <th>Client</th>
                                        <th>Total</th>
                                        <th>Created</th> 
                                        <th>Valid</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>