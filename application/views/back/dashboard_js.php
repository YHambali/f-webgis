<script type="text/javascript">	
	var base_url = $('#base_url').val();
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
</script>