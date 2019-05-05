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
<body>

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
            <li>
                    <a href="<?php echo site_url('Admin/index')?>">
                        <i class="ti-home"></i>
						<b><p>Home</p></b>
                    </a>
                </li>
                <li class="active">
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
            <div class="container-fluid">
                <div class="row">
					<h2 style="text-align: center; margin-top:7px;">Tambah <strong>Data Makanan</strong></h2>
					<form action="<?php echo base_url(); ?>admin/add_makanan" method="post" enctype="multipart/form-data">
						<h5>
                            Nama Makanan : <br><input type="text" maxlength="11" class="form-control" name="NAMA_MAKANAN" placeholder="Masukkan Nama Makanan"><br>

                            Topping : <br><input type="text" class="form-control" name="TOPPING" placeholder="Masukkan Nama Makanan"><br>

							Gambar Makanan: <br><input type="file" name="GAMBAR_MAKANAN" placeholder="Masukkan Gambar"><br>

							Icon : <br><input type="file" name="ICON_MK" placeholder="Masukkan Gambar"><br>

							Deskripsi : <br><textarea type="text" minlength=100 maxlength="170" class="form-control" name="DESKRIPSI_MAKANAN" placeholder="Masukkan Deskripsi"></textarea><br>
		
							Harga : <br><input type="number" class="form-control" name="HARGA_MAKANAN" placeholder="Masukkan Harga"><br>

							Stok : <br><input type="number" class="form-control" name="STOK_MAKANAN" placeholder="Masukkan Stok"><br>

						<button class="btn btn-primary" type="submit"> Simpan</button>&nbsp
						<button class="btn btn-default" type="reset"> Reset</button></h5>
					</form>
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
	
</html>
