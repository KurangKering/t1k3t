<?php 

require_once('config/conn.php');
require_once('config/session.php');
$pageLink = basename($_SERVER['PHP_SELF']) . '.php';
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

    <!-- Bootstrap Core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/metisMenu/metisMenu.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="assets/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="assets/datatables/extensions/Responsive/css/responsive.bootstrap.css" rel="stylesheet">
    <link href="assets/datatables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="assets/sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/sb-admin-2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <script src="assets/js/jquery-3.1.1.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/metisMenu/metisMenu.min.js"></script>
        
        
        <!-- DataTables JavaScript -->
        <script src="assets/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/media/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/datatables/extensions/Responsive/js/dataTables.responsive.js"></script>
        <script src="assets/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js"></script>

        

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
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
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                   <li >
                       <a href="config/proses_login.php?action=logout">
                        <i class="fa fa-power-off fa-fw"></i>
                    </a>
                    
                </li>

                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
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
                            <a  href="maskapai_data.php"><i class="fa fa-dashboard fa-fw"></i> Maskapai</a>
                        </li>
                        <li >
                            <a  href="tc.php"><i class="fa fa-dashboard fa-fw"></i> TC</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">