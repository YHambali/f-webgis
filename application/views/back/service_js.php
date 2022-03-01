<script type="text/javascript">
	var base_url = $('#base_url').val();	
	$(document).ready(function(){
		tampil_data();
		$('.select2').select2();

		// TINY MICE EDITOR
	

		if($("#elm1").length > 0){
		    tinymce.init({
		        selector: "textarea#elm1",
		        height:300,
		        plugins: [
		            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		            "save table contextmenu directionality emoticons template paste textcolor"
		        ],
		        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
		        style_formats: [
		            {title: 'Bold text', inline: 'b'},
		            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		            {title: 'Example 1', inline: 'span', classes: 'example1'},
		            {title: 'Example 2', inline: 'span', classes: 'example2'},
		            {title: 'Table styles'},
		            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		        ]
		        ,
		        setup: function (editor) {
		            editor.on('change', function () {
		                editor.save();
		            });
		        }
		    });
		}

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
		        "url" : base_url+"Back_service/tampil_data",
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
		window.location.href=base_url+"konten/service/add";
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
                  data      : {id_service:id},
                  url       : base_url+'Back_service/delete_data',
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
				url  : base_url+'Back_service/simpan_data',
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
						   window.location.href=base_url+"konten/service";
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