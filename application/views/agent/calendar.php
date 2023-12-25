<div class="page-wrapper">
    <div class="container">

       <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Calendar</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Calendar</span></li>
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
                        <h6 class="panel-title txt-dark">Calendar</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="calendar-wrap mt-40">
                            <div id="calendar"></div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
      </div>