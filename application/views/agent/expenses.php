<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Expenses</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Expenses</span></li>
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
                            <h6 class="panel-title txt-dark">Expenses List</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>agent/add_expense"> New</a>
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/expense_categories"> Categories</a>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#filterElement" aria-expanded="false" aria-controls="filterElement">Filter</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                        <div class="form-inline mb-30 collapse" id="filterElement">
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10" for="client_id">Category:</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">---Select Category---</option>
                                        <?php foreach($categories as $category):?>
                                            <option value="<?=$category->expense_category_id;?>"> <?=ucwords($category->name);?></option>
                                          <?php endforeach;?>
                                    </select>  
                                </div>
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10" for="status">Status:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">---Select Status---</option>
                                        <option  value="paid">Paid</option>
                                        <option  value="not-paid">Not-Paid</option>
                                        <option  value="pending">Pending</option>
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
                                        <button type="button" name="applyExpensesFilter" id="applyExpensesFilter" class="btn btn-primary">Apply</button>
                                </div>
                                <div class="form-group mr-15">
                                        <button type="button" name="resetExpensesFilter" id="resetExpensesFilter" class="btn btn-default">Clear</button>
                                </div>
                            </div>  
                            <table id="ExpensesDataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Total</th> 
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