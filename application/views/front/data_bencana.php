<!doctype html>
<html lang="en">

    <head>        
        <?php 
            $this->load->view('front_partial/title-meta'); 
            $this->load->view('front_partial/head-css');
        ?>
        <!-- leaflet -->
        <link href="<?php echo base_url() ?>assets_front/leaflet/leaflet.css" rel="stylesheet" type="text/css">
        <style>
            #map { height: 550px; }
        </style>
    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
                $this->load->view('front_partial/topbar');
                $this->load->view('front_partial/topnavbar');
            ?>
    
                

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <?php
                            $this->load->view('front_partial/page-title');
                        ?>
                        <!-- end page title -->
                                               
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">  
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#data_bencana" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Data Bencana</span>    
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#data_rekam_bencana" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Data Rekam Bencana</span>    
                                                </a>
                                            </li>                                            
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="data_bencana" role="tabpanel">
                                                <div style="max-width: auto; overflow-x: auto;">
                                                    <table id="datatable1" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Bencana</th>                                                                           
                                                        </tr>
                                                        </thead>
                                                        <tbody>                                                
                                                        </tbody>
                                                    </table>
                                                </div> 
                                            </div>

                                            <div class="tab-pane " id="data_rekam_bencana" role="tabpanel">
                                                <div style="max-width: auto; overflow-x: auto;">
                                                    <table id="datatable2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kecamatan</th>
                                                                <th>Nama Desa</th>
                                                                <th>Nama Bencana</th>
                                                                <th>Tgl Bencana</th>
                                                                <th>Keterangan Bencana</th>
                                                                <th>File Dokumentasi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                
                                                        </tbody>
                                                    </table>
                                                </div> 
                                            </div>                                            
                                        </div>

                                        
        
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <!-- end row -->                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php
                    $this->load->view('front_partial/footer');
                ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <?php  
            $this->load->view('front_partial/right-sidebar');
        ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <?php $this->load->view('front_partial/vendor-scripts') ?>
        <!-- Required datatable js -->
        <script src="<?php echo base_url()?>assets_back/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets_back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>        
        <script src="<?php echo base_url() ?>assets_back/js/app.js"></script>  
        
        <!-- JS Page -->
        <?php $this->load->view('front/data_bencana_js') ?>
    </body>
</html>
