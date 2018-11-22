<?php
session_start();
$ex=0;
if(!isset($_SESSION['sess_user']))
{
	$ex=1;
	header("location:index.php");
}
$bool=0;
if(isset($_GET['id']))
{
	$bool=1;
	$id=$_GET['id'];
}
?>
<html>
	<head>
		<title>Mobilestore Website Template | Store :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
		<link href="css/style1.css" rel="stylesheet" />
		<script type="text/javascript"></script>

		<style>
		.descript{
			display: inline-block;
			background: red;
		}
		</style>
	</head>
	<body>
		<div class="top-header">
			<div class="wrap">
		 		<!----start-logo---->
				<div class="logo">	<a href="index.php"><img src="images/logo.png" title="logo" /></a></div>
				<!----end-logo---->
				<!----start-top-nav---->
				<div class="top-nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<?php
						if($ex==1)
							echo "<li><a href='login.php'>login</a></li>";
						else {
							echo "<li><a href='logout.php'>logout</a></li>
							<li><a href='cart.php'><span>shopping cart</a></li>";
						}?>
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
									</a></li>
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
					<?php
					$con = mysqli_connect('localhost', 'root', '');
					mysqli_select_db($con, 'hotspot') or die("cannot select DB");
					$query = mysqli_query($con, "select cid, comp from company");
					while($row = mysqli_fetch_row($query))	
						echo "<li><a href='store.php?id=$row[0]'>$row[1] Mobiles</a></li>";
					echo "<li><a href='store.php'>See All</a></li>";
					?>
				</ul>
			</div>
		</div>
		<!--footer-->

	</body>
</html>
