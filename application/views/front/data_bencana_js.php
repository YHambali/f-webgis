<script type="text/javascript">
    var base_url = $('#base_url').val();	
    $(document).ready(function(){
        tampil_data_bencana();
        tampil_data_rekam_bencana();
    })

    function tampil_data_bencana()
    {
        //datatables
        table = $('#datatable1').DataTable({ 
            "lengthMenu": [[10,25,50,100, -1],[10,25,50,100,"all"]],
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "destroy": true,
		     
            "ajax": {
                "url" : base_url+"Front_data_bencana/tampil_data_bencana",
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

    function tampil_data_rekam_bencana()
    {
        //datatables
        table = $('#datatable2').DataTable({ 
            "lengthMenu": [[10,25,50,100, -1],[10,25,50,100,"all"]],
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "destroy": true,
		     
            "ajax": {
                "url" : base_url+"Front_data_bencana/tampil_data_rekam_bencana",
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