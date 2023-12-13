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
                            $this->load->view('front_partial/page-title');
                        ?>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-xl-12">
                                <h1>Selamat Datang di</h1> <p><h2>Sistem Inventarisasi Daerah Rawan Bencana</h2>
                                <p>                                                              
                            </div>                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="media">
                                                <div class="media-body overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Status Daerah</p>
                                                </div>
                                                
                                            </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table table-hover mb-0 table-centered table-nowrap">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <i class="fas fa-ban"></i>
                                                            </td>
                                                            
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Daerah Rawan</h5>
                                                            </td>
                                                            <td>
                                                                <p class="text-muted mb-0"><?php echo $jml_rawan?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="fas fa-check"></i>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Daerah Tidak Rawan</h5>
                                                            </td>
                                                            
                                                            <td>
                                                                <p class="text-muted mb-0"><?php echo $jml_tidak_rawan?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Jumlah Bencana Terjadi</p>
                                                <h4 class="mb-0"><?php echo $jml_bencana_terjadi; ?></h4>
                                            </div>
                                            <div class="text-primary">
                                                <i class="ri-stack-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="text-muted ml-2"><a href="<?php echo base_url().'data-bencana'?>"><i class="fas fa-arrow-circle-right"></i> View More</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Data Wilayah Karawang</p>
                                                <h5 class="mb-0">Kecamatan : <?php echo $jml_kecamatan; ?> | Desa : <?php echo $jml_desa; ?></h5>
                                                
                                            </div>
                                            <div class="text-primary">
                                                <i class="ri-stack-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="text-muted ml-2"><a href="<?php echo base_url().'data-wilayah-karawang'?>"><i class="fas fa-arrow-circle-right"></i> View More</a></span>
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


    </body>
</html>
