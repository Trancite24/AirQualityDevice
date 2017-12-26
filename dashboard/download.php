<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trancite24 AQD </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="myFunction(<?php echo $_SESSION["userId"]; ?>)" class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>T</b>24</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Trancite</b>24</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="index.php" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="index.php"><i class="fa fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo file_get_contents("http://yung.lk/airquality/dashboard/backend/UserNameTest.php?id=".$_SESSION["userId"]) ?></p>
                    <i class="fa fa-circle text-success"></i> Online
                </div>
            </div>

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="adddevice.php"><i class="fa fa-plus"></i> <span>Add Device</span></a></li>
                <li><a href="removedevice.php"><i class="fa fa-remove"></i> <span>Remove Device</span></a></li>
                <li class="active treeview"><a href="download.php"><i class="fa fa-download"></i>
                    <span>Download Data</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Download Device Data
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Device Data</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-lg-6 col-xs-6">
                <form>
                    <div class="form-group">
                        <!-- select -->
                        <div class="form-group">
                            <label>Select the Device ID</label>
                            <select class="form-control" id="deviceList" name="deviceId"></select>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-info pull-right" onclick="downloadData()">Downlaod
                            Device
                            Data
                        </button>

                    </div>
                    <div>
                        <button type="button" class="btn btn-primary pull-right" onclick="viewData()">View Device Data
                        </button>
                        <br><br>
                    </div>

                </form>
                <br>

            </div>
            <br><br>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Table With Full Features</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="tableDataPM" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Battery Level</th>
                                        <th>PM10</th>
                                        <th>PM25</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Battery Level</th>
                                        <th>PM10</th>
                                        <th>PM25</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </section>

    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2017-2018 <a href="https://adminlte.io">Trancite24 Pvt Ltd</a>.</strong> All rights
        reserved.
    </footer>

</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
    function downloadData() {
        var e = document.getElementById("deviceList");
        var x = e.options[e.selectedIndex].text;
        
        window.location="backend/DownloadTest.php?id="+x;
    }

</script>
<script>
    function viewData() {
        var t = $('#tableDataPM').DataTable();
        t
            .clear()
            .draw();
        var e = document.getElementById("deviceList");
        var deviceId = e.options[e.selectedIndex].text;
        $.ajax({

            url: 'backend/ViewDataTest.php',
            type: 'GET',
            data: {
                'id': deviceId
            },
            dataType: 'json',
            success: function (data) {
                var t = $('#tableDataPM').DataTable();
                for (i = 0; i < data.length; i++) {
                    t.row.add([
                        i,
                        data[i][0],
                        data[i][1],
                        data[i][5],
                        data[i][3],
                        data[i][4],
                        data[i][2].split("T")[0],
                        data[i][2].split("T")[1]
                    ]).draw(false);
                }

            },
            error: function (request, error) {
                alert("Unexpected Error Occurred" + error);
            }
        });
    }
</script>
<script>
    function myFunction(x) {
    
        $.ajax({

            url: 'backend/DeviceIDTest.php',
            type: 'GET',
            data: {
                'id': x
            },
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.length; i++) {
                    var select = document.getElementById("deviceList"),
                        opt = document.createElement("option");
                    opt.value = data[i];
                    opt.textContent = data[i];
                    select.appendChild(opt);
                }


            },
            error: function (request, error) {
                alert("Unexpected Error Occurred" + error);
            }
        });
    }

</script>



</body>
</html>