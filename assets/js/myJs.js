var table = $('#dataTables-example').DataTable({
	"scrollX": true,
	scrollCollapse: true,
	heightMatch: 'none',
	fixedColumns: {
		leftColumns: 1,
		rightColumns: 2
	},
	"dom": '<"toolbar">frtip'
});
$("div.toolbar").html('<span class="text-primary"><a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm pull-right" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a></span>');

