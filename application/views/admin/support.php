<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Support</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>admin/index">Dashboard</a></li>
                    <li class="active"><span>Support</span></li>
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
                            <h6 class="panel-title txt-dark">Support ticket List</h6>
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
                                         <a href="<?php echo base_url();?>admin/view_ticket/<?php echo $this->hasher->encrypt($ticket->supprt_ticket_id);?>" class="btn btn-xs btn-primary">View</a>
                                         <div class="btn-group">
											<div class="dropdown">
												<button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												Select State
												<span class="caret"></span>
												</button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url();?>admin/update_ticket_state?state=closed&ticket_id=<?php echo $this->hasher->encrypt($ticket->supprt_ticket_id);?>">Closed</a></li>
                                                    <li><a href="<?php echo base_url();?>admin/update_ticket_state?state=re-Open&ticket_id=<?php echo $this->hasher->encrypt($ticket->supprt_ticket_id);?>">Re-Open</a></li>
                                                    <li><a href="<?php echo base_url();?>admin/update_ticket_state?state=pending&ticket_id=<?php echo $this->hasher->encrypt($ticket->supprt_ticket_id);?>">Pending</a></li>
												</ul>
										  	</div>
										   </div>
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