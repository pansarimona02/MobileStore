<!DOCTYPE HTML>
<?php
ob_start();
session_start();
$ex=0;
if(!isset($_SESSION['sess_user']))
{
	$ex=1;
}
else {
	$cid=$_SESSION['sess_user'];
}
?>
<html>
	<head>
		<title>cart</title>

		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<script src="js/imagezoom.js"></script>
		<!-- FlexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
					<!----->
					<script>
		$(document).ready(function(){
			$(".menu_body").hide();
			//toggle the componenet with class menu_body
			$(".menu_head").click(function(){
				$(this).next(".menu_body").slideToggle(600);
				var plusmin;
				plusmin = $(this).children(".plusminus").text();

				if( plusmin == '+')
				$(this).children(".plusminus").text('-');
				else
				$(this).children(".plusminus").text('+');
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
					<?php
						if($ex==1)
								echo "<li><a href='login.php'>login</a></li>";
						else {
							echo "<li><a href='logout.php'>logout</a></li>
							<li><a href='#'>Delivery</a></li>
							<li><a href='#'>Checkout</a></li>
							<li><a href='#'>My account</a></li>";
						}?>
				</ul>
	  </div>
		<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>

		<div class="top-header">
		<div class="wrap">
		<!----start-logo---->
		<div class="logo"><a href="index.html"><img src="images/logo.png" title="logo" /></a></div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="store.php">Store</a></li>
				<li><a href="store.php">Featured</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->

		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    <div class="content-grids">
	    	<div class="details-page">
		    <div class="back-links">
		    			<ul>
		    				<li><a href="#">Home</a><img src="images/arrow.png" alt=""></li>
		    				<li><a href="#">Product</a><img src="images/arrow.png" alt=""></li>
		    				<li><a href="#">Product-Details</a><img src="images/arrow.png" alt=""></li>
		    			</ul>
		    </div>
		    </div>

							<?php
								 $con=mysqli_connect('localhost','root','');
								 mysqli_select_db($con,'hotspot') or die("cannot select DB");
							   $query1=mysqli_query($con,"select  address,city,state,pin,phone,name from user where uid='$cid'");
								 $row1=mysqli_fetch_row($query1);
								 $query=mysqli_query($con,"select c.sid,c.pid,c.date,m.price,m.image,m.model_name,c.quantity,m.ram,m.storage,m.color from cart c, model m where c.cid='$cid' and m.model_id=c.pid");

								  $i=1;
		              while($row=mysqli_fetch_row($query))
		             {
		               echo" <div class='detalis-image'>
 										 		 <div class='flexslider' style='align:center;'><img src=$row[4] class='items'style='height:200px; align:center;'/>
									 		 	 </div>
												 </div>

									 		 <div class='detalis-image-details'>
										   <div class='brand-value'>
											   <h3>Product-Complete Details With Value</h3>
											 <div class='left-value-details'>
											   <ul>
											   <li>Phone:</li>
											   <li><h4>$row[5]($row[7]GB + $row[8]GB)</h4></li>
   											 <li>Price:</li>
	  										 <li><h3>$row[3]</h3></li>
  											 <li>Quantity:</li>
  											 <li><h3>$row[6]</h3></li>
  											 <li><h3>Color:</h3></li>
    										 <li><h2>$row[9]</h2></li>
 											 	 </ul>
											 </div>

										    <div class='clear'> </div>
										    </div>
									      </div>
												<div class='clear'> </div>";
		               $i=$i+1;
		             }
						?>

							</div>
					  	</div>
							<div class="content-sidebar">
											<h4>Delivered To</h4>
											<h2><?php echo "$row1[5]";?></h2
													<h2><?php echo "Phone: $row1[4]";?></h2>
										 <h2><?php echo "$row1[0]";?></h2>
										 <p><h3><?php echo "$row1[1], $row1[2], $row1[3]"; ?></h3><p></br></br>
											<h4>Change Address</h4>

												<form method="post">
													Phone:</br><input type="text" name="phone"></br>
													Address:</br><input type="text" name="address"></br>
													City:</br>
													<input type="text" name="city"></br>
													State:</br>
													<input type="text" name="state"></br>
													PIN:</br>
													<input type="text" name="pin"></br>
													<input type="submit" name="submit" value="Update">
												</form>
							</div>

							<?php
									if(isset($_POST["submit"])){
										$address=$_POST['address'];
										$city=$_POST['city'];
										$state=$_POST['state'];
										$pin=$_POST['pin'];
														$sql="update user SET address='$address',city='$city',state='$state',pin='$pin' where uid='$cid'";
														$result=mysqli_query($con,$sql);
														if($result){
														 //
															echo "<script type='text/javascript'>alert('Address Updated!')</script>";
															header("Location: cart.php");}
															else {
														echo "<script type='text/javascript'>alert('hi Failure!')</script>";
														}
											}

								?>

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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="col_1_of_4 span_1_of_4">
		<h3>Store Location</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		<h3>Order-online</h3>
		<p>080-1234-56789</p>
		<p>080-1234-56780</p>
		</div>
		<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
			h3>News-Letter</h3>
					<form><input type="text"><input type="submit" value="go" /></form>
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
		<div class="wrap">
		<div class="copy-right">
			<p>&copy; 2013 Mobile Store. All Rights Reserved | Design by  <a href="http://w3layouts.com/">W3Layouts</a></p>
		</div>
		</div>
		</div>
	</body>
</html>
