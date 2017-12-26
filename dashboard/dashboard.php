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
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


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
                <li class="active treeview"><a href="dashboard.php"><i class="fa fa-dashboard"></i>
                    <span>Dashboard</span></a></li>
                <li><a href="adddevice.php"><i class="fa fa-plus"></i> <span>Add Device</span></a></li>
                <li><a href="removedevice.php"><i class="fa fa-remove"></i> <span>Remove Device</span></a></li>
                <li><a href="download.php"><i class="fa fa-download"></i> <span>Download Data</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo file_get_contents("http://yung.lk/airquality/dashboard/backend/DeviceNumberTest.php?id=".$_SESSION["userId"]) ?></h3>

                            <p>Devices Registered</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo file_get_contents("http://yung.lk/airquality/dashboard/backend/AvgPM10Test.php?id=".$_SESSION["userId"]) ?></h3>
                            <p>Average PM 10 (All Devices)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo file_get_contents("http://yung.lk/airquality/dashboard/backend/AvgPM25Test.php?id=".$_SESSION["userId"]) ?></h3>

                            <p>Avarage PM 2.5 (All Devices)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>12 / hour</h3>

                            <p>Data Record Frequency</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="col-lg-3 col-xs-6">
                <!-- select -->
                <div class="form-group">
                    <!-- select -->
                    <div class="form-group">
                        <label>Select the Device ID</label>
                        <select class="form-control" id="deviceList" name="deviceId" onclick="loadData();">
                        </select>
                    </div>
                </div>
            </div>
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li class="pull-left header"><i class="fa fa-inbox"></i> Today Data Chart</li>
                        </ul>
                        <div class="tab-content no-padding">


                            <div class="chart tab-pane active" id="revenue-chart"
                                 style="position: relative; height: 500px;"></div>

                        </div>
                        <!-- /.nav-tabs-custom -->
                </section>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2017-2018 <a href="https://adminlte.io">Trancite24 Pvt Ltd</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    function myFunction(id) {
    

        $.ajax({

            url : 'backend/DeviceIDTest.php',
            type : 'GET',
            data : {
                'id' : id
            },
            dataType:'json',
            success : function(data) {
                for (i = 0; i < data.length; i++) {
                    var select = document.getElementById("deviceList"),
                        opt = document.createElement("option");
                    opt.value = data[i];
                    opt.textContent = data[i];
                    select.appendChild(opt);
                }
                $(document).ready(function(e){
                    $("#deviceList").trigger("click");
                });


            },
            error : function(request,error)
            {
                alert("Unexpected Error Occurred"+error);
            }
        });
    }
</script>

<script>
    
    function loadData() {
        $("#revenue-chart").empty();
        
        var Area_chart = Morris.Area({
            element: 'revenue-chart',
            behaveLikeLine: true,
            parseTime: false,
            data: [],
            xkey: 'y',
            ykeys: ['pm10', 'pm2.5'],
            labels: ['pm10', 'pm2.5'],
            pointFillColors: ['#707f9b'],
            pointStrokeColors: ['#ffaaab'],
            lineColors: ['#f26c4f', '#00a651', '#00bff3'],
            redraw: true
        });
        
        
        

        var e = document.getElementById("deviceList");
        var deviceId = e.options[e.selectedIndex].text;

        $.ajax({
            type: "GET",
            url: "backend/TodayDataTest.php",
            data: {'id': deviceId},
            dataType: 'json',
            success : function (data) {
                console.log(data);
                Area_chart.setData(data);
                Area_chart.empty();
            }
        });

    }

</script>


</body>
</html>