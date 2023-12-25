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
                        <h6 class="panel-title txt-dark">Expenses VS Income</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                       <div class="relative chart-income" style="max-height:500px;">
                         <canvas class="chart" height="600" id="report-expense-vs-income"></canvas>
                       </div>
                    </div>	
                </div>
            </div>
        </div>
      </div>