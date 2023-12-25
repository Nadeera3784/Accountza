<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Agents</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>admin/index">Dashboard</a></li>
                    <li class="active"><span>Agents</span></li>
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
                            <h6 class="panel-title txt-dark">Agent List</h6>
                        </div>
                        <div class="pull-right">
                        <a href="<?php echo base_url();?>admin/add_agent" class="btn btn-sm btn-primary"> New</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <table id="DatatableHolder"  class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subscription</th>
                                        <th>Status</th>
                                        <th>Created</th> 
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($agents as  $agent):?>
                                    <tr>
                                        <td><?php echo ($agent->first_name) ? ucwords($agent->first_name . " " . $agent->last_name) : "-";?></td>
                                        <td><?php echo $agent->email;?></td>
                                        <td><?php echo ($agent->phone)? $agent->phone : '-';?></td>
                                        <td>
                                        <?php
                                           echo $subscription_id[$agent->subscription_id]->title; 
                                        ?>
                                        </td>
                                        <td>
                                           <span class="badge badge-<?php echo ($agent->active == "1")? "primary" : "default";?>"><?php echo ($agent->active == "1")? "Active" : "Disabled";?></span>
                                        </td>
                                        <td><?php echo nice_date(unix_to_human($agent->created_on), 'Y-m-d');?></td>
                                        <td>
                                          <a href="<?php echo base_url();?>admin/update_agent/<?php echo $this->hasher->encrypt($agent->id);?>" class="btn btn-xs btn-primary">Edit</a>
                                          <button type="button" id="delete_agent" data-id="<?php echo $this->hasher->encrypt($agent->id);?>" class="btn btn-xs btn-default">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach;?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>