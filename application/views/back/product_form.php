<!doctype html>
<html lang="en">

<head>

    <?php
    $this->load->view('back_partial/title-meta');
    ?>
    <!-- Plugins css -->
    <link href="<?php echo base_url() ?>assets_back/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <?php
    $this->load->view('back_partial/head-css');
    ?>
    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets_back/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets_back/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets_back/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />


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
                            <form id="my-awesome-dropzone" class="dropzone">
                                <div class="dropzone-previews"></div> <!-- this is were the previews should be shown. -->

                                <!-- Now setup your input fields -->
                                <input type="email" name="username" />
                                <input type="password" name="password" />

                                <button type="submit">Submit data and files!</button>
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
    <script src="<?php echo base_url() ?>assets_back/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets_back/libs/node-waves/waves.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url() ?>assets_back/libs/dropzone/min/dropzone.min.js"></script>

    <script src="<?php echo base_url() ?>assets_back/js/app.js"></script>

    <!-- JS Page -->
    <?php $this->load->view('back/product_js') ?>
    <!-- form mask -->
    <script src="<?php echo base_url() ?>assets_back/libs/inputmask/jquery.inputmask.min.js"></script>
    <script type="text/javascript">
        $(".input-mask").inputmask();

        // DROPZONE
        // Dropzone.options.myDropzone = {
        //     url: base_url + 'Back_product/simpan_data',
        //     autoProcessQueue: false,
        //     uploadMultiple: true,
        //     parallelUploads: 5,
        //     maxFiles: 5,
        //     maxFilesize: 1,
        //     acceptedFiles: 'image/*',
        //     addRemoveLinks: true,
        //     init: function() {
        //         dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        //         // for Dropzone to process the queue (instead of default form behavior):
        //         document.getElementById("submit-all").addEventListener("click", function(e) {
        //             // Make sure that the form isn't actually being sent.
        //             e.preventDefault();
        //             e.stopPropagation();
        //             dzClosure.processQueue();
        //         });

        //         //send all the form data along with the files:
        //         this.on("sendingmultiple", function(data, xhr, formData) {
        //             formData.append("file_gambar_detail", jQuery("#file_gambar_detail").val());
        //             // formData.append("lastname", jQuery("#lastname").val());
        //         });
        //     }
        // }

        Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

            // The configuration we've talked about above
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 25,
            maxFiles: 25,
            url: "hn_SimpeFileUploader.ashx",

            // The setting up of the dropzone
            init: function() {
                var myDropzone = this;

                // Here's the change from enyo's tutorial...

                $("#submit-all").click(function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
            }
        }
    </script>

</body>

</html>