var table_penjualan = $('#dataTables-example').DataTable({
	"scrollX": true,
	"order": [],
	fixedColumns: {
		leftColumns: 1,
		rightColumns: 2
	},
	"dom": '<"toolbar">frtip'
});
$("div.toolbar").html('<span class="text-primary"><a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a></span>');


var table_maskapai = $('#table-maskapai').DataTable({
	bFilter: false, 
	bInfo: false,
	"lengthChange": false,
	"pagingType": "simple",
	"fnDrawCallback": function ( oSettings ) {
		/* Need to redo the counters if filtered or sorted */
		if ( oSettings.bSorted || oSettings.bFiltered ) {
			for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ) {
				this.fnUpdate( i+1, oSettings.aiDisplay[i], 0, false, false );
			}
		}
	}

});
var table_tc = $('#table-tc').DataTable({
	bFilter: false, 
	bInfo: false,
	"lengthChange": false,
	 "pagingType": "simple",
	"fnDrawCallback": function ( oSettings ) {
		/* Need to redo the counters if filtered or sorted */
		if ( oSettings.bSorted || oSettings.bFiltered ) {
			for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ) {
				this.fnUpdate( i+1, oSettings.aiDisplay[i], 0, false, false );
			}
		}
	}
});
