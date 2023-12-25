<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Mindmap</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Mindmap</span></li>
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
                            <h6 class="panel-title txt-dark">View Mindmap</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/mindmap">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                               <textarea style="display: none" id="mindmap_content" name="mindmap_content"><?php echo $mindmap->mindmap_content ;?></textarea>
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <p  class="form-control-static"><?php echo $mindmap->mindmap_title;?></p>
                                    </div>
                               </div>
                               <div class="col-md-12">
                                    <div class="tc-content">
                                        <div id="mindmap_draw">
                                            <div id="map"></div>
                                            <style>
                                                #map {
                                                    height: 500px;
                                                    width: 100%;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>