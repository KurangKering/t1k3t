<?php 
require_once('config/conn.php');
require_once('config/session.php');
$konfig = '';
try {
    $konfig = $db->query("SELECT * FROM konfig")->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
$old_fee = $konfig['fee'];
$old_persen = $konfig['persen'];

if (isset($_POST['simpan'])) {
    $new_fee                = isset($_POST['fee']) ? $_POST['fee'] : '';
    $new_persen             = isset($_POST['persen']) ? $_POST['persen'] : '';   
    $sql                  = 'UPDATE konfig SET ';
    $data                   = array();
    if ($old_fee            != $new_fee) {
        $data[]                 = "fee = :new_fee"; 

    }
    if (($old_persen * 100) != floatval($new_persen)) {
        $data[]                 = "persen = :new_persen";
    }

    $query_data = implode (", ", $data);
    if ($query_data) {
        $sql                    .= $query_data;
        $sql                    .= " WHERE fee = :old_fee";
        $query                  = $db->prepare($sql);
        if ($old_fee            != $new_fee) {
            $query->bindParam(':new_fee', $new_fee);
        }
        if (($old_persen * 100) != floatval($new_persen)) {
            $new_persen = $new_persen / 100 ;
            $query->bindParam(':new_persen', $new_persen);

        }
        $query->bindParam(':old_fee', $old_fee);
        $query->execute();
        header('Location: konfigurasi.php');
        exit();
    }
}
include_once('layout/header.php'); 
include_once('layout/sidebar.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- ======================================================= -->
        <div class="row">
            <div class="col-lg-6">
                <h3 class="page-header">Konfigurasi</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <label>Fee</label>
                                <div class="input-group">   
                                    <span class="input-group-addon">Rp</span>   
                                    <input value="<?= $old_fee ?>" name="fee" id="fee" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Persen</label>
                                <div class="input-group">   
                                <input value="<?= $old_persen * 100 ?>" name="persen" id="persen" class="form-control" type="number">
                                    <span class="input-group-addon">%</span>   
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password"  placeholder="Kosongkan jika tidak ingin merubah password">
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input class="form-control" type="password" placeholder="Ulangi Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" name="simpan" value="simpan">
                                <button type="button" class="btn btn-default">cancel</button>
                            </div>
                        </form>
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