<script type="text/javascript">	
	var base_url = $('#base_url').val();
	var table;
	$(document).ready(function(){
		tampil_data();
		$(".select2").select2();
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
                "url": base_url+"Back_user/tampil_data",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

            "language": {
		        "paginate": {
		            "previous": "<i class='mdi mdi-chevron-left'>",
		            "next": "<i class='mdi mdi-chevron-right'>"
		        }
		    },
		    "drawCallback": function () {
		        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
		    }
        });	
	}

	function tambah_data()
	{
		$('#form-modal').modal('show');
		$('#stat').val('new');				
	}

	$('#form-data').on('submit',function(e){
		// e.stopImmediatePropagation();
		e.preventDefault();			
		$.ajax({
			type : "POST",
			data : new FormData($('#form-data')[0]),
			url  : base_url+'Back_user/simpan_data',
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
				else if (hasil == 2) 
				{
					rules = "custom";
					field = err;
					error_text(field, rules);
					e.preventDefault();
				}
				else
				{
					rules = "custom";
					field = "Data Gagal Disimpan !";
					error_text(field, rules);
					e.preventDefault();
				}
			}
		})			
	});

	function edit_data($e)
	{
		id_user = $($e).attr('data-id_user');		
		$.ajax({
			type : 'POST',
			data : {id_user:id_user},
			url  : base_url+'Back_user/edit_data',
			async: false,
			dataType : 'JSON',
			success : function(result)
			{
				var hasil= result['hasil'];
				if (hasil == 1) 
				{
					$.each(result['data_user'], function(k,v)
					{ 
						$('#stat').val('edit');
						$('#form-modal').modal('show');
						$('.modal-title').text('Edit Data User');
						$('#id_user').val(v.id_user);
						$('#username').val(v.usr);

					});
				}
				else
				{
					rules = "custom";
					field = "Data Tidak Ditemukan !";
					error_text(field, rules);
					return false;
				}							
			},			
		})
	}

	function delete_data($e)
	{				
		id_user = $($e).attr('data-id_user');		
		
		swal({
		  title   : "Perhatian",
		  text    : "Yakin Hapus ?",
		  icon    : "warning",
		  buttons : true,
		  dangerMode: true,
		}).then((willyes)=>{
			if (willyes) {
				$.ajax({
					type : 'POST',
					data : {id_user:id_user},
					url  : base_url+'Back_user/delete_data',
					async: false,
					dataType : 'JSON',
					success : function(result)
					{
																		
						var hasil = result['hasil'];
						if (hasil == 0) 
						{
							rules = "custom";
							field = "Data Gagal Dihapus !";
							error_text(field, rules);
							return false;
						}
						else
						{
						    swal({
						       title  : "Success",
						       text   : "Data Berhasil Dihapus ! ",
						       icon   : "success",					       
						       dangerMode: false,
						    }).then(function(){                
						       window.location.reload();
						    })
						}
					}
				})
			}else{
				return false;
			}
	    })
	}
		
	function close_form()
	{
		if ($('#stat').val() != 'new') 
		{
			window.location.reload();
		}
	}

	function status_aktif($a)
	{
		id = $($a).attr('data-id');
		swal({
		  title   : "Perhatian",
		  text    : "Yakin Proses ?",
		  icon    : "warning",
		  buttons : true,
		  dangerMode: true,
		}).then((willyes)=>{
			if (willyes) {
				$.ajax({
					type : 'POST',
					data : {id_user:id},
					url  : base_url+'Back_user/status_aktif',
					async: false,
					dataType : 'JSON',
					success : function(result)
					{
																		
						var hasil = result['hasil'];
						if (hasil == 0) 
						{
							rules = "custom";
							field = "Data Gagal Disimpan !";
							error_text(field, rules);
							return false;
						}
						else
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
					}
				})
			}else{
				return false;
			}
	    })
	}
		
</script>