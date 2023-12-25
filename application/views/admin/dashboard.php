<div class="page-wrapper">
    <div class="container pt-30">
      <div class="row">
        <div class="col-sm-3">
         <a href="<?=base_url();?>admin/invoices">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo ($invoice_count->total)? $invoice_count->total : "0" ;?></span></span>
                                        <span class="capitalize-font block">Invoices</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right text-primary">
                                        <i class="ti-clipboard data-right-rep-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </a>
        </div>
        <div class="col-sm-3">
          <a href="<?=base_url();?>admin/expenses">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo ($expenses_count->total)? $expenses_count->total : "0" ;?></span></span>
                                        <span class="capitalize-font block">Expenses</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right text-primary">
                                        <i class="icon-wallet data-right-rep-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>
        <div class="col-sm-3">
           <a href="<?=base_url();?>admin/estimates">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo ($estimates_count->total)? $estimates_count->total : "0" ;?></span></span>
                                        <span class="capitalize-font block">Estimates</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right text-primary">
                                        <i class="icon-docs data-right-rep-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-3">
           <a href="<?=base_url();?>admin/agents">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo ($users_count->total)? $users_count->total : "0" ;?></span></span>
                                        <span class="capitalize-font block">Agents</span>
                                    </div>
                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right text-primary">
                                        <i class="icon-people data-right-rep-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
      </div>

      <div class="row">
      <div class="col-sm-6">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Weekly ticket openings</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                       <div class="relative" style="max-height:350px;">
                          <canvas class="chart" id="weekly-ticket-openings-chart" height="350"></canvas>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Weekly registration</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                       <div id="weekchart"></div>
                    </div>	
                </div>
            </div>
        </div>
      </div>

<script>
  var chart_data = <?php echo $weekly_tickets_opening_statistics; ?>;
</script>