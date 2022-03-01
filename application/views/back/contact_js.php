<script type="text/javascript">
	var base_url = $('#base_url').val();	
	

	$("#form-data").on('submit',function(e)
	{
		e.preventDefault(e);	
		boleh =1;	
		if (boleh == 1) 
		{
			$.ajax({
				type : "POST",
				data : new FormData($('#form-data')[0]),
				url  : base_url+'Back_contact/simpan_data',
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
						   window.location.href=base_url+"konten/contact";
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