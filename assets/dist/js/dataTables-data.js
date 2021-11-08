/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	"use strict";
	
	$('#datable_1').DataTable();

    $('#datable_2').DataTable({ "lengthChange": false});

	$('#datable_3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            {
  				extend: 'excelHtml5',
  				exportOptions: {
  					columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
  				}
  			},
            'csvHtml5',
            'pdfHtml5'
        ]
    });

} );