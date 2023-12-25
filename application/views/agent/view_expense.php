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
              <?php $this->load->view('agent/alert'); ?>
            </div>
    
        </div>
    
        <div class="row">
            <div class="col-sm-12 col-xs-12 animate-element">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <span class="panel-title txt-dark mr-10">Expense - <span class="label label-primary"><?php echo $expense->title;?></span></span>

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/expenses">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="center-block text-center mb-10">
                                    <!-- <button type="button" id="printExpense"  class="btn btn-default btn-sm">Print</button> -->
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/download_expense/<?php echo $this->hasher->encrypt($expense->expense_id);?>">Download</a>
                                    <a class="btn btn-default btn-sm" href="">Send</a>
                                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/update_expense/<?php echo $this->hasher->encrypt($expense->expense_id);?>">Edit</a>
                                </div>
                                <div class="col-md-8 col-md-offset-2 main_card pt-10 mb-20" id="expense_card">
                                    <div class="col-xs-6 mt-25">
                                        <address class="mb-15">
                                           <span class="txt-dark head-font inline-block capitalize-font mb-5">Reference:</span><br>
                                           <?php echo $expense->title;?>
                                        </address>
                                    </div>
                                    <div class="col-xs-6 mt-25 text-right">
                                        <address class="mb-15">
                                            <span class="txt-dark head-font inline-block capitalize-font mb-5">Date:</span><br>
                                            <?php echo  $expense->created_date;?>
                                        </address>
                                    </div>
                                    <div class="seprator-block"></div>
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Totals</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($expense_items as $expense_item):?>
                                                <tr>
                                                    <td><?php echo $expense_item->expense_item_title;?></td>
                                                    <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense_item->expense_item_unit_price);?></td>
                                                    <td><?php echo $expense_item->expense_item_qty;?></td>
                                                    <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense_item->expense_item_total);?></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="txt-dark">
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>Subtotal</td>
                                                    <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense->subtotal);?></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>VAT(%)</td>
                                                    <td><?php echo $expense->vat;?></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total</td>
                                                    <td><?php echo get_currency_symbol($settings->company_currency) ."". currency_format($expense->total);?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Comments:</span>
                                        <p><?php echo $expense->comments;?></p>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="txt-dark head-font inline-block capitalize-font mb-5">Payment Method:</span>
                                        <p class="mb-15"><?php echo $expense->payment_method;?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>