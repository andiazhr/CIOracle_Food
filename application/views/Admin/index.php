<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="title" sizes="76x76" href="<?php echo base_url()?>/assetsadmin/img/title.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assetsadmin/img/title.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Administrator itsFood</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url()?>/assetsadmin/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url()?>/assetsadmin/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url()?>/assetsadmin/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url()?>/assetsadmin/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url()?>/assetsadmin/css/themify-icons.css" rel="stylesheet">

</head>
<body onload="startTime()">

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
				
                <a href="http://www.creative-tim.com" class="simple-text">
                   <img src="<?php echo base_url()?>/assetsadmin/img/title.png" style="width:26px;height:26px;">&nbsp Its Food
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo site_url('Admin/index')?>">
                        <i class="ti-home"></i>
						<b><p>Home</p></b>
                    </a>
                </li>
                <li >
                    <a href="<?php echo site_url('Admin/makanan')?>">
                    <img src="<?php echo base_url()?>/assets/images/chickenleg.png" style="width:30px; height:30px; margin-right:12px;"/>
                        <b>Makanan</b>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Admin/minuman')?>">
                    <img src="<?php echo base_url()?>/assets/images/drink1.png" style="width:30px; height:30px; margin-right:12px;"/>
                        <b>Minuman</b>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Admin/pesanan')?>">
                       <img src="<?php echo base_url()?>/assets/images/menu9.png" style="width:35px; height:35px;margin-right:10px">
                        <b>Pesanan</b>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Admin/dataperhari')?>">
                        <img src="<?php echo base_url()?>/assets/images/logout6.png" style="width:35px; height:35px;margin-right:10px">
                       <b>Logout</b>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Database ItsFood</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        
		<div class="content">
					<center style="margin-top:-25px; font-size:36px;">بسم الله الرحمن الرحيم</center>
            <div class="container-fluid">
                <div class="row" style=" margin-top:10px">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
										<p>Transaksi Hari Ini</p>
                                            Rp. <?php echo number_format($total_pendapatan) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-time"></i>Transaksi Hari Ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-info text-center">
                                        <img src="<?php echo base_url()?>/assets/images/chickenleg.png" style="width:50px; height:50px;">
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
										<p>Stok Makanan</p>
                                            <?php echo ($stok_makanan) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-check-box"></i> Stok Makanan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-primary text-center">
                                            <i class="ti-time"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                        <p>Jam</p>
                                        <div id="jam"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-time"></i> Jam Sekarang
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
										<p>Tanggal</p>
                                            Rp. <?php echo number_format($total_pendapatan) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-time"></i>Transaksi Hari Ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-info text-center">
                                        <img src="<?php echo base_url()?>/assets/images/drink1.png" style="width:50px; height:50px;">
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
										<p>Stok Minuman</p>
                                            <?php echo ($stok_minuman) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-check-box"></i> Stok Minuman
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                        <p>Tanggal</p>
                                        <?php echo date('d M Y') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Tanggal Hari Ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
					<p>Dengan menyebut nama Allah yang maha pengasih dan penyayang, InsyaAllah, semoga usaha warung makan
                    yang kami buka ini lancar dan berkah, serta dapat memuaskan setiap konsumen yang beli di 
                    Warung Makan kami</p>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Its Food
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Its Food</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url()?>/assetsadmin/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>/assetsadmin/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url()?>/assetsadmin/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url()?>/assetsadmin/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url()?>/assetsadmin/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url()?>/assetsadmin/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url()?>/assetsadmin/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-user',
            	message: "Welcome to <b>Database</b> - Administrator"

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

    <script>
        function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('jam').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
        }
    </script>

</html>
