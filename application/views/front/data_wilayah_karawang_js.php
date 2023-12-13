<script type="text/javascript">
    var base_url = $('#base_url').val();	
    $(document).ready(function(){
        tampil_data_kecamatan();
        tampil_data_desa();

    })

    function tampil_data_kecamatan()
    {
        //datatables
        table = $('#datatable1').DataTable({ 
            "lengthMenu": [[10,25,50,100, -1],[10,25,50,100,"all"]],
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "destroy": true,
		     
            "ajax": {
                "url" : base_url+"Front_data_wilayah_karawang/tampil_data_kecamatan",
                "type": "POST",
                // "data": {"s_nama_proyek":s_nama_proyek, "s_kode_proyek":s_kode_proyek},
            },
		       
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

            "drawCallback": function () {
                $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
            }
        }); 	
    }

    function tampil_data_desa()
    {
        //datatables
        table = $('#datatable2').DataTable({ 
            "lengthMenu": [[10,25,50,100, -1],[10,25,50,100,"all"]],
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "destroy": true,
		     
            "ajax": {
                "url" : base_url+"Front_data_wilayah_karawang/tampil_data_desa",
                "type": "POST",
                // "data": {"s_nama_proyek":s_nama_proyek, "s_kode_proyek":s_kode_proyek},
            },
		       
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

            "drawCallback": function () {
                $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
            }
        }); 	
    }

</script>