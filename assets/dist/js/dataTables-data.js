/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	"use strict";
	const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    var temp = new Date();

	$('#datable_1').DataTable();

    $('#datable_2').DataTable({ "lengthChange": false});

	$('#datable_3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            {
  				extend: 'excelHtml5',
                title: 'Laporan Daftar Slip Gaji Bulan '+months[temp.getMonth()]+` ${temp.getFullYear()}`,
                // messageTop: 'Laporan Daftar Absen Bulan '+months[temp.getMonth()]+` ${temp.getFullYear()}`,
  				exportOptions: {
  					columns: ':not(:last-child)'
  				}
  			},
            'csvHtml5'
        ]
    });
    
    $('#datable_absensi').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            {
                extend: 'excelHtml5',
                // messageTop: 'Laporan Daftar Absen Bulan '+months[temp.getMonth()]+` ${temp.getFullYear()}`,
                title: 'Laporan Daftar Absen Bulan '+months[temp.getMonth()]+` ${temp.getFullYear()}`
            },
            'csvHtml5'
        ]
    });

} );