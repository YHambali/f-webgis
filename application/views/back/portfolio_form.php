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
                                            $id_portfolio     = $k['id_portfolio'];
                                            $tgl_portfolio    = $k['tgl_portfolio'];
                                            $nm_portfolio     = $k['nm_portfolio'];
                                            $id_kat_portfolio = $k['id_kat_portfolio'];
                                            $deskripsi        = $k['deskripsi'];
                                            $timeline         = $k['timeline'];                                            
                                        } 
                                    }
                                ?>       
                                    <form id="form-data"  method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div hidden="">
                                            <input type="text" name="id_portfolio" id="id_portfolio" value="<?php echo $id_portfolio ?>">
                                            <input type="text" name="stat" id="stat" value="<?php echo $stat; ?>">
                                        </div>   

                                        <div class="form-group col-lg-12">
                                            <label>Nama Portfolio</label>
                                            <input type="text" autocomplete="off" class="form-control" name="nm_portfolio" value="<?php echo $nm_portfolio ?>">
                                        </div>   
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Tgl Portfolio</label>
                                            <div class="input-group">
                                                <input type="text" autocomplete="off" name="tgl_portfolio" class="form-control" value="<?php echo $tgl_portfolio ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Kategori Portfolio</label>
                                            <select class="form-control select2" autocomplete="off" style="width:100%;" name="id_kat_portfolio" id="id_kat_portfolio">
                                                <option value="">Pilih Kategori Portfolio</option>
                                                <?php  
                                                    foreach ($data_kat_portfolio as $s)                            
                                                    {                                              
                                                        $selected = "";
                                                        if ($s['id_kat_portfolio'] == $id_kat_portfolio) 
                                                        {
                                                            $selected = "selected";
                                                        }
                                                    ?>

                                                    <option value="<?php echo $s['id_kat_portfolio'] ?>" <?php echo $selected; ?>><?php echo $s['nm_kat_portfolio'] ?>
                                                    </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Timeline</label>
                                            <input type="text" autocomplete="off" class="form-control" name="timeline" value="<?php echo $timeline ?>">
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
        <?php $this->load->view('back/portfolio_js') ?>
    </body>
</html>
