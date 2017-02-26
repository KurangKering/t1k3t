<?php 
require_once('config/conn.php');
require_once('config/session.php');
?>
<?php include_once('layout/header.php'); ?>
<?php include_once('layout/sidebar.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- ======================================================= -->
        <div class="row">
            <div class="col-lg-6">
                <h3 class="page-header">Data Master</h3>
            </div>
            <!-- <div class="col-lg-6">
                <span class="text-primary">
                    <a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm page-header pull-right" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a>
                </span>
            </div> -->
        </div>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Data Maskapai</p>
                </div>
                    <div class="panel-body">
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Data TC</p>
                </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('layout/javascript.php') ?>
<?php if(isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
} 
?>
<?php include_once('layout/footer.php'); ?>