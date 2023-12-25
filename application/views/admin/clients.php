<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Clients</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>admin/index">Dashboard</a></li>
                    <li class="active"><span>Clients</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <div id="AjaxResponse"></div>
              <?php $this->load->view('admin/alert'); ?>
            </div>
    
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Client List</h6>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#filterElement" aria-expanded="false" aria-controls="filterElement">Filter</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">  
                           <div class="form-inline mb-30 collapse" id="filterElement">
                               <div class="form-group mr-15">
                                    <label class="control-label mr-10" for="agent_id">Agent:</label>
                                    <select name="agent_id" id="agent_id" class="form-control required">
                                    <option value="">---Select Agent---</option>
                                        <?php foreach($agents as $agent):?>
                                        <option value="<?=$agent->id;?>"> <?=(!empty($agent->first_name)) ?  ucwords($agent->first_name . " " . $agent->last_name) : $agent->email ;?></option>
                                        <?php endforeach;?>
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
                                        <button type="button" name="applyAdminClientFilter" id="applyAdminClientFilter" class="btn btn-primary">Apply</button>
                                </div>
                                <div class="form-group mr-15">
                                        <button type="button" name="resetAdminClientFilter" id="resetAdminClientFilter" class="btn btn-default">Clear</button>
                                </div>
                            </div> 
                            <table id="AdminClientDataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Discount</th>
                                        <th>Agent</th>
                                        <th>Created</th> 
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