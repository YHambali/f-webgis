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
                                <?php  
                                    $id_contact ='';
                                    $alamat ='';
                                    $email = '';
                                    $no_telp='';
                                    $no_hp='';
                                    $fb='';
                                    $tw='';
                                    $ig='';
                                    $link_map='';
                                    $stat = 'new';
                                    if (count($cek_data) > 0) 
                                    {
                                        $stat = 'edit';
                                        foreach ($cek_data as $k) 
                                        {
                                            $id_contact     = $k['id_contact'];
                                            $alamat         = $k['alamat'];
                                            $email          = $k['email'];
                                            $no_telp        = $k['no_telp'];
                                            $no_hp          = $k['no_hp'];
                                            $fb             = $k['fb'];
                                            $tw             = $k['tw'];
                                            $ig             = $k['ig'];
                                            $link_map       = $k['link_map'];
                                        }  
                                    }
                                                                           
                                    
                                ?>       
                                    <form id="form-data"  method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div hidden="">
                                            <input type="text" name="id_contact" id="id_contact" value="<?php echo $id_contact ?>"> 
                                            <input type="text" name="stat" value="<?php echo $stat ?>">                                           
                                        </div>   
                                        <div class="form-group col-lg-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat"><?php echo $alamat ?></textarea>
                                        </div>   

                                        <div class="form-group col-lg-12">
                                            <label>email</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
                                        </div> 

                                        <div class="form-group col-lg-12">
                                            <label>No Telp</label>
                                            <input type="text" class="form-control" name="no_telp" value="<?php echo $no_telp ?>">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>No HP</label>
                                            <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp ?>">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Link FB</label>
                                            <input type="text" class="form-control" name="fb" value="<?php echo $fb ?>">
                                        </div>      

                                        <div class="form-group col-lg-12">
                                            <label>Link Twitter</label>
                                            <input type="text" class="form-control" name="tw" value="<?php echo $tw ?>">
                                        </div>  

                                        <div class="form-group col-lg-12">
                                            <label>Link IG</label>
                                            <input type="text" class="form-control" name="ig" value="<?php echo $ig ?>">
                                        </div>  

                                        <div class="form-group col-lg-12">
                                            <label>Frame Google Map</label>
                                            <textarea class="form-control" name="link_map"><?php echo $link_map ?></textarea>
                                        </div>                                                       

                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button> 
                                    </div>
                                    </form>

                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
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
        
        <!-- JAVASCRIPT  -->
        <?php $this->load->view('back_partial/vendor-scripts') ?>
        <!-- Required datatable js -->
        <script src="<?php echo base_url()?>assets_back/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets_back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>        
        <script src="<?php echo base_url() ?>assets_back/js/app.js"></script>

        <!-- JS Page -->
        <?php $this->load->view('back/contact_js') ?>
    </body>
</html>
