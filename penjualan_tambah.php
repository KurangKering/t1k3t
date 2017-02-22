<?php 
require_once('config/conn.php');
require_once('config/session.php');
$id_maskapai 	= '';
$tanggal 		= '';
$booking_code 	= '';
$q 				= '';
$hpp 			= '';
$invoice 		= '';
$id_tc 			= '';
$maskapai_option = '';
$tc_option		 = '';
$konfig			 = '';
try {
	$maskapai_option = $db->query("SELECT * FROM maskapai")->fetchAll();
	$tc_option = $db->query("SELECT * FROM tc")->fetchAll();
	$konfig = $db->query("SELECT * FROM konfig")->fetch();
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
}
$persen = $konfig['persen'] * 100;
$fee = $konfig['fee'];
if (isset($_POST['simpan'])) {
//array(8) { ["maskapai"]=> string(8) "AIR ASIA" ["tanggal"]=> string(10) "02/15/2017" ["booking_code"]=> string(3) "123" ["q"]=> string(4) "1131" ["hpp"]=> string(2) "12" ["invoice"]=> string(1) "2" ["nama_tc"]=> string(6) "Meimei" ["simpan"]=> string(4) "Save" } 
//
	$id_maskapai = isset($_POST['maskapai']) ? $_POST['maskapai'] : '';
	$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
	$booking_code = isset($_POST['booking_code']) ? $_POST['booking_code'] : '';
	$q = isset($_POST['q']) ? $_POST['q'] : '';
	$hpp = isset($_POST['hpp']) ? $_POST['hpp'] : '';
	$invoice = isset($_POST['invoice']) ? $_POST['invoice'] : '';
	$id_tc = isset($_POST['nama_tc']) ? $_POST['nama_tc'] : '';
	$duplicate_message = '';
	try {
		$query = $db->prepare("INSERT INTO penjualan(
			booking_code, 
			id_tc,
			id_maskapai, 
			tanggal, 
			hpp, 
			persen, 
			invoice, 
			q, 
			adm_fee) 
			VALUES(:booking_code, :id_tc, :id_maskapai, :tanggal, :hpp, (SELECT persen FROM konfig), :invoice, :q, (SELECT fee FROM konfig))");
		$query->bindParam(':booking_code', $booking_code);
		$query->bindParam(':id_tc', $id_tc);
		$query->bindParam(':id_maskapai', $id_maskapai);
		$query->bindParam(':tanggal', $tanggal);
		$query->bindParam(':hpp', $hpp);
		$query->bindParam(':invoice', $invoice);
		$query->bindParam(':q', $q);
		$query->execute();

		$_SESSION['success'] = '<script type="text/javascript">';
		$_SESSION['success'] .= '$.notify({message: "Berhasil Menambah Data Penjualan" },';
		$_SESSION['success'] .= '{type: "success",delay: 2000});';
		$_SESSION['success'] .= '</script>';
		header('Location: penjualan_data.php');
	} catch (PDOException $e) {
		if ($e->errorInfo[1] == 1062) {
			$_SESSION['error'] = '<script type="text/javascript">';
			$_SESSION['error'] .= '$.notify({message: "Booking Code Sudah Ada" },';
			$_SESSION['error'] .= '{type: "danger",delay: 3000});';
			$_SESSION['error'] .= '</script>';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Menu Penjualan</title>
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/metisMenu/metisMenu.min.css" rel="stylesheet">
	<link href="assets/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="assets/datatables/extensions/Responsive/css/responsive.bootstrap.css" rel="stylesheet">
	<link href="assets/datatables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet">
	<link href="assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<style type="text/css">
		.toolbar {
			float: left;
		}
	</style>
	<link href="assets/sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="assets/sb-admin-2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
 <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <![endif]-->
 <!-- jQuery -->
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Admin Panel</a>
			</div>
			<ul class="nav navbar-top-links navbar-right">
				<li >
					<a href="config/proses_login.php?action=logout">
						<i class="fa fa-power-off fa-fw"></i>
					</a>
				</li>
			</ul>
			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li >
							<a class="" href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>
						<li >
							<a class="" href="penjualan_data.php"><i class="fa fa-dashboard fa-fw"></i> Penjualan</a>
						</li>
						<li >
							<a href="maskapai_data.php"><i class="fa fa-dashboard fa-fw"></i> Maskapai</a>
						</li>
						<li >
							<a href="tc.php"><i class="fa fa-dashboard fa-fw"></i> TC</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="page-wrapper">
			<div class="container-fluid">
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
														<input value="<?= $persen ?>" id="persen" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
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
														<input id="nta" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class=" col-md-5 control-label ">Harga Jual
												</label>
												<div class="col-md-6">
													<div class="input-group">	
														<span class="input-group-addon">Rp</span>	
														<input id="harga_jual" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
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
														<input id="up_salling" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class=" col-md-5 control-label ">Profit 1
												</label>
												<div class="col-md-6">
													<div class="input-group">	
														<span class="input-group-addon">Rp</span>	
														<input id="profit_1" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class=" col-md-5 control-label ">Fee
												</label>
												<div class="col-md-6">
													<div class="input-group">	
														<span class="input-group-addon">Rp</span>	
														<input value="<?= $fee ?>" id="fee" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
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
														<input id="adm_fee" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class=" col-md-5 control-label ">Profit 2
												</label>
												<div class="col-md-6">
													<div class="input-group">	
														<span class="input-group-addon">Rp</span>	
														<input id="profit_2" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class=" col-md-5 control-label ">Jumlah
												</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">Rp</span>	
														<input id="jumlah" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
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
								<form role="form" method="POST">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Maskapai</label>
												<select id="maskapai" name="maskapai" required class="form-control">
													<?php foreach ($maskapai_option as $mas): ?>
														<?php if ($id_maskapai == $mas['id_maskapai']): ?>
															<option selected value="<?= $mas['id_maskapai'] ?>"><?= $mas['nama'] ?> </option>
														<?php else: ?>
															<option value="<?= $mas['id_maskapai'] ?>"><?= $mas['nama'] ?> </option>
														<?php endif ?>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group">
												<label>Tanggal Issued</label>
												<input  value="<?= $tanggal ?>" id="tanggal" data-provide="datepicker" type="date" name="tanggal" required class="form-control readonly">
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>Booking Code</label>
														<input value="<?= $booking_code ?>" id="booking_code" name="booking_code" type='text' required class="form-control">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>Q</label>
														<input value ="<?= $q ?>" id="q" type='number' name="q" required class="form-control">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>HPP</label>
												<div class="input-group">	
													<span class="input-group-addon">Rp</span>	
													<input value="<?= $hpp ?>" type='number' id="hpp" name="hpp" required class="form-control" type="text">
												</div>
											</div>
											<div class="form-group">
												<label>Invoice</label>
												<div class="input-group">	
													<span class="input-group-addon">Rp</span>	
													<input value="<?= $invoice ?>" type='number' id="invoice" name="invoice" required class="form-control" type="text">
												</div>
											</div>
											<div class="form-group">
												<label>Nama TC</label>
												<select class="form-control" id="nama_tc" name="nama_tc" required >
													<?php foreach ($tc_option as $_tc): ?>
														<?php if ($id_tc == $_tc['id_tc']): ?>
															<option selected value="<?= $_tc['id_tc'] ?>"><?= $_tc['nama_tc'] ?> </option>
														<?php else: ?>
															<option value="<?= $_tc['id_tc'] ?>"><?= $_tc['nama_tc'] ?> </option>
														<?php endif ?>
													<?php endforeach ?>
												</select>
											</div>
											<input type="submit" class="btn btn-default" name="simpan" value="Save">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/metisMenu/metisMenu.min.js"></script>
	<script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/js/penjualan.js"></script>
	<script src="assets/bootstrap-notifty/bootstrap-notify.min.js"></script>
	<script src="assets/sb-admin-2/dist/js/sb-admin-2.js"></script>
	<script>
		$('#tanggal').datepicker({
			format: 'yyyy/mm/dd',
			todayHighlight: true,
		});
		$(".readonly").on('keydown paste', function(e){
			e.preventDefault();
		});
		$('#bts').click(function () {
		})
	</script>
	<?php if(isset($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	} ?>
</body>
</html>