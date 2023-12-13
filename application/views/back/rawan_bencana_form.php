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
                                            $id_rawan_bencana       = $k['id_rawan_bencana'];
                                            $id_desa                = $k['id_desa'];
                                            $ket_wilayah            = $k['ket_wilayah'];
                                            $ket_rawan_bencana      = $k['ket_rawan_bencana'];
                                            $status_rawan_bencana   = $k['status_rawan_bencana'];                                          
                                            $latitude               = $k['latitude'];
                                            $longitude              = $k['longitude'];
                                            $tgl_update             = $k['tgl_update'];
                                        }
                                    }
                                ?>       
                                    <form id="form-data"  method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div hidden="">
                                            <input type="text" name="id_rawan_bencana" id="id_rawan_bencana" value="<?php echo $id_rawan_bencana; ?>">
                                            <input type="text" name="stat" id="stat" value="<?php echo $stat; ?>">
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
                                            <label>Status Rawan Bencana</label>
                                            <select class="form-control select2" style="width:100%;" name="status_rawan_bencana" id="status_rawan_bencana">
                                                <option value="">Pilih Status Rawan Bencana</option>
                                                <?php  
                                                    $data_status_rawan_bencana = ['Rawan','Tidak Rawan'];
                                                    foreach ($data_status_rawan_bencana as $s)                            
                                                    {                                              
                                                        $selected = "";
                                                        if ($s == $status_rawan_bencana) 
                                                        {
                                                            $selected = "selected";
                                                        }
                                                    ?>

                                                    <option value="<?php echo $s;?>" <?php echo $selected; ?>><?php echo $s;?>
                                                    </option>

                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Keterangan Wilayah</label>
                                            <textarea id="elm1" name="ket_wilayah"><?php echo $ket_wilayah ?></textarea>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Keterangan Rawan Bencana</label>
                                            <textarea id="elm2" name="ket_rawan_bencana"><?php echo $ket_rawan_bencana ?></textarea>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Latitude</label>
                                            <input type="text" autocomplete="off" maxlength="150" class="form-control" id="latitude"  placeholder="Latitude" name="latitude" required="" value="<?php echo $latitude;?>">
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Longitude</label>
                                            <input type="text" autocomplete="off" maxlength="150" class="form-control" id="longitude"  placeholder="Longitude" name="longitude" required="" value="<?php echo $longitude;?>">
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
        <?php $this->load->view('back/rawan_bencana_js') ?>
    </body>
</html>
