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
						<h2 style="margin-top:7px; text-align:center;">Data <strong>Makanan</strong></h2>
						
						<a href="<?php echo base_url(); ?>admin/addmakanan">
							<button style="margin-top:-7px; margin-bottom:15px; text-align:center; float:left;" class="btn btn-primary">
								Tambah Data
							</button>
						</a> 
						<button class="btn btn-danger" id="stok" style="margin-top:-7px; margin-bottom:15px; margin-left:570px; text-align:center; float: left;">Hitung Stok</button>
						<p id="hasil" style="margin-left: 20px; float:left"></p>
						<table class="table table-striped table-hover table-bordered">
                        <?php $nomor=1; ?>
								<tr>
									<th style="font-size: 16px;">No</th>
									<th style="font-size: 16px;">Nama Makanan</th>
									<th style="font-size: 16px;">Topping</th>
									<th style="font-size: 16px;">Gambar Makanan</th>
									<th style="font-size: 16px;">Icon</th>
									<th style="font-size: 16px;">Deskripsi</th>
									<th style="font-size: 16px;">Harga</th>
									<th style="font-size: 16px;">Stok</th>
									<th style="font-size: 16px;">Action</th>

								</tr>
                                <?php 
                                foreach ($makanan as $key){

                                ?>
								<tr>
                                    <td><?php echo $nomor; ?></td>
									<td><?php echo $key->NAMA_MAKANAN ?></td> 
									<td><?php echo $key->TOPPING ?></td> 
									<td><center><img src="<?php echo base_url('assets/upload/'. $key->GAMBAR_MAKANAN);?>" alt="" width="200px" height="150px"></center></td>
									<td><center><img src="<?php echo base_url('assets/upload/'. $key->ICON_MK);?>" alt="" width="100px" height="100px"></center></td>
									<td><?php echo $key->DESKRIPSI_MAKANAN ?></td>
									<td><?php echo number_format($key->HARGA_MAKANAN) ?></td>
									<td><?php echo $key->STOK_MAKANAN ?></td>

									<td>
										<a href="<?php echo base_url() ?>admin/readmakanan/<?php echo $key->ID_MAKANAN ?>"><button class="btn btn-info">Detail </button></a> <br><br>
										<a href="<?php echo base_url() ?>admin/updatemakanan/<?php echo $key->ID_MAKANAN ?>"><button class="btn btn-primary">Edit</button></a> <br><br>
										<a href="<?php echo base_url() ?>admin/deletemakanan/<?php echo $key->ID_MAKANAN ?>"><button class="btn btn-danger" onClick="return confirm('apakah anda ingin menghapus data ?')">Hapus</button></a>
				
									</td>
								</tr>	
                            <?php $nomor++; ?>
                            <?php 
                            }
                            ?>
						</table>
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
	
	<script>
	document.getElementById("stok").addEventListener("click", function(){
    document.getElementById("hasil").innerHTML = "<?php echo $stok_makanan ?>";
	});
	</script>
	
</html>
