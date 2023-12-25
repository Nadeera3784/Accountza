<style>
    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center;
        padding-top: 0.25em;
    }
</style>
<div class="page-wrapper">
    <div class="container pt-30">
      <div class="row">

        <div class="col-sm-3">
         <a href="<?=base_url();?>agent/invoices">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo $invoice_count->total;?></span></span>
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
          <a href="<?=base_url();?>agent/expenses">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo $expensee_count->total;?></span></span>
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
           <a href="<?=base_url();?>agent/estimates">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo $estimates_count->total;?></span></span>
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
           <a href="<?=base_url();?>agent/clients">
            <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo $client_count->total;?></span></span>
                                        <span class="capitalize-font block">Clients</span>
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
           <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Total Income</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <div class="relative chart-income" style="max-height:300px;">
                            <canvas id="chart-income" class="animated fadeIn" height="400"></canvas>
                           </div>	
                        </div>
                     </div>
                 </div>
           </div>
      </div>

      <div class="row">
           <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Pending invoices</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <table id="PendingInvoiceDataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>#Invoice</th>
                                        <th>Client</th>
                                        <th>Amount</th>
                                        <th>Issue date</th> 
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($invoices as $invoice):?>
                                    <tr>
                                        <td><?php echo $invoice->invoice_no;?></td>
                                        <td><?php echo ucwords($invoice->name);?></td>
                                        <td><?php echo get_currency_symbol($settings->company_currency) . "" .currency_format($invoice->invoice_total);?></td>
                                        <td><?php echo $invoice->invoice_issue;?></td> 
                                        <td><?php echo $invoice->invoice_due;?></td>
                                        <td><span class="badge badge-default"><?php echo ucfirst($invoice->invoice_status);?></span></td>
                                        <td><a href="<?php echo base_url();?>agent/view_invoice/<?php echo $this->hasher->encrypt($invoice->invoice_id);?>" class="btn btn-xs btn-primary mr-5">View</a></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                     </div>
                 </div>
           </div>
      </div>