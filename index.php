<!DOCTYPE HTML>
<?php
session_start();

if(isset($_SESSION['sess_user']) && $_SESSION['type']==0)
header("Location: store.php");
if(isset($_SESSION['sess_user']) && $_SESSION['type']==1)
header("Location: seller.php");
$bool=0;
	if(isset($_GET['id']))
	{
		$bool=1;
		$id=$_GET['id'];
	}
?>
<html>
	<head>
		<title>Home</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		<link href="css/style1.css" rel="stylesheet" />
		<script type="text/javascript"></script>

		<script>
		    // You can also use "$(window).load(function() {"
			$(function () {

				// Slideshow 1
				$("#slider1").responsiveSlides({
					maxwidth: 1600,
					speed: 600
				});
			});
		</script>
	</head>
	<body>
		<div class="wrap">
			<!----start-Header---->
			<div class="header">

				<div class="clear"> </div>
				<div class="header-top-nav">

				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
				<!----start-logo---->
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="logo" /></a>
				</div>
				<!----end-logo---->
				<!----start-top-nav---->
				<div class="top-nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="registration.php">Register</a></li>
						<li><a href="login.php">Login</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		<!--start-image-slider---->
		<div class="wrap">
			<div class="image-slider">
				<!-- Slideshow 1 -->
				<ul class="rslides" id="slider1">
					<li><img src="images/1.png" alt=""></li>
					<li><img src="images/2.png" alt=""></li>
					<li><img src="images/1.png" alt=""></li>
				</ul>
				<!-- Slideshow 2 -->
			</div>
			<!--End-image-slider---->
		</div>



		<div class="clear"> </div>
		<div class="wrap">
			<div class="content">
				<div class="content-grids">
					<div id="wrap" align="center">

						<?php

						$con=mysqli_connect('localhost','root','');
						mysqli_select_db($con,'hotspot') or die("cannot select DB");
						if($bool==0)
						{
							$i=1;
							$query=mysqli_query($con,"select price,ram,image,model_name,cid,storage,model_id from model");
							while($row=mysqli_fetch_row($query))
							{

								echo "<ul>
								<li id=$i>
								<img src=$row[2] class='items'style='height:250px;'/>
								<br clear='all' />
								<a href='single.php?mid=$row[6]'>
								<div style='background-color:#081230; color:white; height:60px;'>$row[3]</br>Price=$row[0]/-Rs</br>($row[1]GB RAM $row[5]GB Storage)</br></div>
								</a>  </li>
								</ul>";
								$i=$i+1;

							}
						}
						else{
							$i=1;
							$query=mysqli_query($con,"select price,ram,image,model_name,cid,storage,model_id from model  where cid=$id");
							while($row=mysqli_fetch_row($query))
							{

								echo "<ul>
								<li id=$i>
								<img src=$row[2] class='items'style='height:250px;'/>
								<br clear='all' />
								<a href='single.php?mid=$row[6]'>
								<div style='background-color:#081230; color:white; height:60px;'>$row[3]</br>Price=$row[0]/-Rs</br>($row[1]GB RAM $row[5]GB Storage)</br></div>
								</a></li>
								</ul>";
								$i=$i+1;

							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="content-sidebar">
				<h4>Categories</h4>
				<ul>
					<?php
					$con = mysqli_connect('localhost', 'root', '');
					mysqli_select_db($con, 'hotspot') or die("cannot select DB");
					$query = mysqli_query($con, "select cid, comp from company");
					while($row = mysqli_fetch_row($query))
						echo "<li><a href='index.php?id=$row[0]'>$row[1] Mobiles</a></li>";
					echo "<li><a href='index.php'>See All</a></li>";
					?>
				</ul>
			</div>
		</div>
	</body>
</html>
