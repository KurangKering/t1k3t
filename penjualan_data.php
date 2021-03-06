<?php 
require_once('config/conn.php');
require_once('config/session.php');
$penjualan = '';
try {
    $penjualan = $db->query("SELECT * FROM view_penjualan ORDER BY tanggal_insert DESC")->fetchAll();
} catch (Exception $e) {
    echo $e->getMessage();
}
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
   $code = isset($_GET['booking_code']) ? $_GET['booking_code'] : '';
try {
    $query = $db->prepare("DELETE FROM penjualan WHERE booking_code = :booking_code");
    $query->bindParam(':booking_code', $code);
    $query->execute();
    $_SESSION['success'] = '<script type="text/javascript">';
    $_SESSION['success'] .= '$.notify({message: "Berhasil Menghapus Data Penjualan Booking Code ' . $code . '"},';
    $_SESSION['success'] .= '{type: "success",delay: 2000});';
    $_SESSION['success'] .= '</script>';
    header('Location: penjualan_data.php');
    exit;
} catch (PDOException $e) {
    $e->getMessage();
}
}
include_once('layout/header.php'); 
include_once('layout/sidebar.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- ======================================================= -->
        <div class="row">
            <div class="col-lg-6">
                <h3 class="page-header">Data Penjualan</h3>
            </div>
            <!-- <div class="col-lg-6">
                <span class="text-primary">
                    <a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm page-header pull-right" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a>
                </span>
            </div> -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="dataTables-example">
                            <thead>
                                <tr>
                             
                                    <th>Booking Code</th>
                                    <th>Maskapai</th>
                                    <th>Tanggal Issued</th>
                                    <th>Q</th>
                                    <th>HPP/NTA</th>
                                    <th>Percent</th>
                                    <th>NTA</th>
                                    <th>Harga Jual</th>
                                    <th>Up Salling</th>
                                    <th>Invoice</th>
                                    <th>Profit</th>
                                    <th>Fee</th>
                                    <th>Adm Fee</th>
                                    <th>Profit</th>
                                    <th>Nama TC</th>
                                    <th>Jumlah</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penjualan as $value): ?>
                                   <tr>
                                  
                                    <td><?= $value['booking_code']?></td>
                                    <td><?= $value['nama_maskapai']?></td>
                                    <td><?= $value['tanggal']?></td>
                                    <td><?= $value['q']?></td>
                                    <td><?= $value['hpp']?></td>
                                    <td><?= $value['persen'] * 100 . '%'?></td>
                                    <td><?= $value['NTA']?></td>
                                    <td><?= $value['harga_jual']?></td>
                                    <td><?= $value['up_salling']?></td>
                                    <td><?= $value['invoice']?></td>
                                    <td><?= $value['profit_1']?></td>
                                    <td><?= $value['fee']?></td>
                                    <td><?= $value['adm_fee']?></td>
                                    <td><?= $value['profit_2']?></td>
                                    <td><?= $value['nama_tc']?></td>
                                    <td><?= $value['jumlah']?></td>
                                    <td class="text-center">
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                            <a href="penjualan_edit.php?booking_code=<?= $value['booking_code'] ?>"><button class="btn btn-primary btn-xs">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button></a>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        
                                           <a onclick="return confirm('Apakah Yakin ingin menghapus data ini ?')" href="penjualan_data.php?action=delete&booking_code=<?= $value['booking_code']?>"> <button class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button></a>
                                    </p>
                                </td>
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