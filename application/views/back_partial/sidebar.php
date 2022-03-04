<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background :#003655;">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="<?php echo base_url()?>dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span>Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-folder-3-fill"></i>
                        <span>Data Wilayah</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?php echo base_url() ?>konten/data-kecamatan"><i class="ri-focus-line"></i>Data Kecamatan</a></li>
                        <li><a href="<?php echo base_url() ?>konten/data-desa"><i class="ri-focus-line"></i>Data Desa</a></li>                                         
                    </ul>
                </li>

                <li><a href="<?php echo base_url() ?>konten/data-bencana"><i class="ri-folder-3-fill"></i> <span>Data Bencana</span></a></li>
                <li><a href="<?php echo base_url() ?>konten/data-rekam-bencana"><i class="ri-folder-3-fill"></i> <span>Data Rekam Bencana</span></a></li>
                <li><a href="<?php echo base_url() ?>konten/data-daerah-rawan-bencana"><i class="ri-folder-3-fill"></i> <span>Daerah Rawan Bencana</span></a></li>
                <li><a href="<?php echo base_url() ?>data-user"><i class="ri-folder-3-fill"></i> <span>Data User</span></a></li>
                <li><a href="<?php echo base_url() ?>konten/blog"><i class="ri-folder-3-fill"></i> <span>Blog</span></a></li>
                
                <!-- <li><a href="<?php echo base_url() ?>user"><i class="ri-folder-3-fill"></i> <span>Data User</span></a></li> -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->