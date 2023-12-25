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
                            <h6 class="panel-title txt-dark">New Expense</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/expenses">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation");?>
                           <?php echo form_open('agent/save_expense', $attribute);?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="title">Title:</label>
                                                <input type="text" class="form-control required" id="title" name="title" value="<?php echo $expense->title;?>">
                                                <?php echo form_error('title'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="category_id">Category:</label>
                                                <select name="category_id" id="category_id" class="form-control select2 required">
                                                    <option value="">---Select Category---</option>
                                                    <?php foreach($categories as $category):?>
                                                        <option value="<?=$category->expense_category_id;?>" <?php echo ($expense->category_id == $category->expense_category_id) ? 'selected' : '';?>> <?=ucwords($category->name);?></option>
                                                    <?php endforeach;?>
                                                </select>  
                                                <?php echo form_error('category_id'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mr-15">
                                                <label class="control-label mr-10" for="status">Status:</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option  value="paid" <?php echo ($expense->status == "paid") ? "selected" : "";?>>Paid</option>
                                                    <option  value="not-paid" <?php echo ($expense->status == "not-paid") ? "selected" : "";?>>Not-Paid</option>
                                                    <option  value="pending" <?php echo ($expense->status == "pending") ? "selected" : "";?>>Pending</option>
                                                    <option  value="draft" <?php echo ($expense->status == "draft") ? "selected" : "";?>>Draft</option>
                                                </select>  
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="created">Created:</label>
                                                <input type="text" class="form-control date_01 required" id="created" name="created" value="<?php echo $expense->created_date;?>">
                                                <?php echo form_error('created'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="vat">VAT:</label>
                                                <input type="text" class="form-control" id="vat" name="vat" value="<?php echo $expense->vat;?>">
                                                <?php echo form_error('vat'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="comments">Comments:</label>
                                                <textarea class="form-control" rows="2" name="comments"><?php echo $expense->comments;?></textarea>
                                                <?php echo form_error('comments'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="payment_method">Payment Method:</label>
                                                <textarea class="form-control required" rows="2" name="payment_method"><?php echo $expense->payment_method;?></textarea>
                                                <?php echo form_error('payment_method'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-12">
                                        <?php echo form_error('expense_amounttotal'); ?>
                                        <table class="table" id="expenseTable">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Totals</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="expense_dyanmicContent">
                                                <?php foreach($expense_items as $expense_item):?>
                                                <tr class="expense_itemList">
                                                    <td><input type="text" class="form-control expense_item" name="expense_item[]" value="<?php echo $expense_item->expense_item_title;?>"></td>
                                                    <td><input type="text" class="form-control expense_price expense_uprice" id="expense_price" name="expense_price[]" value="<?php echo currency_format($expense_item->expense_item_unit_price);?>"></td>
                                                    <td><input type="number" min="1" class="form-control expense_quantity" name="expense_quantity[]" value="<?php echo $expense_item->expense_item_qty;?>"></td>
                                                    <td>
                                                      <input type="text" class="form-control expense_totals" name="expense_totals[]" readonly value="<?php echo currency_format($expense_item->expense_item_total);?>">
                                                      <input type="hidden"  id="expense_item_id[]" name="expense_item_id[]" value="<?php echo $expense_item->expense_item_id;?>">
                                                    </td>
                                                    <td><button type="button" class="btn btn-default" id="removeAjaxExpenseItem" data-id="<?php echo $this->hasher->encrypt($expense_item->expense_item_id);?>"><i class="ti-trash"></i></button></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="txt-dark">
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-xs" id="expense_addFieldBtn">Add more</button>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>Subtotal</td>
                                                    <td id="expense_subtotal"><?php echo currency_format($expense->subtotal);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>VAT(%)</td>
                                                    <td id="expense_vat"><?php echo $expense->vat;?></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total</td>
                                                    <td id="expense_amounttotal"><?php echo currency_format($expense->total);?></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="button-list pull-right">
                                        <input type="hidden"  name="expense_amounttotal" id="expense_savedTotal" value="<?php echo $expense->total;?>">
                                        <input type="hidden"  name="expense_amountsubtotal" id="expense_savedSubTotal" value="<?php echo $expense->subtotal;?>">
                                        <input type="hidden"  id="id" name="id" value="<?php echo $this->hasher->encrypt($expense->expense_id);?>">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php echo form_close();?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>