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
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#data" role="tab">
                                                    <span class="d-none d-sm-block">Data File</span>    
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#upload" role="tab">
                                                    <span class="d-none d-sm-block"> Upload File</span>    
                                                </a>
                                            </li>                                           
                                        </ul>
                                
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="data" role="tabpanel">
                                                <div class="row">
                                                    <?php  
                                                        foreach ($cek_data as $s) 
                                                        {
                                                    ?>
                                                        <div class="col-md-6 col-xl-3">                              
                                                            <div class="card">
                                                                <a class="image-popup-vertical-fit " href="<?php echo base_url() ?>file/media/<?php echo $s['file_media'] ?>">
                                                                    <!-- <input type="text" name="url_text" class="url_text" value="<?php echo base_url() ?>file/media/<?php echo $s['file_media'] ?>"> -->
                                                                    <img class="img-fluid" alt="" src="<?php echo base_url() ?>file/media/<?php echo $s['file_media'] ?>"  width="800" height="533">
                                                                </a>

                                                              
                                                                <div class="card-body">
                                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Text Copied" data-clipboard-text="<?php echo base_url() ?>file/media/<?php echo $s['file_media'] ?>"  class="test btn btn-primary btn-sm waves-effect waves-light"><i class="ri ri-links-line"></i> Copy Link</a>

                                                                    <!-- data-toggle="tooltip" data-placement="top" title="Tooltip on top" -->
                                                                    <!-- <button class="test" data-clipboard-text="1">Button 1</button> -->
                                                                    <a href="javascript:void(0)" data-id="<?php echo $s['id_media'] ?>" onclick="delete_data(this)" class="btn btn-danger btn-sm waves-effect waves-light"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                </div>
                                                                
                                                            </div>
                                                        </div> <!-- end col -->
                                                    <?php
                                                        }
                                                    ?>                                            
                                                </div>
                                                
                                            </div>
                                            <div class="tab-pane" id="upload" role="tabpanel">
                                                <form method="POST" id="form-data" enctype="multipart/form-data">
                                                    <div hidden="">
                                                        <input type="text" name="id" value="">
                                                        <input type="text" name="tgl_upload" value="<?php echo date('Y-m-d') ?>">
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <input class="form-control" required="" type="file" name="file">
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ri ri-upload-2-line"></i> Upload</button>                                     
                                                    </div>
                                                </form>
                                                
                                            </div>
                                            
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                           
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
        <!-- Magnific Popup-->
        <script src="<?php echo base_url()?>assets_back/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- lightbox init js-->
        <script src="<?php echo base_url()?>assets_back/js/pages/lightbox.init.js"></script>    
        <script src="<?php echo base_url() ?>assets_back/js/app.js"></script>

        <!-- JS Page -->
        <?php $this->load->view('back/media_js') ?>
        <script type="text/javascript">

            $('a[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'bottom',
                trigger: 'click',
            });   
            setInterval(function () {
                 $('a[data-toggle="tooltip"]').tooltip('hide'); 
            }, 2000);

            $('a[data-toggle="tooltip"]').on('shown.bs.tooltip', function () {
                  var copyText = $(this).attr('data-clipboard-text');
                  var element = document.createElement("input"); 
                    element.type = 'text';
                    element.value = copyText;
                    element.style.position = "fixed"; // Prevent MS edge scrolling.
                    document.body.append(element);
                    element.select();
                    document.execCommand("copy");
                    document.body.removeChild(element);
            })
        </script>
    </body>
</html>
