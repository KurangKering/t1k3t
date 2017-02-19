<?php include_once('layout/header.php'); ?>
<div class="row">
	<div class="col-lg-6">
		<h3 class="page-header">Data Penjualan</h3>
	</div>
	<div class="col-lg-6">
		<span class="text-primary">
			<a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm page-header pull-right" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a>
		</span>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data - Data Penjualan
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="dataTables-example">
					<thead>
						<tr>
							<th>Tanggal Issued</th>
							<th>Nama TC</th>
							<th>Maskapai</th>
							<th>Booking Code</th>
							<th>Q</th>
							<th>HPP</th>
							<th>Persen</th>
							<th>NTA</th>
							<th>Harga Jual</th>
							<th>Up Salling</th>
							<th>Invoice</th>
							<th>Fee</th>
							<th>Profit 1</th>
							<th>Adm Fee</th>
							<th>Profit 2</th>
							<th>Jumlah</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>Edit | Hapus</td>
						</tr>
						<tr>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>anak kucing</td>
							<td>Edit | Hapus</td>
						</tr><tr>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>anak kucing</td>
						<td>Edit | Hapus</td>
					</tr>
				</tbody>
			</table>
			<!-- /.table-responsive -->

		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->




<script>
	$(document).ready(function() {
		var table = $('#dataTables-example').DataTable({
			"scrollX": true,
			scrollCollapse: true,
			heightMatch: 'none',
			fixedColumns:   {
				leftColumns: 1,
				rightColumns: 1
			}
		});

	});
</script>
<?php include_once('layout/footer.php'); ?>