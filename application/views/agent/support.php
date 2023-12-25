<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Support</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Support</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <div id="AjaxResponse"></div>
              <?php $this->load->view('agent/alert'); ?>
            </div>
    
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Support ticket List</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>agent/add_ticket"> New</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body"> 
                            <table id="SupportDataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Ticket ID</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tickets as $ticket):?>
                                    <tr>
                                       <td><?php echo $ticket->ticket_id;?></td>
                                       <td><?php echo word_limiter($ticket->description, 3);?></td>
                                       <td><span class="badge badge-default"><?php echo ucfirst($ticket->status);?></span></td>
                                       <td><?php echo $ticket->created_date;?></td>
                                       <td>
                                         <a href="<?php echo base_url();?>agent/view_ticket/<?php echo $this->hasher->encrypt($ticket->supprt_ticket_id);?>" class="btn btn-xs btn-primary">View</a>
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