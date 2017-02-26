var table = $('#dataTables-example').DataTable({
	"scrollX": true,
	"order": [],
	fixedColumns: {
		leftColumns: 1,
		rightColumns: 2
	},
	"dom": '<"toolbar">frtip'
});
$("div.toolbar").html('<span class="text-primary"><a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm pull-right" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a></span>');

function deletePenjualan( booking_code )
{
	var conf = confirm("Yakin Ingin Menghapus Data Penjualan ?");
	if (conf == true) {
		$.ajax({
			dataType: 'json',
			url : 'config/ajax_call.php',
			type : 'post',
			data: {booking_code:booking_code,type:"delete"},
			success : function() {
				table.ajax.reload();
			}
		});
	}
}