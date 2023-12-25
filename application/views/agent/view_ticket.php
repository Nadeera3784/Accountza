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
              <?php $this->load->view('agent/alert'); ?>
            </div>
    
        </div>
    
        <div class="row">
            <div class="col-sm-12 col-xs-12 animate-element">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <span class="panel-title txt-dark">View Ticket - <span class="label label-primary"><?php echo $ticket_details->ticket_id;?></span></span>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/support">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="chat-cmplt-wrap chat-for-widgets-1">
                                <div class="recent-chat-box-wrap">
                                    <div class="recent-chat-wrap">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="chat-content">
                                                    <ul class="chatapp-chat-nicescroll-bar pt-20">
                                                        <?php foreach($tickets as $chat):?>
                                                            <?php if($chat->identity == 'admin'):?>
                                                                <li class="friend">
                                                                    <div class="friend-msg-wrap">
                                                                        <img class="user-img img-circle block pull-left"  src="<?php echo base_url();?>backend/images/company_logo.png" alt="user"/>
                                                                        <div class="msg pull-left">
                                                                            <p><?php echo nl2br($chat->description);?></p>
                                                                            <div class="msg-per-detail text-right">
                                                                                <span class="msg-time txt-light"><?php echo  date("M j, Y, g:i a", strtotime($chat->created_date));?></span>
                                                                            </div>
                                                                            <?php if(!empty($chat->attachment)):?>
                                                                                <a href="<?php echo base_url();?>backend/images/support/<?php echo $chat->attachment;?>">
                                                                                  <img class="chat-attachment" src="<?php echo base_url();?>backend/images/support/<?php echo $chat->attachment;?>" alt="thumbnail">
                                                                                </a>                                                      
                                                                            <?php endif;?>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>	
                                                                </li>
                                                            <?php else :?>
                                                                <li class="self mb-10">
                                                                    <div class="self-msg-wrap">
                                                                        <div class="msg block pull-right"> <?php echo nl2br($chat->description);?>
                                                                            <div class="msg-per-detail text-right">
                                                                                <span class="msg-time txt-light"><?php echo  date("M j, Y, g:i a", strtotime($chat->created_date));?></span>
                                                                            </div>
                                                                            <?php if(!empty($chat->attachment)):?>
                                                                                <a href="<?php echo base_url();?>backend/images/support/<?php echo $chat->attachment;?>">
                                                                                  <img class="chat-attachment" src="<?php echo base_url();?>backend/images/support/<?php echo $chat->attachment;?>" alt="thumbnail">
                                                                                </a>
                                                                            <?php endif;?>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>	
                                                                </li>
                                                            <?php endif;?>
                                                        <?php endforeach;?>
                                                    </ul>
                                                </div>
                                                <div class="input-group">
                                                   <?php $attribute = array("id" => "chatForm");?>
                                                    <?php echo form_open_multipart('', $attribute);?>
                                                    <input type="text" id="input_msg_send_chatapp" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
                                                    <input type="hidden"  name="ticket_id" value="<?php echo $this->hasher->encrypt($ticket_details->supprt_ticket_id);?>">
                                                    <div class="input-group-btn attachment">
                                                        <div class="fileupload btn  btn-danger"><i class="zmdi zmdi-attachment-alt"></i>
                                                            <input type="file" name="attachment" class="upload">
                                                        </div>
                                                    </div>
                                                    <?php echo form_close();?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>