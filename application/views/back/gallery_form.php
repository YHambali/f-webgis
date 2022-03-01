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
                                    if ($stat == 'edit') 
                                    {
                                        foreach ($cek_data as $k) 
                                        {
                                            $id_gallery        = $k['id_gallery'];
                                            $tgl_gallery       = $k['tgl_gallery'];
                                            $nm_gallery     = $k['nm_gallery'];
                                            $id_kat_gallery    = $k['id_kat_gallery'];
                                            $deskripsi          = $k['deskripsi'];
                                        }
                                    }
                                ?>       
                                    <form id="form-data"  method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div hidden="">
                                            <input type="text" name="id_gallery" id="id_gallery" value="<?php echo $id_gallery ?>">
                                            <input type="text" name="tgl_gallery" id="tgl_gallery" value="<?php echo $tgl_gallery; ?>">
                                            <input type="text" name="stat" id="stat" value="<?php echo $stat; ?>">
                                        </div>   
                                        <div class="form-group col-lg-12">
                                            <label>Nama gallery</label>
                                            <input type="text" class="form-control" name="nm_gallery" value="<?php echo $nm_gallery ?>">
                                        </div>                                                          

                                        <div class="form-group col-lg-12">
                                            <label>Kategori gallery</label>
                                            <select class="form-control select2" style="width:100%;" name="id_kat_gallery" id="id_kat_gallery">
                                                <option value="">Pilih Kategori gallery</option>
                                                <?php  
                                                    foreach ($data_kat_gallery as $s)                            
                                                    {
                                              
                                                        $selected = "";
                                                        if ($s['id_kat_gallery'] == $id_kat_gallery) 
                                                        {
                                                            $selected = "selected";
                                                        }
                                                    ?>

                                                    <option value="<?php echo $s['id_kat_gallery'] ?>" <?php echo $selected; ?>><?php echo $s['nm_kat_gallery'] ?>
                                                    </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Deskripsi</label>
                                            <textarea id="elm1" name="deskripsi"><?php echo $deskripsi ?></textarea>                                            
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>File</label>
                                            <?php  
                                                $required = "required";
                                                if ($stat == 'edit') 
                                                {
                                                    $required = "";
                                                }
                                            ?>
                                            <input type="file" <?php echo $required; ?> class="form-control" name="file">
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
        <?php $this->load->view('back/gallery_js') ?>
    </body>
</html>
