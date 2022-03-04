<!doctype html>
<html lang="en">

    <head>
        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets_back/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets_back/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets_back/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <?php 
            $this->load->view('back_partial/title-meta'); 
            $this->load->view('back_partial/head-css');
        ?>
    </head>


    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php  
                $this->load->view('back_partial/topbar');
                $this->load->view('back_partial/sidebar');

            ?>           

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <?php 
                            $this->load->view('back_partial/page-title.php');
                        ?>
                        <div class="row">
                            <div class="col-12">                              
                                <div class="card">              
                                    <div class="card-body">
                                        <h4 class="card-title">Data Bencana</h4>                          
                                        <a href="javascript:void(0)" id="tambah_data" onclick="tambah_data()" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>                                            
                                        <p>  
                                        <div style="max-width: auto; overflow-x: auto;">
                                            <table id="datatable1" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Action</th>
                                                    <th>Bencana</th>                                                                           
                                                </tr>
                                                </thead>
                                                <tbody>                                                
                                                </tbody>
                                            </table>
                                        </div>                                                           
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <?php $this->load->view('back/bencana_form') ?>

                <!-- End Page-content -->   
                <?php  
                    $this->load->view('back_partial/footer');
                ?>             
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <?php  
            $this->load->view('back_partial/right-sidebar');
        ?>
        
        <!-- JAVASCRIPT  -->
        <?php $this->load->view('back_partial/vendor-scripts') ?>
        <!-- Required datatable js -->
        <script src="<?php echo base_url()?>assets_back/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets_back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>        
        <script src="<?php echo base_url()?>assets_back/js/app.js"></script>

        <!-- JS Page -->
        <?php $this->load->view('back/bencana_js') ?>
    </body>
</html>
