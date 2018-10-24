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
		<title>Mobilestore Website Template | Home :: W3layouts</title>
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
				<ul>
					<li><a href="registration.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="#">Delivery</a></li>
					<li><a href="#"><span>shopping cart</span></a></li>
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>

				<li><a href="store.php">Featured</a></li>
				<li><a href="contact.php">Contact</a></li>
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


	 			 <?php
	 				 function getid($name)
	 				 {
	 					 $con=mysqli_connect('localhost','root','');
	 					 mysqli_select_db($con,'hotspot') or die("cannot select DB");
	 					 $query=mysqli_query($con,"SELECT cid FROM company WHERE comp='$name'");
	 					 $row=mysqli_fetch_row($query);
	 					 $n=$row[0];
	 					 return $n;
	 				 }
	 			 ?>

		    	<div class="content-sidebar">
		    		<h4>Categories</h4>
						<ul>

							<li><?php $a="Asus"; $id=getid($a);echo "<a href='index.php?id=$id'>" ?>Asus Mobiles</a></li>
							<li><?php $a="Oppo"; $id=getid($a);echo "<a href='index.php?id=$id'>" ?>Oppo Mobile</a></li>
							<li><?php $a="Asus"; $id=getid($a);echo "<a href='index.php?id=$id'>" ?>Samsung Mobiles</a></li>
							<li><?php $a="Motorola"; $id=getid($a);echo "<a href='index.php?id=$id'>" ?>Motorola Mobiles</a></li>
							<li><?php $a="Nokia"; $id=getid($a);echo "<a href='index.php?id=$id'>" ?>Nokia Mobiles</a></li>
							<li><?php $a="Honor"; $id=getid($a);echo "<a href='index.php?id=$id'>" ?>Honor Mobiles</a></li>

							<li><a href="#">Apple Mobiles</a></li>
							<li><a href="#">Lenovo Mobiles</a></li>
							<li><a href="#">Google Mobile</a></li>
							<li><a href="#">Fly Mobile</a></li>
							<li><a href="#">Fujezone Mobiles </a></li>
							<li><a href="#">HTC</a></li>
							<li><a href="#">LG Mobiles</a></li>
							<li><a href="#">Longtel Mobile</a></li>
							<li><a href="#">Maxx</a></li>
							<li><a href="#">Micromax Mobiles </a></li>
							<li><a href="#">Samsung Mobiles</a></li>
							<li><a href="#">Sony Ericsson Mobiles</a></li>
							<li><a href="#">Wynncom Mobiles</a></li>
						</ul>
		    	</div>
		    </div>
		    <div class="clear"> </div>
		    </div>
		<div class="footer">
			<div class="wrap">
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>Our Info</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Latest-News</h3>

				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Store Location</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<h3>Order-online</h3>
					<p>080-1234-56789</p>
					<p>080-1234-56780</p>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>News-Letter</h3>
					<form>
						<input type="text"><input type="submit" value="go" />
					</form>
					<h3>Follow Us:</h3>
					 <ul>
					 	<li><a href="#"><img src="images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>
					 </ul>
				</div>
			</div>
		</div>

		<div class="clear"> </div>

		</div>
	</body>
</html>
