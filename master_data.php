<?php 
require_once('config/conn.php');
require_once('config/session.php');
$maskapai = '';
$tc = '';
try {
    $maskapai = $db->query("SELECT * FROM maskapai")->fetchAll();
    $tc = $db->query("SELECT * FROM tc ")->fetchAll();
} catch (Exception $e) {
    echo $e->getMessage();
}
include_once('layout/header.php'); 
include_once('layout/sidebar.php'); ?>
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
                        <span class="text-primary"><a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm " id="showTransForm"><i class="fa fa-plus"></i> Tambah Maskapai</button></a></span>
                        <table width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="table-maskapai">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Maskapai</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php for ($i=0; $i < 20; $i++) {  ?>
                              
                            
                                <?php foreach ($maskapai as $value): ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['status'] ?></td>
                                        <td>Edit | Hapus </td>
                                    </tr>
                                <?php endforeach ?>

                                <?php  }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>Data TC</p>
                    </div>
                    <div class="panel-body">
                        <span class="text-primary"><a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm " id="showTransForm"><i class="fa fa-plus"></i> Tambah TC</button></a></span>
                        <table width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="table-tc">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama TC</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($tc as $value): ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $value['nama_tc'] ?></td>
                                        <td><?= $value['status'] ?></td>
                                        <td>Edit | Hapus </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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