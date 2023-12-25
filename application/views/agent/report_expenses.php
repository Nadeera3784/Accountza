<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Reports</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Reports</span></li>
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
                        <h6 class="panel-title txt-dark">Expenses Report</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                       <div class="table-responsive">
                            <table class="table table-bordered table-hover expenses-report" id="expenses-report-table">
                                <thead>
                                        <tr>
                                            <th class="bold">category</th>
                                            <?php
                                            for ($m=1; $m<=12; $m++) {
                                                echo '  <th class="bold">' . date('F', mktime(0,0,0,$m,1)) . '</th>';
                                            }
                                            ?>
                                            <th class="bold">year (<?php echo date('Y'); ?>)</th>
                                        </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        $taxTotal = array();
                                        $netAmount = array();
                                        $totalNetByExpenseCategory = array();
                                        foreach($categories as $category) { ?>
                                        <tr>
                                            <td class="bold"><?php echo $category->name; ?></td>
                                            <?php
                                            for ($m=1; $m<=12; $m++) {
                                                if(!isset($netMonthlyTotal[$m])){
                                                    $netMonthlyTotal[$m] = array();
                                                }

                                                $this->db->select('expense_id')
                                                ->from('app_expenses')
                                                ->where('MONTH(created_date)',$m)
                                                ->where('YEAR(created_date)',$current_year)
                                                ->where('agent_id', $agent_id)
                                                ->where('category_id',$category->expense_category_id);

                                                $expenses = $this->db->get()->result_array();

                                                $total_expenses = array();
                                                echo '<td>';
                                                foreach($expenses as $expense){
                                                    $expense = $this->Expense_model->get_expense($agent_id, $expense['expense_id']);
                                                    $total = $expense->total;
                                                    $total_expenses[] = $total;
                                                }
                                                $total_expenses = array_sum($total_expenses);
                                                array_push($netMonthlyTotal[$m],$total_expenses);
                                                if(!isset($totalNetByExpenseCategory[$category->expense_category_id])){
                                                    $totalNetByExpenseCategory[$category->expense_category_id] = array();
                                                }
                                                array_push($totalNetByExpenseCategory[$category->expense_category_id],$total_expenses);
                                                if(count($categories) <= 8){
                                                    echo currency_format($total_expenses);
                                                }else{
                                                    echo '<span data-toggle="tooltip" title="'.date('F', mktime(0,0,0,$m,1)).'">'. currency_format($total_expenses) .'</span>';
                                                }
                                                echo '</td>';
                                            ?>
                                            <?php } ?>
                                            <td class="bg-odd">
                                                    <?php echo currency_format(array_sum($totalNetByExpenseCategory[$category->expense_category_id])); ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php $current_year_total = array(); ?>
                                        <tr class="bg-odd">
                                           <td class="bold text-primary">Net Amount</td>
                                           <?php if(isset($netMonthlyTotal)) { ?>
                                            <?php foreach($netMonthlyTotal as $month => $total){
                                                    $total = array_sum($total);
                                                    $netMonthlyTotal[$month] = $total;
                                                    $current_year_total[] = $total;
                                                    ?>
                                                    <td class="bold">
                                                        <?php if(isset($settings->company_currency)):?>
                                                          <?php echo get_currency_symbol($settings->company_currency) ."". currency_format($total); ?>
                                                        <?php else:?>
                                                            <?php echo currency_format($total); ?>
                                                        <?php endif;?>
                                                    </td>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <td class="bold bg-odd">
                                                        <?php
                                                        $totalNetByExpenseCategorySum = 0;
                                                        foreach($totalNetByExpenseCategory as $totalCat) {
                                                            $totalNetByExpenseCategorySum += array_sum($totalCat);
                                                        }
                                                        if(isset($settings->company_currency)){
                                                           echo get_currency_symbol($settings->company_currency) ."". currency_format($totalNetByExpenseCategorySum);
                                                        }else{
                                                            echo currency_format($totalNetByExpenseCategorySum);   
                                                        }
                                                        ?>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                       </div>
                    </div>	
                </div>
            </div>
        </div>
      </div>