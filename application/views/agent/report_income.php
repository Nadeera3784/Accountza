<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Income</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Income </span></li>
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
                            <h6 class="panel-title txt-dark">Generate</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <?php $attribute = array("class" => "mb-30",  "id" => "genericFormValidation");?>
                            <?php echo form_open('agent/report_income', $attribute);?>
                                <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                        <label class="control-label mr-10" for="client">Report Type:</label>
                                        <select name="client" id="client" class="form-control required">
                                            <option value="0">All Clients</option>
                                            <?php foreach ($clients as $client): ?>
                                             <option value="<?php echo html_escape($client->client_id);?>" <?php echo ($selected_client == $client->client_id) ? 'selected' : ''; ?>><?php echo html_escape($client->name);?></option>
                                            <?php endforeach ?>
                                        </select>  
                                        <?php echo form_error('client'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                        <label class="control-label" for="start_date">From:</label>
                                        <input type="text" class="form-control required" id="start_date" name="start_date" placeholder="Pick a date" value="<?php echo $start_date;?>">
                                        <?php echo form_error('start_date'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                        <label class="control-label" for="end_date">To:</label>
                                        <input type="text" class="form-control required" id="end_date" name="end_date" placeholder="Pick a date" value="<?php echo $end_date;?>">
                                        <?php echo form_error('end_date'); ?>
                                    </div>	
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mr-15">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mt-20">Search</button>
                                    </div>
                                </div>
                                </div>
                            <?php echo form_close();?>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 scroll table-responsive mt-50 p-0 print_area">
              <table class="table table-hover">
                  <thead class="bg-light">
                      <tr>
                          <th>Clients</th>
                          <th class="text-right">All</th>
                          <th class="text-right">Paid</th>
                      </tr>
                  </thead>

                  <tbody>
                    <?php $total_income=0; $total_paid=0; ?>
                    <?php $i=1; foreach ($users as $user): ?>
                      <tr id="row_<?php echo html_escape($user->name); ?>">
                          <td width="60%"><strong><?php echo $user->name; ?></strong></td>
                          <td class="text-right"><?php echo get_currency_symbol($settings->company_currency).' '. number_format(get_incomes_by_customer($user->client_id), 2); ?></td>
                          <td class="text-right"><?php echo get_currency_symbol($settings->company_currency).' '. number_format(get_paid_incomes_by_customer($user->client_id, $report_type), 2); ?></td>
                      </tr>
                      
                      <?php 
                        $total_income += get_incomes_by_customer($user->customer); 
                        $total_paid += get_paid_incomes_by_customer($user->customer, $report_type); 
                      ?>
                    <?php $i++; endforeach; ?>

                    <thead>
                        <tr>
                            <th class="">Total</th>
                            <th class="text-right bbt-1 fs-20"><?php echo get_currency_symbol($settings->company_currency).' '. number_format($total_income, 2); ?></th>
                            <th class="text-right bbt-1 fs-20"><?php echo get_currency_symbol($settings->company_currency).' '. number_format($total_paid, 2); ?></th>
                        </tr>
                    </thead>
                  </tbody>

              </table>
            </div>
            
        </div>