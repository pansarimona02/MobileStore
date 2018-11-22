<?php
ob_start();
session_start();
$ex=0;
if(!isset($_SESSION['sess_user']))
	$ex=1;
else
	$cid=$_SESSION['sess_user'];
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
		<div class="top-header">
			<div class="wrap">
				<!----start-logo---->
				<div class="logo"><a href="index.php"><img src="images/logo.png" title="logo" /></a></div>
				<!----end-logo---->
				<!----start-top-nav---->
				<div class="top-nav">
					<ul>

						<li><a href="index.php">Home</a></li>
						<li><a href="store.php">Store</a></li>
						<?php
						if($ex==1)
							echo "<li><a href='login.php'>login</a></li>";
						else {
							echo "<li><a href='logout.php'>logout</a></li>";
						}?>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		<div class="wrap">
			<div class="content">
				<div class="content-grids">
					<?php
					$total=0;
					$con=mysqli_connect('localhost','root','');
					mysqli_select_db($con,'hotspot') or die("cannot select DB");
					$query1=mysqli_query($con,"select address,city,state,pin,phone,name from user where uid='$cid'");
					$row1=mysqli_fetch_row($query1);
					$query=mysqli_query($con,"select c.sid,c.pid,c.date,m.price,m.image,m.model_name,m.ram,m.storage,m.color from cart c, model m where c.cid='$cid' and 	m.model_id=c.pid");

					$i=1;
					while($row=mysqli_fetch_row($query))
					{
						$total=$total+$row[3];
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
							<li><h4>$row[5]($row[7]GB + $row[7]GB)</h4></li>
							<li>Price:</li>
							<li><h3>$row[3]</h3></li>

							<li><h3>Color:</h3></li>
							<li><h2>$row[8]</h2></li>
							</ul>

							</div>

							<div class='clear'> </div>
							</div>
							</div>
							<div class='clear'> </div>";
							echo "<form method=\"post\">
								<input type=\"hidden\" name=\"cid\" value=\"$cid\">
								<input type=\"hidden\" name=\"sid\" value=\"$row[0]\">
								<input type=\"hidden\"  name=\"pid\" value=\"$row[1]\">
								<button type=\"submit\" name=\"remove\">Remove</button>
								</form>";
						$i=$i+1;
					}
					?>
					<?php
						if(isset($_POST["remove"])) {
							$sql = "delete from cart where cid = '$_POST[cid]' and sid = '$_POST[sid]' and pid = '$_POST[pid]'";
							$result = mysqli_query($con, $sql);
							header("Location: cart.php");
//							echo $sql;
						}
					?>
				</div>
			</div>
			<div class="content-sidebar">
				<h4>Delivered To</h4>
				<h2><?php echo "$row1[5]";?></h2>
				<h2><?php echo "Phone: $row1[4]";?></h2>
				<h2><?php echo "$row1[0]";?></h2>
				<p><h3><?php echo "$row1[1], $row1[2], $row1[3]"; ?></h3><p>
				<h4>Total : <?php echo "Rs $total/-";?></h4>
				<?php $_SESSION['pay']=$total?>
				<form method="post">
					<input type="submit" name="checkout" style="background-color:#1addd6;" value="Checkout">
					<br><br>
					<h4>Change Address</h4>
					Phone:<br><input type="text" name="phone"><br>
					Address:<br><input type="text" name="address"><br>
					City:<br>
					<input type="text" name="city"><br>
					State:<br>
					<input type="text" name="state"><br>
					PIN:<br>
					<input type="text" name="pin"><br>
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
						echo "<script type='text/javascript'>alert('Address Updated!')</script>";
						header("Location: cart.php");}
					else {
						echo "<script type='text/javascript'>alert('hi Failure!')</script>";
					}
				}
				if(isset($_POST["checkout"])){
					$sql="INSERT INTO order_confirm(cid,date) VALUES('$cid',CURDATE())";
					$result=mysqli_query($con,$sql);
					$sql1=mysqli_query($con,"SELECT oid FROM order_confirm ORDER BY oid DESC LIMIT 1");
					$row2=mysqli_fetch_row($sql1);
					$i=1;
					$_SESSION['order_id']=$row2[0];
					$query=mysqli_query($con,"select sid,pid from cart where cid='$cid'");
					while($row=mysqli_fetch_row($query))
					{
						$sql="INSERT INTO checkout(oid,cid,sid,pid) VALUES('$row2[0]','$cid','$row[0]','$row[1]')";
						$result=mysqli_query($con,$sql);
						$i=$i+1;
					}

					echo "<script type='text/javascript'>alert('Click ok to transferring to you in paypal..');
						setTimeout(function(){
						window.location='paypal.php';
						},4000);
						</script>";
				}

			?>
		</div>
	</body>
</html>
