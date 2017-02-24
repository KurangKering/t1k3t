<?php 
require_once('config/conn.php');
require_once('config/session.php');
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
    <style type="text/css">
        .toolbar {
            float: left;
        }

        td.indexLeft { background-color: white; border-right: 1px solid black; }
            td.indexRight { background-color: white; border-left: 1px solid black; }
            div.DTFC_LeftHeadWrapper th,
            div.DTFC_RightHeadWrapper th {
                border-bottom: 1px solid white !important;
            }
            div.DTFC_LeftFootWrapper th,
            div.DTFC_RightFootWrapper th {
                border-top: 1px solid white !important;
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
                <!-- ======================================================= -->
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="page-header">Data Penjualan</h3>
                    </div>
                    <div class="col-lg-6">
                        <span class="text-primary">
                            <a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm page-header pull-right" id="showTransForm"><i class="fa fa-plus"></i> Tambah Penjualan</button></a>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"> 
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

                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/metisMenu/metisMenu.min.js"></script>
<script src="assets/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables/media/js/dataTables.bootstrap.min.js"></script>
<script src="assets/datatables/extensions/Responsive/js/dataTables.responsive.js"></script>
<script src="assets/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js"></script>
<script src="assets/bootstrap-notifty/bootstrap-notify.min.js"></script>
<script src="assets/sb-admin-2/dist/js/sb-admin-2.js"></script>
<script>
    $(document).ready( function () {
        var oTable = $('#dataTables-example').dataTable( {
            "sScrollX": "100%",
            "sScrollXInner": "150%",
            "bScrollCollapse": true,
            "fnDrawCallback": function ( oSettings ) {
                /* Need to redo the counters if filtered or sorted */
                if ( oSettings.bSorted || oSettings.bFiltered ) {
                    for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ) {
                        this.fnUpdate( i+1, oSettings.aiDisplay[i], 0, false, false );
                        this.fnUpdate( i+1, oSettings.aiDisplay[i], 6, false, false );
                    }
                }
            },
            "aoColumnDefs": [
            { "bSortable": false, "sClass": "indexLeft", "aTargets": [ 0 ] },
            { "bSortable": false, "sClass": "indexRight", "aTargets": [ -1 ] }
            ],
            "aaSorting": [[ 1, 'asc' ]]
        } );
        new $.fn.dataTable.FixedColumns( oTable, {
            "iLeftColumns": 1,
            "iRightColumns": 1
        } );
    } );
</script>
<?php if(isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
} 
?>
</body>
</html>