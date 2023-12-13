<!doctype html>
<html lang="en">

    <head>        
        <?php 
            $this->load->view('front_partial/title-meta'); 
            $this->load->view('front_partial/head-css');
        ?>
        <!-- leaflet -->
        <link href="<?php echo base_url() ?>assets_front/leaflet/leaflet.css" rel="stylesheet" type="text/css">
        <style>
            #map { height: 550px; }
        </style>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Pencarian Data</h4>
                                        <form method="GET">
                                            <div class="row">
                                                <div hidden>
                                                    <input type="text" id="s_nm_desa2" value="<?php echo $this->input->get('s_nm_desa');?>">
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Pilih Status Daerah</label>
                                                        <select class="form-control select2" style="width:100%;" name="s_status_daerah" id="s_status_daerah">
                                                            <option value="">Pilih Status Daerah</option>
                                                            <?php  
                                                                $status_daerah = $this->input->get('s_status_daerah');
                                                                $data_status_daerah = ['Rawan','Tidak Rawan'];
                                                                foreach ($data_status_daerah as $s)                            
                                                                {                                              
                                                                    $selected = "";
                                                                    if ($s == $status_daerah) 
                                                                    {
                                                                        $selected = "selected";
                                                                    }
                                                                ?>

                                                                <option value="<?php echo $s; ?>" <?php echo $selected; ?>><?php echo $s; ?>                                                                </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>                                            
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Pilih Kecamatan</label>
                                                        <select class="form-control select2" style="width:100%;" onchange="pilih_desa();" name="s_nm_kecamatan" id="s_nm_kecamatan">
                                                            <option value="">Pilih Kecamatan</option>
                                                            <?php  
                                                                $nm_kecamatan = $this->input->get('s_nm_kecamatan');
                                                                foreach ($data_kecamatan as $s)                            
                                                                {                                              
                                                                    $selected = "";
                                                                    if ($s['nm_kecamatan'] == $nm_kecamatan) 
                                                                    {
                                                                        $selected = "selected";
                                                                    }
                                                                ?>

                                                                <option value="<?php echo $s['nm_kecamatan'] ?>" <?php echo $selected; ?>><?php echo $s['nm_kecamatan'] ?>
                                                                </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>                                            
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Pilih Desa</label>
                                                        <select class="form-control select2" style="width:100%;" name="s_nm_desa" id="s_nm_desa">
                                                            <option value="">Pilih Desa</option>                                                            
                                                        </select>
                                                    </div>                                            
                                                </div>
                                                                                                                                            
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Cari Data</button>
                                                        <a href="<?php echo base_url().'peta-sebaran-daerah-rawan-bencana'?>" class="btn btn-warning btn-sm"><i class="fas fa-ban"></i> Reset</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>                                                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title mb-3">Peta</h4>

                                        <div>
                                            <!-- Start Leaflet-->
                                            <div id="map"></div>
                                            <!-- End Leaftlet -->
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <!-- end row -->                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <?php $this->load->view('front/peta_rawan_bencana_modal') ?>

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
        <!-- Leaflet -->
        <script src="<?php echo base_url() ?>assets_front/leaflet/leaflet.js"></script>

        <script>
            $(document).ready(function() {
                base_url = $('#base_url').val();
                s_status_daerah = $('#s_status_daerah').val();
                s_nm_kecamatan  = $('#s_nm_kecamatan').val();
                s_nm_desa       = $("#s_nm_desa2").val();
                
                // $('#s_nm_desa option[value="Sumur Kondang"]').prop('selected', 'selected').change();

                if (s_nm_kecamatan != '') 
                {
                    nm_kecamatan = $('#s_nm_kecamatan').val();                
                    html         = '<option value="">Pilih Desa</option>';
                    $.ajax({
                        type    : "POST",
                        url     : base_url+'Front_peta_rawan_bencana/pilih_desa',
                        data    : {nm_kecamatan:nm_kecamatan},
                        dataType: "JSON",
                        success : function(result)
                        {
                            $.each(result['cek_data'],function(k,v)
                            {
                                selected="";
                                if (v.nm_desa == s_nm_desa) 
                                {
                                    selected="selected";
                                }
                                html+='<option '+selected+' value="'+v.nm_desa+'">'+v.nm_desa+'</option>';
                            });

                            $("#s_nm_desa").html(html);
                        }
                    })

                    

                }
            
                var map = L.map('map').setView([-6.3819301,107.3590552], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var myfeaturegroup = L.featureGroup().addTo(map).on('dblclick', onMapClick);
           
                $.ajax({
                    type : "POST",
                    url  : base_url+'Front_peta_rawan_bencana/tampil_data_peta_sebaran',
                    data : {s_status_daerah:s_status_daerah,s_nm_kecamatan:s_nm_kecamatan,s_nm_desa:s_nm_desa},
                    dataType : "json",
                    success : function(result)
                    {
                        $.each(result['cek_data'], function(k,v)
                        {                        
                            if (v.status_rawan_bencana == 'Rawan') 
                            {
                                var myIcon = L.icon({
                                    iconUrl: base_url+'assets_front/leaflet/images/marker2-red-icon.png',                
                                });
                            
                            }
                            else
                            {
                                var myIcon = L.icon({
                                    iconUrl: base_url+'assets_front/leaflet/images/marker2-icon.png',                
                                });
                            }

                            var Datamarker = L.marker([parseFloat(v.longitude),parseFloat(v.latitude)],{icon: myIcon}).addTo(myfeaturegroup)
                            .bindPopup('<table><tr><td>Wilayah</td><td>:</td><td>'+v.nm_kecamatan+' - '+v.nm_desa+'</td></tr><tr><td>Status</td><td>:</td><td>'+v.status_rawan_bencana+'</td></tr><tr><td>Total</td><td>:</td><td>'+v.total_bencana+'</td></tr></table><br><small><i>Double Click For Detail</i></small>')
                            .openPopup();


                            Datamarker.id = v.id_rawan_bencana;
                            Datamarker.id_desa = v.id_desa;

                            // var CircleMarker = L.circle([parseFloat(v.longitude),parseFloat(v.latitude)], {
                            //     color: markcolor,
                            //     fillColor: markcolor,
                            //     fillOpacity: 0.5,
                            //     radius: 500
                            // }).addTo(myfeaturegroup);                         
                        
                            // CircleMarker.id = v.id_rawan_bencana;
                       
                       
                        })
                    }
                })
            });

            

            function onMapClick(e) 
            {
                $('#form-modal').modal('show');
                $('.modal-title').text('Detail Data Daerah Rawan Bencana');
                var id      = e.layer.id;
                var id_desa = e.layer.id_desa;
                var html    = '';
                var html2   = '';
                var no      = 1;

                $.ajax({
                    type : "POST",
                    url  : base_url+'Front_peta_rawan_bencana/detail_data_peta_sebaran',
                    dataType : "json",
                    data : {id:id,id_desa:id_desa},
                    success : function(result)
                    {
                        $.each(result['cek_data_daerah_rawan_bencana'], function(k,v)
                        {
                            if (v.status_rawan_bencana  == 'Rawan') 
                            {
                                status_rawan_bencana = '<span class="badge badge-pill badge-danger">RAWAN</span>';
                            }
                            else
                            {
                                status_rawan_bencana = '<span class="badge badge-pill badge-success">TIDAK RAWAN</span>';
                            }
                            
                            html+='<table class="table">'+
                                '<tr>'+
                                '<td>Status</td><td>:</td><td>'+status_rawan_bencana+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '<td>Nama Wilayah</td><td>:</td><td>'+v.nm_kecamatan+' - '+v.nm_desa+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '<td>Koordinat</td><td>:</td><td>'+v.longitude+','+v.latitude+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '<td>Keterangan Wilayah</td><td>:</td><td>'+v.ket_wilayah+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '<td>Keterangan Rawan Bencana</td><td>:</td><td>'+v.ket_rawan_bencana+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '<td>Jumlah Bencana Terjadi</td><td>:</td><td>'+v.total_bencana+', <a data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo" href="#collapseTwo">Lihat Detail</a></td>'+
                                '</tr>'+
                            '</table>';                        
                        });
                        $('#prev_detail').html(html);
                        
                        $.each(result['cek_data_rekam_bencana'], function(k,v)
                        {
                           file_dokumentasi = '<a href="'+base_url+'file/rekam_bencana/'+v.file_dokumentasi+'" target="_blank" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-file-alt"></i> Lihat Dokumentasi</a>';

                           html2+='<tr><td>'+no+++'</td><td>'+v.tgl_bencana+'</td><td>'+v.nm_bencana+'</td><td>'+v.ket_bencana+'</td><td>'+file_dokumentasi+'</td></tr>'                                   
                        });

                        $('#prev_detail_rekam_bencana').html(html2);
                    }
                })
                // alert("You clicked the map at" + e.layer.id);
            }

            function pilih_desa()
            {
                nm_kecamatan = $('#s_nm_kecamatan').val();                
                html         = '<option value="">Pilih Desa</option>';
                $.ajax({
                    type    : "POST",
                    url     : base_url+'Front_peta_rawan_bencana/pilih_desa',
                    data    : {nm_kecamatan:nm_kecamatan},
                    dataType: "JSON",
                    success : function(result)
                    {
                        $.each(result['cek_data'],function(k,v)
                        {
                            html+='<option value="'+v.nm_desa+'">'+v.nm_desa+'</option>';
                        });

                        $("#s_nm_desa").html(html);
                    }
                })
            }
            
        </script>


    </body>
</html>
