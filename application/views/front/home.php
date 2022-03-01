<!doctype html>
<html lang="en">
<head>
    <?php  
        $this->load->view('front_partial/title-meta');
        $this->load->view('front_partial/head-css');
    ?>
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
                        $this->load->view('back_partial/page-title.php');
                    ?>
                    <!-- end page title -->
                    <div class="row">
                        
                    </div>                   
                </div> <!-- container-fluid -->
            </div>
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
    

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <?php $this->load->view('back_partial/vendor-scripts') ?>
    <!-- Required datatable js -->
    <script src="<?php echo base_url()?>assets_back/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets_back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>        
    <script src="<?php echo base_url() ?>assets_back/js/app.js"></script>

    <!-- JS Page -->

</body>
</html>