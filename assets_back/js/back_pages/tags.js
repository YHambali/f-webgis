var base_url = $('#base_url').val();

tampil_data();
function tampil_data()
{
	csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	csrfHash = $('.txt_csrfname').val(); // CSRF hash
	
	$.ajax({
		type : 'POST',
        data: {[csrfName]:csrfHash},
		url  : base_url+'Back_tags/tampil_data',
		async: false,
		dataType : 'JSON',
		success : function(data){
			var html = '';
			var no 	 = 0;
			// Update CSRF hash
			$('.txt_csrfname').val(data.token);

			$(data['data_tags']).each(function(k,v){    
                var action = '<a href="javascript:void(0)" onclick="edit_data(this);" data-idtags="'+v.id_tags+'" data-tags="'+v.tags+'" data-tgl = "'+v.tgl+'" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>\
                			  <a href="javascript:void(0)" onclick="delete_data(this);" data-idtags="'+v.id_tags+'"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
				no++;
				html+= '<tr>'+
			   		'<td>'+no+'</td>'+
			   		'<td>'+v.id_tags+'</td>'+
			   		'<td>'+v.tags+'</td>'+
			   		'<td>'+action+'</td>'+
			   		'</tr>';
			});			
  		    $('#show_data').html(html);
		}		
	})
}

function simpan_data()
{
	id_tags = $('#id_tags').val();
	tags 	= $('#tags').val();
	tgl 	= $('#tgl').val();
	stat 	= $('#stat').val();
	csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	csrfHash = $('.txt_csrfname').val(); // CSRF hash


	if (tags == '') 
	{
		rules = "required";field = "Tags";error_text(field, rules);		
	}
	else{
		$.ajax({
			type : 'POST',
			data: {[csrfName]:csrfHash,tgl:tgl,id_tags:id_tags,tags:tags,stat:stat},
			url  : base_url+'Back_tags/simpan_data',
			async: false,
			dataType : 'JSON',
			success : function(data){
				// Update CSRF hash
				$('.txt_csrfname').val(data.token);
				var hasil = data['hasil'];
				if (hasil == 1) {
					$('#tagsmodal').modal('hide');
					swal({
					   title  : "Success",
					   text   : "Data Berhasil Disimpan !  ",
					   icon   : "success",
					   buttons: true,
					   dangerMode: false,
					}).then(function(){       
					   // tampil_data();        
					   window.location.replace(base_url+'master/tags');
					})
				}else{
					rules = "custom";field = "Data Gagal Disimpan ! Tags Sudah Digunakan#"+hasil;error_text(field, rules);		
				}			
			},
			statusCode : {
				403 : function(){
					rules = "custom";field = "Error 403";error_text(field, rules);		
					window.location.reload();									
				}
			}		
		})
	}
}

// EDIT DATA
function edit_data($e)
{
	id_tags = $($e).attr('data-idtags');
	tags 	= $($e).attr('data-tags');
	tgl 	= $($e).attr('data-tgl');
	csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	csrfHash = $('.txt_csrfname').val(); // CSRF hash

	$('.modal-title').text('Form Edit User');
	$('#stat').val('edit');

	// FIELD
	$('#id_tags').val(id_tags);
	$('#tags').val(tags);
	$('#tagsmodal').modal('show');
}
// DELETE DATA
function delete_data($e)
{
	id_tags 	= $($e).attr('data-idtags');	
	csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	csrfHash = $('.txt_csrfname').val(); // CSRF hash
	swal({
	  title   : "Perhatian",
	  text    : "Yakin Hapus ?",
	  icon    : "warning",
	  buttons : true,
	  dangerMode: true,
	}).then((willyes)=>{
		if (willyes) {
			$.ajax({
				type      : 'POST',
				dataType  : 'JSON',
				data      : {[csrfName]:csrfHash,id_tags:id_tags},
				url       :  base_url+'Back_tags/del_data',
				success   : function(result)
				{
					// Update CSRF hash
					$('.txt_csrfname').val(result.token);
					var hasil = result['hasil'];
					if (hasil == 0) 
					{
						rules = "custom";
						field = "Data Gagal Dihapus !";
						error_text(field, rules);
						return false;
					}else
					{
					    swal({
					       title  : "Success",
					       text   : "Data Berhasil Dihapus ! ",
					       icon   : "success",					       
					       dangerMode: false,
					    }).then(function(){                
					       window.location.replace(base_url+'master/tags');
					    })
					}
				},
				statusCode : {
				403 : function(){
					rules = "custom";field = "Error 403";error_text(field, rules);		
					window.location.reload();									
				}
			}	
			})
		}else{
			return false;
		}
    })
}

// TAMBAH DATA
$('#btn_tambah').on('click', function(){
	$('.modal-title').text('Form Tambah Tags');
	$('#form')[0].reset();
	$('#stat').val('new');	
})


$('#datatable1').DataTable({
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