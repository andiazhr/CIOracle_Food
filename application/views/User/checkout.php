<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url()?>/assets/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>/assets/bootstraps.css" rel="stylesheet" type="text/css" />
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>itsFood</title>
    <style>
        * {
            box-sizing: border-box;
        }


        .kolom1 {
            width: 8.333%;
        }

        .kolom2 {
            width: 16.66%;
        }

        .kolom3 {
            width: 25%;
        }

        .kolom4 {
            width: 33.33%;
        }

        .kolom5 {
            width: 41.66%;
        }

        .kolom6 {
            width: 50%;
        }

        .kolom7 {
            width: 58.33%;
        }

        .kolom8 {
            width: 66.66%;
        }

        .kolom9 {
            width: 75%;
        }

        .kolom10 {
            width: 83.33%;
        }

        .kolom11 {
            width: 91.66%;
        }

        .kolom12 {
            width: 100%;
        }

        [class*="kolom"] {
            float: left;
        }
    </style>
</head>
<body>
<div class="kolom12" id="navbar">
    <div class="kolom5" id="menu">
        <div class="dropdown left">
            <a href="<?php echo site_url('user/index'); ?>"><button class="dropbtn">
                Home
            </button></a>
        </div>

        <div class="dropdown">
            <button class="dropbtn">
                <a href="#myMenu">Menu</a>
            </button>
        </div>
		
		<div class="dropdown">
            <button class="dropbtn">
                <a href="#">Tentang Kami</a>
            </button>
        </div>
    </div>
	
	<div class="kolom2" id="logo">
        <a href="<?php echo site_url('user/index'); ?>"><div class="logo"><img src="<?php echo base_url()?>/assets/images/chickenleg.png" alt="Jet" style="width:60px;height:60px;"></div></a>
    </div>
	
	<div class="kolom5" id="menu">

        <div class="dropdown">
            <button class="dropbtn">
                <a href="#Pesan">Pesan</a>
            </button>
        </div>
		
		<div class="dropdown">
            <button class="dropbtn">
                <a href="#">Galeri</a>
            </button>
        </div>
	
        <div class="dropdown">
            <button class="dropbtn">
                <a href="#Lokasi">Lokasi Kami</a>
            </button>
        </div>
    </div>
</div>
	
    <div class="kolom12 content">
	
	<div class="kolom12 imageback">
		<div class="backcolor2">
			<h3 style="float: left; text-indent:110px; margin-top: 100px;; margin-bottom: 70px;">Pesanan telah terkirim. Terima kasih telah mengunjungi website kami dan sudah membeli :)</h3>
			<img src="<?php echo base_url()?>/assets/images/checked3.png" style="width:50px; height:50px; margin-left:20px; margin-top: 90px">
		</div>
	</div>

    <div class="kolom12 footer">
        <div class="kolom3">
            <div class="contenttfoot"><img src="<?php echo base_url()?>/assetsadmin/img/title.png" style="width:100px; height:100px; margin-right:10px;"> ITS FOOD</div>
            <div class="line2"></div>
            <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
            <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
            <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>           
            <span class="dot"></span>
        </div>
        <div class="kolom9">
            <div class="contenttfoot2">ITS FOOD</div>
			<div class="contentfoot">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
            <div class="line3"></div>
            <span class="dot2"></span><span class="dot2"></span><span class="dot2"></span><span class="dot2"></span>
            <span class="dot2"></span><span class="dot2"></span><span class="dot2"></span><span class="dot2"></span>
            <span class="dot2"></span><span class="dot2"></span><span class="dot2"></span><span class="dot2"></span>
            <span class="dot2"></span> 
            
        </div>
        <div class="copy">Copyright 2018 <a href="#" class="w">ItsFood.Or.Id.</a> All Rights Reserved.</div>
    </div>

		<script>
			// When the user scrolls the page, execute myFunction
			window.onscroll = function () { myFunction() };

			// Get the navbar
			var navbar = document.getElementById("navbar");

			// Get the offset position of the navbar
			var sticky = navbar.offsetTop;

			// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
			function myFunction() {
				if (window.pageYOffset >= sticky) {
					navbar.classList.add("sticky")
				} else {
					navbar.classList.remove("sticky");
				}
			}
		</script>
	
		<script>
		// Add active class to the current button (highlight it)
			var header = document.getElementById("navbar");
			var btns = header.getElementsByClassName("dropbtn");
			for (var i = 0; i < btns.length; i++) {
				btns[i].addEventListener("click", function() {
				var current = document.getElementsByClassName("active");
				current[0].className = current[0].className.replace(" active", "");
				this.className += " active";
				});
			}
		</script>
		
		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlidesMakanan");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}    
			x[myIndex-1].style.display = "block";  
			setTimeout(carousel, 5000); // Change image every 5 seconds
		}	
		</script>
		
		<script>
			var myIndex2 = 0;
			carousel2();

			function carousel2() {
			var i2;
			var x2 = document.getElementsByClassName("mySlidesMinuman");
			for (i2 = 0; i2 < x2.length; i2++) {
				x2[i2].style.display = "none";  
			}
			myIndex2++;
			if (myIndex2 > x2.length) {myIndex2 = 1}    
			x2[myIndex2-1].style.display = "block";  
			setTimeout(carousel2, 5000); // Change image every 5 seconds
		}	
		</script>
		
		<script>
		filterSelection("all")
		function filterSelection(c) {
		var x, i;
		x = document.getElementsByClassName("column");
		if (c == "all") c = "";
		for (i = 0; i < x.length; i++) {
			w3RemoveClass(x[i], "show");
			if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
			}
		}

		function w3AddClass(element, name) {
		var i, arr1, arr2;
		arr1 = element.className.split(" ");
		arr2 = name.split(" ");
		for (i = 0; i < arr2.length; i++) {
			if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
			}
		}

		function w3RemoveClass(element, name) {
		var i, arr1, arr2;
		arr1 = element.className.split(" ");
		arr2 = name.split(" ");
		for (i = 0; i < arr2.length; i++) {
			while (arr1.indexOf(arr2[i]) > -1) {
			arr1.splice(arr1.indexOf(arr2[i]), 1);     
				}
			}
			element.className = arr1.join(" ");
		}
		// Add active class to the current button (highlight it)
		var header = document.getElementById("myMenu");
		var menu = header.getElementsByClassName("menubar");
		for (var i = 0; i < menu.length; i++) {
 		 menu[i].addEventListener("click", function() {
		    var current = document.getElementsByClassName("active");
		    current[0].className = current[0].className.replace(" active", "");
		    this.className += " active";
		  });
		}
		</script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://github.com/kswedberg/jquery-smooth-scroll/blob/master/jquery.smooth-scroll.min.js"></script>
		<script>
		$('.smooth').on('click', function() {
			$.smoothScroll({
				scrollElement: $('body'),
				scrollTarget: '#' + this.id
			});
    
			return false;
		});
		</script>

		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		
		<script>
			AOS.init();
		</script>

		<script>
		let today = new Date().toISOString().substr(0, 10);
		document.querySelector("#today").value = today;
		document.querySelector("#today2").valueAsDate = new Date();
		</script>
</body>
</html>
