<!DOCTYPE HTML>
<?php
session_start();
$ex=0;
if(!isset($_SESSION['sess_user']))
{
	$ex=1;
}
	if(isset($_GET['mid1']))
	{

		$mid=$_GET['mid1'];
		//echo $mid;
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
							<li><a href='#'>My account</a></li>
							<li><a href='#'><span>shopping cart&nbsp;&nbsp;: </span></a><label> &nbsp;noitems</label></li>";
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
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" title="logo" /></a>
			</div>
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
		    	<div class="detalis-image">
		    		<div class="flexslider" style="align:center;">
							<?php
								 $con=mysqli_connect('localhost','root','');
								 mysqli_select_db($con,'hotspot') or die("cannot select DB");
								 $query=mysqli_query($con,"select price,image,model_name from model WHERE model_id='$mid'");
								 $mrow=mysqli_fetch_row($query);
								 echo"<img src=$mrow[1] class='items'style='height:200px;'/>";
							?>
						</br>
							<?php
								echo $mrow[2];
								 $con=mysqli_connect('localhost','root','');
								 mysqli_select_db($con,'hotspot') or die("cannot select DB");
								 $query=mysqli_query($con,"select m.price,m.ram,m.image,m.model_name,m.cid,m.storage,m.model_id,s.memory_slot,s.camera,s.network,s.battery,s.display_size,s.weight,s.warranty,s.OS,s.processor,s.clock from model m,specifications s WHERE m.model_id='$mid' and m.model_id=s.model_id");
								 $row=mysqli_fetch_row($query);
							?>
					</div>
		    	</div>
		    	<div class="detalis-image-details">
		    		<div class="brand-value">
		    			<h3>Product-Complete Details With Value</h3>
		    			<div class="left-value-details">
			    		<ul>
			    		<li>Price:</li>
    					<li><h5><?php echo $mrow[0];?></h5></li>
	    				<br/>
	    				<li><p>Not rated</p></li>
		    			</ul>
		    			</div>
		    			<div class="right-value-details">
		    			<a href="#">Instock</a>
		    			<p>No reviews</p>
		    			</div>
							<div class="clear"> </div>
		    		</div>
						<div class="brand-history">
		    			<h3>Description :</h3>
		    			<p> <table>
								<tr>
									<tr><td style="padding-right:150px;padding-bottom:5px;">Phone</td>	<td>:</td> <td><?php echo $row[3];?></td></tr>
									<tr><td style="padding-bottom:5px;">RAM</td>	<td>:</td> <td><?php echo $row[1];?></td></tr>
									<tr><td style="padding-bottom:5px;">Storage</td>	<td>:</td> <td><?php echo $row[5];?></td></tr>
									<tr><td style="padding-bottom:5px;">Color</td>	<td>:</td> <td><?php echo $row[5];?></td></tr>
									<tr><td style="padding-bottom:5px;">Price</td>	<td>:</td> <td><?php echo $row[0];?></td></tr>


							</table></p>
							<button onclick="myFunction()">AddToCart</button>
							<?php
												if($ex==1){
														echo "<script type='text/javascript'>	function myFunction() {alert('Please login!')	}</script>";}
												 else {
													 		echo "<script>
	 											 		function myFunction() {
	     											location.replace('https://www.w3schools.com')
	 												}
	 												</script>";}


							?>
		    		</div>
						</div>


		    		<div class="clear"> </div>

						<div class="menu_container">
						<p class="menu_head">Lorem Ipsum<span class="plusminus">+</span></p>
							<div class="menu_body" style="display: none;">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
						<p class="menu_head">About Product<span class="plusminus">+</span></p>
							<div class="menu_body" style="display: none;">
							<p>theonlytutorials.com is providing a great varitey of tutorials and scripts to use it immediate on any project!</p>
							</div>
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
		<div class="wrap">
		<div class="copy-right">
			<p>&copy; 2013 Mobile Store. All Rights Reserved | Design by  <a href="http://w3layouts.com/">W3Layouts</a></p>
		</div>
		</div>
		</div>
	</body>
</html>
