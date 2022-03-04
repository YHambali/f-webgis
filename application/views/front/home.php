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
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Number of Sales</p>
                                                        <h4 class="mb-0">1452</h4>
                                                    </div>
                                                    <div class="text-primary">
                                                        <i class="ri-stack-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body border-top py-3">
                                                <div class="text-truncate">
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ml-2">From previous period</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Sales Revenue</p>
                                                        <h4 class="mb-0">$ 38452</h4>
                                                    </div>
                                                    <div class="text-primary">
                                                        <i class="ri-store-2-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-top py-3">
                                                <div class="text-truncate">
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ml-2">From previous period</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Average Price</p>
                                                        <h4 class="mb-0">$ 15.4</h4>
                                                    </div>
                                                    <div class="text-primary">
                                                        <i class="ri-briefcase-4-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-top py-3">
                                                <div class="text-truncate">
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ml-2">From previous period</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->                                
                            </div>                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-right">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>

                                        <h4 class="card-title mb-3">Sources</h4>

                                        <div>
                                            <div class="text-center">
                                                <p class="mb-2">Total sources</p>
                                                <h4>$ 7652</h4>
                                                <div class="text-success">
                                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                                </div>
                                            </div>

                                            <div class="table-responsive mt-4">
                                                <table class="table table-hover mb-0 table-centered table-nowrap">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 60px;">
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-1.png" alt="" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Source 1</h5>
                                                            </td>
                                                            <td><div id="spak-chart1"></div></td>
                                                            <td>
                                                                <p class="text-muted mb-0">$ 2478</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-2.png" alt="" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Source 2</h5>
                                                            </td>
                                                            
                                                            <td><div id="spak-chart2"></div></td>
                                                            <td>
                                                                <p class="text-muted mb-0">$ 2625</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-3.png" alt="" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Source 3</h5>
                                                            </td>
                                                            <td><div id="spak-chart3"></div></td>
                                                            <td>
                                                                <p class="text-muted mb-0">$ 2856</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="text-center mt-4">
                                                <a href="#" class="btn btn-primary btn-sm">View more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-right">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>

                                        <h4 class="card-title mb-4">Recent Activity Feed</h4>

                                        <div data-simplebar style="max-height: 330px;">
                                            <ul class="list-unstyled activity-wid">
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-edit-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">28 Apr, 2020 <small class="text-muted">12:07 am</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Responded to need “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-user-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">21 Apr, 2020 <small class="text-muted">08:01 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Added an interest “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-bar-chart-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">17 Apr, 2020 <small class="text-muted">09:23 am</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Joined the group “Boardsmanship Forum”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-mail-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">11 Apr, 2020 <small class="text-muted">05:10 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Responded to need “In-Kind Opportunity”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-calendar-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">07 Apr, 2020 <small class="text-muted">12:47 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Created need “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-edit-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">05 Apr, 2020 <small class="text-muted">03:09 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Attending the event “Some New Event”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-user-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">02 Apr, 2020 <small class="text-muted">12:07 am</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Responded to need “In-Kind Opportunity”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
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
