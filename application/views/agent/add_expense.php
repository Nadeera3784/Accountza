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
                           <?php echo form_open('agent/add_expense', $attribute);?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="title">Title:</label>
                                                <input type="text" class="form-control required" id="title" name="title" value="<?php echo $this->form_validation->set_value('title');?>">
                                                <?php echo form_error('title'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="category_id">Category:</label>
                                                <select name="category_id" id="category_id" class="form-control select2 required">
                                                    <option value="">---Select Category---</option>
                                                    <?php foreach($categories as $category):?>
                                                        <option value="<?=$category->expense_category_id;?>"> <?=ucwords($category->name);?></option>
                                                    <?php endforeach;?>
                                                </select>  
                                                <?php echo form_error('category_id'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="status">Status:</label>
                                                <select name="status" id="status" class="form-control required">
                                                    <option value="">---Select Status---</option>
                                                    <option  value="paid">Paid</option>
                                                    <option  value="not-paid">Not-Paid</option>
                                                    <option  value="pending">Pending</option>
                                                    <option  value="draft">Draft</option>
                                                </select>  
                                                <?php echo form_error('status'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="created">Created:</label>
                                                <input type="text" class="form-control date_01 required" id="created" name="created" value="<?php echo $this->form_validation->set_value('created');?>">
                                                <?php echo form_error('created'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="vat">VAT:</label>
                                                <input type="text" class="form-control" id="vat" name="vat" value="<?php echo $this->form_validation->set_value('vat');?>">
                                                <?php echo form_error('vat'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="comments">Comments:</label>
                                                <textarea class="form-control" rows="2" name="comments">  </textarea>
                                                <?php echo form_error('comments'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-5" for="payment_method">Payment Method:</label>
                                                <textarea class="form-control required" rows="2" name="payment_method"><?php echo $this->form_validation->set_value('payment_method');?></textarea>
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
                                                <tr class="expense_itemList">
                                                    <td><input type="text" class="form-control expense_item" name="expense_item[]"></td>
                                                    <td><input type="text" class="form-control expense_price" id="expense_price" name="expense_price[]"></td>
                                                    <td><input type="number" min="1" class="form-control expense_quantity" name="expense_quantity[]"></td>
                                                    <td><input type="text" class="form-control expense_totals" name="expense_totals[]" readonly></td>
                                                    <td><button type="button" class="btn btn-default" id="expense_removeFieldBtn"><i class="ti-trash"></i></button></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr class="txt-dark">
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-xs" id="expense_addFieldBtn">Add more</button>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>Subtotal</td>
                                                    <td id="expense_subtotal">0</td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>VAT(%)</td>
                                                    <td id="expense_vat">0</td>
                                                    <td></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total</td>
                                                    <td id="expense_amounttotal">0</td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="button-list pull-right">
                                        <input type="hidden"  name="expense_amounttotal" id="expense_savedTotal">
                                        <input type="hidden"  name="expense_amountsubtotal" id="expense_savedSubTotal">
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