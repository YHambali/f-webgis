<script type="text/javascript">
	var base_url = $('#base_url').val();	
	$(document).ready(function(){
		$("#form-data").on('submit',function(e)
		{
			e.preventDefault(e);	
			boleh =1;	
			if (boleh == 1) 
			{
				$.ajax({
					type : "POST",
					data : new FormData($('#form-data')[0]),
					url  : base_url+'Back_media/simpan_data',
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

		// MYTAB #sending ID to url
			$('#myTab a').click(function(e) {
			  e.preventDefault();
			  $(this).tab('show');
			});

			// store the currently selected tab in the hash value
			$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
			  var id = $(e.target).attr("href").substr(1);
			  window.location.hash = id;
			});

			// on load of the page: switch to the currently selected tab
			var hash = window.location.hash;
			$('#myTab a[href="' + hash + '"]').tab('show');
		// End MY Tab
	})

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
                  data      : {id_media:id},
                  url       : base_url+'Back_media/delete_data',
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