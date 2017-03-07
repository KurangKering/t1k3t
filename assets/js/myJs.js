var table_penjualan = $('#dataTables-example').DataTable({
	"scrollX": true,
	"order": [],
	fixedColumns: {
		leftColumns: 2,
		rightColumns: 2
	},
	"dom": '<"toolbar_penjualan">frtip'
});
$("div.toolbar_penjualan").html('<span class="text-primary"><a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a></span>');


var table_maskapai = $('#table-maskapai').DataTable({

	"lengthChange": false,
	"pageLength": 5,
	"pagingType": "simple",
	"dom": '<"toolbar_maskapai">frtip',
	initComplete: function(){
		$("div.toolbar_maskapai")
		.html('<span class="text-primary"><a href="penjualan_tambah.php"><button type="button" class="btn btn-primary" id="tambah_maskapai">Tambah Maskapai</button></a></span>');          
	},
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
	"pageLength": 5,
	"lengthChange": false,
	"pagingType": "simple",
	"dom": '<"toolbar_TC">frtip',
	initComplete: function(){
		$("div.toolbar_TC")
		.html('<span class="text-primary"><a href="penjualan_tambah.php"><button type="button" class="btn btn-primary" id="tambah_maskapai">Tambah TC</button></a></span>');          
	},
	"fnDrawCallback": function ( oSettings ) {
		/* Need to redo the counters if filtered or sorted */
		if ( oSettings.bSorted || oSettings.bFiltered ) {
			for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ) {
				this.fnUpdate( i+1, oSettings.aiDisplay[i], 0, false, false );
			}
		}
	}
});
