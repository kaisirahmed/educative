$(document).ready(function(){ 
	t = $("#datatable").DataTable({ 
			"columnDefs": [{ 
				"searchable": false,
				"orderable": false,
				"targets": 0 
			}],

			"order": [[ 1, 'asc' ]],
			
			drawCallback: function() {
			   $('[data-toggle="popover"]').popover();
			   $('[data-toggle="tooltip"]').tooltip({
			   		animated: 'fade',
			    	html: true
				});
			}  
		}); 

	t.on( 'order.dt search.dt', function () { 
		t.column(0).nodes().each( function (cell, i) { 
			cell.innerHTML = i+1; } ); 
	} ).draw();

	$("#datatable-buttons").DataTable({
		lengthChange:!1,
		buttons:["copy","excel","pdf","colvis"]
	}).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")

});