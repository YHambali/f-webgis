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
                            $this->load->view('back_partial/page-title');
                        ?>
                        <div class="row">
                            <div class="col-12">                              
                                <div class="card">       
                                <?php  
                                    if ($stat == 'edit') 
                                    {
                                        foreach ($cek_data as $k) 
                                        {
                                            $id_rekam_bencana   = $k['id_rekam_bencana'];
                                            $id_bencana         = $k['id_bencana'];
                                            $id_desa            = $k['id_desa'];
                                            $tgl_bencana        = $k['tgl_bencana'];
                                            $ket_bencana        = $k['ket_bencana'];                                          
                                        }
                                    }
                                ?>       
                                    <form id="form-data"  method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div hidden="">
                                            <input type="text" name="id_rekam_bencana" id="id_rekam_bencana" value="<?php echo $id_rekam_bencana ?>">
                                            <input type="text" name="stat" id="stat" value="<?php echo $stat; ?>">
                                        </div>   

                                        <div class="form-group col-lg-12">
                                            <label>Tanggal Bencana</label>
                                            <div class="input-group">
                                                <input type="text" autocomplete="off" name="tgl_bencana" id="tgl_bencana" class="form-control" value="<?php echo $tgl_bencana;?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div><!-- input-group -->
                                        </div>  
                                                                            
                                        <div class="form-group col-lg-12">
                                            <label>Data Bencana</label>
                                            <select class="form-control select2" style="width:100%;" name="id_bencana" id="id_bencana">
                                                <option value="">Pilih Data Bencana</option>
                                                <?php  
                                                    foreach ($data_bencana as $s)                            
                                                    {
                                              
                                                        $selected = "";
                                                        if ($s['id_bencana'] == $id_bencana) 
                                                        {
                                                            $selected = "selected";
                                                        }
                                                    ?>

                                                    <option value="<?php echo $s['id_bencana'] ?>" <?php echo $selected; ?>><?php echo $s['nm_bencana'] ?>
                                                    </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Data Desa</label>
                                            <select class="form-control select2" style="width:100%;" name="id_desa" id="id_desa">
                                                <option value="">Pilih Data Desa</option>
                                                <?php  
                                                    foreach ($data_desa as $s)                            
                                                    {
                                              
                                                        $selected = "";
                                                        if ($s['id_desa'] == $id_desa) 
                                                        {
                                                            $selected = "selected";
                                                        }
                                                    ?>

                                                    <option value="<?php echo $s['id_desa'] ?>" <?php echo $selected; ?>><?php echo $s['nm_desa'] ?>
                                                    </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Keterangan Bencana</label>
                                            <textarea id="elm1" name="ket_bencana"><?php echo $ket_bencana ?></textarea>
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
        <?php $this->load->view('back/rekam_bencana_js') ?>
    </body>
</html>
