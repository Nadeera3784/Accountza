<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Subscriptions</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>admin/index">Dashboard</a></li>
                    <li class="active"><span>Subscriptions</span></li>
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
                            <h6 class="panel-title txt-dark">Subscription List</h6>
                        </div>
                        <div class="pull-right">
                        <a href="<?php echo base_url();?>admin/add_subscription" class="btn btn-sm btn-primary"> New</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <table id="DatatableHolder"  class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($subscriptions as  $subscription):?>
                                    <tr>
                                        <td><?php echo ucwords($subscription->title);?></td>
                                        <td><?php echo currency_format($subscription->price);?></td>
                                        <td>
                                          <a href="<?php echo base_url();?>admin/update_subscription/<?php echo $this->hasher->encrypt($subscription->subscription_id);?>" class="btn btn-xs btn-primary">Edit</a>
                                          <button type="button" id="delete_subscription" data-id="<?php echo $this->hasher->encrypt($subscription->subscription_id);?>" class="btn btn-xs btn-default">Delete</button>
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