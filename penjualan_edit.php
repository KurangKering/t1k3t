<?php 
require_once('config/conn.php');
require_once('config/session.php');
$code = isset($_GET['booking_code']) ? $_GET['booking_code'] : '';
$code_quote = $db->quote($code);
$data_edit = $db->query("SELECT * FROM penjualan WHERE booking_code = $code_quote ");

if (!$data_edit->rowCount() > 0) {
    echo 'Sorry';
    die();
}
$result = $data_edit->fetch();
$id_maskapai     = $result['id_maskapai'];
$tanggal         = $result['tanggal'];
$booking_code    = $result['booking_code'];
$q               = $result['q'];
$hpp             = $result['hpp'];
$invoice         = $result['invoice'];
$id_tc           = $result['id_tc'];
$maskapai_option = '';
$tc_option       = '';
$konfig          = '';

try {
    $maskapai_option = $db->query("SELECT * FROM maskapai")->fetchAll();
    $tc_option       = $db->query("SELECT * FROM tc")->fetchAll();
    $konfig          = $db->query("SELECT * FROM konfig")->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
$persen = $konfig['persen'];
$fee    = $konfig['fee'];
if (isset($_POST['simpan'])) {

    $id_maskapai  = isset($_POST['maskapai']) ? $_POST['maskapai'] : '';
    $tanggal      = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';      
    $booking_code = isset($_POST['booking_code']) ? $_POST['booking_code'] : '';
    $q            = isset($_POST['q']) ? $_POST['q'] : '';
    $hpp          = isset($_POST['hpp']) ? $_POST['hpp'] : '';
    $invoice      = isset($_POST['invoice']) ? $_POST['invoice'] : '';
    $id_tc        = isset($_POST['nama_tc']) ? $_POST['nama_tc'] : '';
    try {
        $query = $db->prepare("UPDATE penjualan SET
            booking_code = :booking_code, 
            id_tc        = :id_tc,
            id_maskapai  = :id_maskapai, 
            tanggal      = :tanggal, 
            hpp          = :hpp, 
            persen       = :persen, 
            invoice      = :invoice, 
            q            = :q, 
            fee      = :fee
            WHERE booking_code = $code_quote
            ");
        $query->bindParam(':booking_code', $booking_code);
        $query->bindParam(':id_tc', $id_tc);
        $query->bindParam(':id_maskapai', $id_maskapai);
        $query->bindParam(':tanggal', $tanggal);
        $query->bindParam(':hpp', $hpp);
        $query->bindParam(':persen', $persen);
        $query->bindParam(':invoice', $invoice);
        $query->bindParam(':q', $q);
        $query->bindParam(':fee', $fee);
        $query->execute();
        $_SESSION['success'] = '<script type="text/javascript">';
        $_SESSION['success'] .= '$.notify({message: "Berhasil Merubah Data Penjualan Booking Code '. $code . '" },';
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
        else {
            $e->getMessage();
        }
    }
}
include_once('layout/header.php');
include_once('layout/sidebar.php');
?>
<div id="page-wrapper">
    <div class ="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Edit Penjualan : <?= $code ?></h3>
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
                                                <input value="<?= $persen * 100 ?>" id="persen" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
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
                                            <input value="<?= $hpp ?>" type='number' id="hpp" name="hpp" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Invoice</label>
                                        <div class="input-group">   
                                            <span class="input-group-addon">Rp</span>   
                                            <input value="<?= $invoice ?>" type='number' id="invoice" name="invoice" required class="form-control">
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
<?php include_once('layout/javascript.php') ?>
<script src="assets/js/form_penjualan.js"></script>
<script>hitung()</script>
<?php if(isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
} ?>
<?php include_once('layout/footer.php'); ?>