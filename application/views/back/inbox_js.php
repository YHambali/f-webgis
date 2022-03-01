<script type="text/javascript">
	var base_url = $('#base_url').val();	
	$(document).ready(function(){
		tampil_data();
	})

	function tampil_data()
	{
		//datatables
		table = $('#datatable1').DataTable({ 
		    "lengthMenu": [[10,25,50,100, -1],[10,25,50,100,"all"]],
		    "processing": true, 
		    "serverSide": true, 
		    "order": [], 
		    "destroy": true,
		     
		    "ajax": {
		        "url" : base_url+"Back_inbox/tampil_data",
		        "type": "POST",
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

	
	function delete_data($a)
	{
		id = $($a).attr('data-id');
		swal({
            title   : "Perhatian",
            text    : "Yakin Proses ?",
            icon    : "info",
            buttons : true,
            dangerMode: false,
        }).then((willyes)=>{
            if (willyes) {
                $.ajax({
                  type      : 'POST',
                  dataType  : 'JSON',   
                  data      : {id_inbox:id},
                  url       : base_url+'Back_inbox/delete_data',
                  success   : function(result){
                    var hasil = result['hasil'];
                    var err   = result['err'];
                        if (hasil == 1) {
                        swal({
                            title  : "Perhatian",
                            text   : "Data Berhasil Dihapus ! ",
                            icon   : "success",
                            // buttons: true,
                            dangerMode: false,
                        }).then(function(){
                            window.location.reload();
                        }) 
                    }
                    else
                    {
                        rules = "custom";
                        field = err;
                        error_text(field,rules);
                        return false;
                    }
                  }
                })
            }else{
                return false;
            }
        })
	}
	
</script>