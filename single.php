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

	if(isset($_GET['mid']))
	{
		$mid=$_GET['mid'];
	}
	else {
					header("location:index.php");
	}
?>

<html>
	<head>
		<title>single</title>

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
							<li><a href='cart.php'><span>shopping cart</a></li>";
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
		    			<h3>Description :</h3>	<form method='post'>
						<table>
								<tr><td style="padding-right:150px;padding-bottom:5px;">Phone</td>	<td>:</td> <td><?php echo $row[3];?></td></tr>
								<tr><td style="padding-bottom:5px;">RAM</td>	<td>:</td> <td><?php echo $row[1];?></td></tr>
								<tr><td style="padding-bottom:5px;">Storage</td>	<td>:</td> <td><?php echo $row[5];?></td></tr>
								<tr><td style="padding-bottom:5px;">Color</td>	<td>:</td> <td><?php echo $row[5];?></td></tr>
								<tr><td style="padding-bottom:5px;">Price</td>	<td>:</td> <td><?php echo $row[0];?></td></tr>
								<tr><td style="padding-bottom:5px;">Memory Slot</td>	<td>:</td> <td><?php echo $row[7];?></td></tr>
								<tr><td style="padding-bottom:5px;">Camera</td>	<td>:</td> <td><?php echo $row[8];?></td></tr>
								<tr><td style="padding-bottom:5px;">Network</td>	<td>:</td> <td><?php echo $row[9];?></td></tr>
								<tr><td style="padding-bottom:5px;">Battery</td>	<td>:</td> <td><?php echo $row[10];?></td></tr>
								<tr><td style="padding-bottom:5px;">Operating System</td>	<td>:</td> <td><?php echo $row[14];?></td></tr>
								<tr><td style="padding-bottom:5px;">Processor Type</td>	<td>:</td> <td><?php echo $row[15];?></td></tr>
								<tr><td style="padding-bottom:5px;">Clock Speed</td>	<td>:</td> <td><?php echo $row[16];?></td></tr>
								<tr><td style="padding-bottom:5px;">Display Size</td>	<td>:</td> <td><?php echo $row[11];?></td></tr>
								<tr><td style="padding-bottom:5px;">Weight</td>	<td>:</td> <td><?php echo $row[12];?></td></tr>
								<tr><td style="padding-bottom:5px;">Warranty</td>	<td>:</td> <td><?php echo $row[13];?></td></tr>
								<tr>
									<td style="padding-bottom:5px;">Select Seller</td>	<td>:</td>
									<td>

									<select name="seller_detail" id="sell">
									<?php
									$i=1;
									$query=mysqli_query($con,"select u.name,u.city,s.seller_id from seller s, user u WHERE s.model_id='$mid' and s.seller_id=u.uid");
									while($srow=mysqli_fetch_row($query))
									{	echo" <option id=$i value='$srow[2]'>$srow[0]  $srow[1]</option>";
										$i=$i+1;
									}?>
									</select>
								</td>
								</tr>
							</table>

							<button name="butt">AddToCart</button></form>
							<?php
							if(isset($_POST['butt']))
							{
								if($ex==1){
										echo "<script type='text/javascript'>	function myFunction() {alert('Please login!')	}</script>";}
								 else
								 {
									 $sid=$_POST['seller_detail'];
									 $con=mysqli_connect('localhost','root','');
									 mysqli_select_db($con,'hotspot') or die("cannot select DB");
									 $query=mysqli_query($con,"select * from cart where cid='$cid' and  pid='$mid' and sid='$sid'");
									 $numrows=mysqli_num_rows($query);

													if($numrows<1){
														$sql="INSERT INTO cart(cid,sid,pid,date) VALUES('$cid','$sid','$mid',CURDATE())";
														$result=mysqli_query($con,$sql);
														if($result){
														 			header("Location: cart.php");
																	}
														else {
																	echo "<script type='text/javascript'>alert('Failure!')</script>";
																	}
													}
													else {
														$row=mysqli_fetch_row($query);
													 $val=$row[4]+1;
                           $sql="update cart SET quantity='$val' where cid='$cid' and  pid='$mid' and sid='$sid'";
                           $result=mysqli_query($con,$sql);
                           if($result){
                            			echo "<script type='text/javascript'>alert('Your this Product Added successfully!')</script>";
																		header("Location: cart.php");}
                             else {
                           				echo "<script type='text/javascript'>alert('hi Failure!')</script>";
                           				}
													}
								 }
							}
	              ?>










		    		</div>
						</div>


		    		<div class="clear"> </div>


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

	</body>
</html>
