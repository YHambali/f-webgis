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
		        "url" : base_url+"Back_kat_kegiatan/tampil_data",
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

	function tambah_data()
	{
		// SHOW FORM PROYEK
		$('#form-modal').modal('show');
		$('.modal-title').text('Form Input Kategori Kegiatan');
		$('#stat').val('new');
	}	

	function edit_data($a)
	{
		id = $($a).attr('data-id');
		$.ajax({
			type : "POST",
			data : {id_kat_kegiatan:id},
			url  : base_url+'Back_kat_kegiatan/edit_data',
			dataType : "json",
			success : function(result)
			{
				$.each(result['cek_data'], function(k,v)
				{
					$('#form-modal').modal('show');
					$('.modal-title').text('Form Edit Kategori Kegiatan');
					$('#stat').val('edit');

					// FORM DATA
					$('#id_kat_kegiatan').val(v.id_kat_kegiatan);
					
					$('#nm_kat_kegiatan').val(v.nm_kat_kegiatan);

				})
			}
		})
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
                  data      : {id_kat_kegiatan:id},
                  url       : base_url+'Back_kat_kegiatan/delete_data',
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

	$("#form-data").on('submit',function(e)
	{
		e.preventDefault(e);	
		boleh =1;	
		if (boleh == 1) 
		{
			$.ajax({
				type : "POST",
				data : new FormData($('#form-data')[0]),
				url  : base_url+'Back_kat_kegiatan/simpan_data',
				dataType    : 'json',
				processData:false,
				contentType:false,
				cache:false,
				async: false,
				success : function(result)
				{	
					var hasil = result['hasil'];
					var err   = result['err'];
					if (hasil == 1) 
					{
						swal({
						   title  : "Success",
						   text   : "Data Berhasil Disimpan ! ",
						   icon   : "success",					       
						   dangerMode: false,
						}).then(function(){                
						   window.location.reload();
						})
					}
					else
					{
						rules = "custom";
						field = err;
						error_text(field, rules);
						e.preventDefault();
					}
					
				}
			})	
		}						
	})	
</script>