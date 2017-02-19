
<?php include_once('layout/header.php'); ?>

<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Tambah Penjualan</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				Informasi
			</div>
			<div class="panel-body">
				<div class="row">
					<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
						<div class="col-lg-4">


							<div class="form-group">
								<label class=" col-md-5 control-label ">Percent HPP
								</label>
								<div class="col-md-6">
									<div class="input-group">	

										<input id="persen" value="5" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class=" col-md-5 control-label ">NTA
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="nta" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class=" col-md-5 control-label ">Harga Jual
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="harga_jual" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>

						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class=" col-md-5 control-label ">Up Salling
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="up_salling" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class=" col-md-5 control-label ">Profit 1
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="profit_1" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class=" col-md-5 control-label ">Fee
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="fee" readonly="readonly" value="10000" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class=" col-md-5 control-label ">Adm Fee
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="adm_fee" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class=" col-md-5 control-label ">Profit 2
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="profit_2" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class=" col-md-5 control-label ">Jumlah
								</label>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>	
										<input id="jumlah" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
										
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Form Input
			</div>
			<div class="panel-body">
				<form role="form">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Maskapai</label>

								<select id="maskapai" name="maskapai" required class="form-control">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal Issued</label>
								<input id="tanggal" name="tanggal" required class="form-control">
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Booking Code</label>
										<input id="booking_code" name="booking_code" required class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Q</label>
										<input id="q" name="q" required class="form-control">
									</div>
								</div>
							</div>
							
							
							
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>HPP</label>
								<div class="input-group">	
									<span class="input-group-addon">Rp</span>	
									<input onchange="setInformasi()"  onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange(); id="hpp" name="hpp" required class="form-control" type="text">
								</div>
							</div>
							<div class="form-group">
								<label>Invoice</label>
								<div class="input-group">	
									<span class="input-group-addon">Rp</span>	
									<input id="invoice" name="invoice" required class="form-control" type="text">
								</div>
							</div>
							<div class="form-group">
								<label>Nama TC</label>

								<select class="form-control" id="nama_tc" name="nama_tc" required >
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<button type="submit" class="btn btn-default">Simpan</button>
							<button type="reset" class="btn btn-default">Reset Form</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>

	</div>
</div>



<script src="assets/js/penjualan.js"></script>
<?php include_once('layout/footer.php'); ?>