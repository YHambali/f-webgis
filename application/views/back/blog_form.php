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
                                            $id_blog        = $k['id_blog'];
                                            $tgl_blog       = $k['tgl_blog'];
                                            $judul_blog     = $k['judul_blog'];
                                            $author         = $k['author'];
                                            $id_kat_blog    = $k['id_kat_blog'];
                                            $deskripsi      = $k['deskripsi'];
                                            $tags           = $k['tags'];
                                        }
                                    }
                                ?>       
                                    <form id="form-data"  method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div hidden="">
                                            <input type="text" name="id_blog" id="id_blog" value="<?php echo $id_blog ?>">
                                            <input type="text" name="tgl_blog" id="tgl_blog" value="<?php echo $tgl_blog; ?>">
                                            <input type="text" name="stat" id="stat" value="<?php echo $stat; ?>">
                                        </div>   
                                        <div class="form-group col-lg-12">
                                            <label>Judul Blog</label>
                                            <input type="text" class="form-control" name="judul_blog" value="<?php echo $judul_blog ?>">
                                        </div>   

                                        <div class="form-group col-lg-12">
                                            <label>Author</label>
                                            <input type="text" class="form-control" name="author" value="<?php echo $author ?>">
                                        </div>                                                         

                                        <div class="form-group col-lg-12">
                                            <label>Kategori Blog</label>
                                            <select class="form-control select2" style="width:100%;" name="id_kat_blog" id="id_kat_blog">
                                                <option value="">Pilih Kategori Blog</option>
                                                <?php  
                                                    foreach ($data_kat_blog as $s)                            
                                                    {
                                              
                                                        $selected = "";
                                                        if ($s['id_kat_blog'] == $id_kat_blog) 
                                                        {
                                                            $selected = "selected";
                                                        }
                                                    ?>

                                                    <option value="<?php echo $s['id_kat_blog'] ?>" <?php echo $selected; ?>><?php echo $s['nm_kat_blog'] ?>
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
                                            <label class="control-label">Tags</label>
                                        
                                            <select class="select2 form-control select2-multiple" name="tags[]" multiple="multiple" data-placeholder="Pilih Tags" style="widows: 100%;">
                                                <?php  
                                                    foreach ($data_tags as $s) 
                                                    {
                                                    $hasil = str_replace(',', '', $tags)
                                                ?>
                                                    <option value="<?php echo $s['nama_tags'] ?>"
                                                        <?php 
                                                          if (preg_match("/".$s['nama_tags']."/i", $hasil)) {
                                                            echo "selected";
                                                          }
                                                        ?>>
                                                        <?php echo $s['nama_tags'];?>                                                        
                                                    </option>
                                                <?php
                                                    }
                                                ?>
                                                
                                            </select>
                                        
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
        <?php $this->load->view('back/blog_js') ?>
    </body>
</html>
