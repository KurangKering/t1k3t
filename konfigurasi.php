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
$old_fee    = $konfig['fee'];
$old_persen = $konfig['persen'];
if (isset($_POST['simpan'])) 
{
    $_SESSION['message'] = '';
    $new_fee = isset($_POST['fee']) ? $_POST['fee'] : '';
    $new_persen = isset($_POST['persen']) ? $_POST['persen'] : ''; 
    $new_pass = isset($_POST['new_pass']) ? $_POST['new_pass'] : '';
    $new_pass_confirm = isset($_POST['new_pass_confirm']) ? $_POST['new_pass_confirm'] : ''; 
    if ($old_fee != $new_fee || ($old_persen * 100) != floatval($new_persen))
    {
        $sql         = 'UPDATE konfig SET ';
        $data        = array();
        $param       = array();
        if ($old_fee != $new_fee) 
        {
            $data[]      = "fee = :new_fee";
            $param[':new_fee'] = $new_fee; 
            $_SESSION['message'] .= '<script type="text/javascript">';
            $_SESSION['message'] .= '$.notify({message: "Berhasil Merubah Fee" },';
            $_SESSION['message'] .= '{type: "success",delay: 2000});';
            $_SESSION['message'] .= '</script>';
        }
        if (($old_persen * 100) != floatval($new_persen)) 
        {
            $data[] = "persen = :new_persen";
            $param[':new_persen'] = $new_persen / 100;
            $_SESSION['message'] .= '<script type="text/javascript">';
            $_SESSION['message'] .= '$.notify({message: "Berhasil Merubah Data Persen" },';
            $_SESSION['message'] .= '{type: "success",delay: 2000});';
            $_SESSION['message'] .= '</script>';
        }
        $query_data             = implode (", ", $data);
        if ($query_data) 
        {
            $sql                    .= $query_data;
            $sql                    .= " WHERE fee = :old_fee";
            $param[':old_fee'] = $old_fee;
            $query                  = $db->prepare($sql);
            $query->execute($param);
        }
    }
    if ($new_pass) {
        if ($new_pass_confirm) {
            if ($new_pass != $new_pass_confirm) {
                $_SESSION['message'] .= '<script type="text/javascript">';
                $_SESSION['message'] .= '$.notify({message: "Password baru dengan password repeat tidak sama !" },';
                $_SESSION['message'] .= '{type: "danger",delay: 2000});';
                $_SESSION['message'] .= '</script>';
            }
            else
            {
               $sql = 'UPDATE user SET password = :new_password';
               $query = $db->prepare($sql);
               $query->bindParam(':new_password', $new_pass);
               $query->execute();
               $_SESSION['message'] .= '<script type="text/javascript">';
               $_SESSION['message'] .= '$.notify({message: "Berhasil Merubah Password" },';
               $_SESSION['message'] .= '{type: "success",delay: 2000});';
               $_SESSION['message'] .= '</script>';
           }
       }
       else {
        $_SESSION['message'] .= '<script type="text/javascript">';
        $_SESSION['message'] .= '$.notify({message: "New Password repeat harus diisi !" },';
        $_SESSION['message'] .= '{type: "danger",delay: 2000});';
        $_SESSION['message'] .= '</script>';
    }
}
else if ($new_pass_confirm) {
    $_SESSION['message'] .= '<script type="text/javascript">';
    $_SESSION['message'] .= '$.notify({message: "Password baru harus diisi !" },';
    $_SESSION['message'] .= '{type: "danger",delay: 2000});';
    $_SESSION['message'] .= '</script>';
}
header('Location: konfigurasi.php');
exit;
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
                                <label>Password Baru</label>
                                <input class="form-control" type="password" name="new_pass" placeholder="Kosongkan jika tidak ingin merubah password">
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password Baru</label>
                                <input class="form-control" type="password" name="new_pass_confirm" placeholder="Kosongkan jika tidak ingin merubah password">
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
<?php if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
} 
?>
<?php include_once('layout/footer.php'); ?>