<!doctype html>
<html lang="en">
    <!-- HEADER -->
    <head>
        <?php 
            $this->load->view('back_partial/title-meta'); 
            $this->load->view('back_partial/head-css');
        ?>
    </head>

    <!-- BODY -->
    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="<?php echo base_url() ?>"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>
        <div>
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="<?php echo base_url()?>" class="logo"><img style="width: 300px;" src="<?php echo base_url() ?>file/logo/logo-dark.png" alt="logo"></a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                                <p class="text-muted">Sign in to start your session.</p>
                                            </div>

                                            <div class="col-lg-12">
                                                <?php echo $this->session->flashdata('result');?>        
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form class="form-horizontal" method="POST" action="<?php echo base_url().$auth_link; ?>">
                                                    <!-- <div hidden="">
                                                        <input type="text" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                    </div> -->
                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                                    </div>
                            
                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                                    </div>
                                                                            
                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>                                                    
                                                </form>
                                            </div>                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <?php $this->load->view('back_partial/vendor-scripts') ?>
        <script src="<?php echo base_url() ?>assets_back/js/app.js"></script>

    </body>
</html>
