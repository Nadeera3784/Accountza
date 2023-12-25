<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Clients</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Clients</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <?php $this->load->view('agent/alert'); ?>
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
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>agent/add_client"> New</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">  
                            <div id="AjaxResponse"></div>
                            <table id="DatatableHolder" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Created</th> 
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($clients as  $client):?>
                                    <tr>
                                        <td><?php echo $client->name;?> </td>
                                        <td><?php echo $client->email;?> </td>
                                        <td><?php echo $client->phone;?> </td>
                                        <td><?php echo word_limiter($client->address, 3, '...');?> </td>
                                        <td><?php echo nice_date($client->created_date, 'Y-m-d');?> </td>
                                        <td>
                                           <a href="<?php echo base_url();?>agent/update_client/<?php echo $this->hasher->encrypt($client->client_id);?>" class="btn btn-xs btn-primary">Edit</a>
                                            <button type="button" class="btn btn-xs btn-default" id="delete_client" data-id="<?php echo $this->hasher->encrypt($client->client_id);?>">Delete</button>
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