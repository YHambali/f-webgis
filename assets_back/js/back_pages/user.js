var url = window.location.origin;
var base_url = url+"/faylogic/";
// Field
var id_user;
var nama;
var username;
var password;
var tgl;
var stat;
var status;


tampil_data();
function tampil_data(){
	csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	csrfHash = $('.txt_csrfname').val(); // CSRF hash
	
	$.ajax({
		type : 'POST',
        data: {[csrfName]:csrfHash },
		url  : base_url+'master/user/tampil-data',
		async: false,
		dataType : 'JSON',
		success : function(data){
			var html = '';
			var no 	 = 0;
			// Update CSRF hash
			$('.txt_csrfname').val(data.token);

			$(data['data_user']).each(function(k,v){    
				st_ket = 'pasif';
				var checked = '';
				if (v.status == 1) {
					var st_ket = 'aktif';
					checked = 'checked';
				}                                        
				var status = '<div class="custom-control custom-switch mb-2" dir="ltr">\
                                            <input type="checkbox" data-iduser="'+v.id_user+'" data-status="'+v.status+'" onclick="c_status(this);" class="custom-control-input" id="customSwitch1'+v.id_user+'" '+checked+'>\
                                            <label class="custom-control-label" for="customSwitch1'+v.id_user+'">'+st_ket+'</label>\
                                        </div>';
                var action = '<a href="javascript:void(0)" onclick="edit_data(this);" data-iduser="'+v.id_user+'" data-nama="'+v.nama+'" data-username="'+v.username+'" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>\
                			  <a href="javascript:void(0)" onclick="delete_data(this);" data-iduser="'+v.id_user+'" data-nama="'+v.nama+'" data-username="'+v.username+'" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
				no++;
				html+= '<tr>'+
			   		'<td>'+no+'</td>'+
			   		'<td>'+v.id_user+'</td>'+
			   		'<td>'+v.nama+'</td>'+
			   		'<td>'+v.username+'</td>'+
			   		'<td><i>view protected</i></td>'+
			   		'<td>'+status+'</td>'+
			   		'<td>'+action+'</td>'+
			   		'</tr>';
			});			
  		    $('#show_data').html(html);
		}		
	})
}

function simpan_data()
{
	id_user = $('#id_user').val();
	nama 	= $('#nama').val();
	username= $('#username').val();
	password= $('#password').val();
	tgl 	= $('#tgl').val();
	stat 	= $('#stat').val();
	csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	csrfHash = $('.txt_csrfname').val(); // CSRF hash

	if (nama == ''){
		rules = "required";field = "Nama";error_text(field, rules);
	}else if (username == ''){
		rules = "required";field = "Username";error_text(field, rules);		
	}else if (password == ''){
		rules = "required";field = "Password";error_text(field, rules);		
	}else{
		$.ajax({
			type : 'POST',
			data: {[csrfName]:csrfHash,tgl:tgl,id_user:id_user,nama:nama,username:username,password:password,status:0,stat:stat},
			url  : base_url+'master/user/simpan-data',
			async: false,
			dataType : 'JSON',
			success : function(data){
				// Update CSRF hash
				$('.txt_csrfname').val(data.token);
				var hasil = data['hasil'];
				if (hasil == 1) {
					$('#usermodal').modal('hide');
					swal({
					   title  : "Success",
					   text   : "Data Berhasil Disimpan !  ",
					   icon   : "success",
					   buttons: true,
					   dangerMode: false,
					}).then(function(){       
					   // tampil_data();        
					   window.location.replace(base_url+'master/user');
					})
				}else{
					rules = "custom";field = "Data Gagal Disimpan ! Username Sudah Digunakan#"+hasil;error_text(field, rules);		
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

function c_status($e)
{
	id_user  = $($e).attr('data-iduser');
	status   = $($e).attr('data-status');
	csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	csrfHash = $('.txt_csrfname').val(); // CSRF hash

	$.ajax({
		type : 'POST',
        data: {id_user:id_user,status:status,[csrfName]:csrfHash},
		url  : base_url+'master/user/upd-status',
		async: false,
		dataType : 'JSON',
		success : function(data){
			// Update CSRF hash
			$('.txt_csrfname').val(data.token);
			tampil_data();
		}
	})
}

// EDIT DATA
function edit_data($e)
{
	id_user 	= $($e).attr('data-iduser');
	nama 		= $($e).attr('data-nama');
	username 	= $($e).attr('data-username');

	$('.modal-title').text('Form Edit User');
	$('#stat').val('edit');

	// FIELD
	$('#id_user').val(id_user);
	$('#nama').val(nama);
	$('#username').val(username);
	$('#usermodal').modal('show');
}

// DELETE DATA
function delete_data($e)
{
	id_user 	= $($e).attr('data-iduser');	
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
				data      : {[csrfName]:csrfHash,id_user:id_user},
				url       :  base_url+'Back_user/del_data',
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
					       window.location.replace(base_url+'master/user');
					    })
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
	$('.modal-title').text('Form Tambah User');
	$('#form-user')[0].reset();
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