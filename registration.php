<!DOCTYPE html>
<? php
session_start();
if(isset($_SESSION['sess_user']))
{
header(location:index.php);
}
?>
<html lang="en">
	<head>
		<link href="http://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://getbootstrap.com/docs/3.3/examples/signin/signin.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		<style>
			.container{
				background-color: #f8f8f8;
			}
		</style>
		<title>Registration page</title>
	</head>
	<body >
		<div class="clear"> </div>
		<div class="top-header">
			<div class="clear"> </div>
			<div class="wrap">
				<!----start-logo---->
				<div class="logo"><a href="index.php"><img src="images/logo.png" title="logo" /></a></div>
				<!----end-logo---->
				<!----start-top-nav---->
				<div class="top-nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="store.php">Featured</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="container">
			<form method="post" class="form-signin">
				<div class="form-group">
					<label>User Name</label>
					<input type="text" id="User" name="User" class="form-control" placeholder="Enter userame"  pattern="[A-Za-z0-9]{1,10}" maxlength="20" required>
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text" id="Name" name="Name" class="form-control" placeholder="Enter Name" pattern="[A-Za-z ]{1,20}" maxlength="20" required>
				</div>
				<div class="form-group">
					<label>Phone No</label>
					<input type="number" id="Phone" name="Phone" class="form-control" placeholder="Enter Phone" pattern="[0-9]{10}" maxlength="10" required>
				</div>
				<div class="form-group">
					<label>Address</label><br>
					<table><tr><td>Flat/House-no</td><td>:</td><td><input type="text" name="address" maxlength="5" required></td><tr>
						<tr><td>city</td><td>:</td><td><input type="text" name="city" maxlength="25" required></td><tr>
						<tr><td>state</td><td>:</td><td><input type="text" name="state" maxlength="25" required></td><tr>
						<tr><td>PIN</td><td>:</td><td><input type="text" name="pin" pattern="[0-9]{6}"required></td><tr></table>
				</div>
				<div class="form-group">
					<label>Email Id</label>
					<input type="email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" placeholder="Enter your email"" name="Email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter Password" pattern=".{8,20}" required>
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" id="pwd1" name="pwd1" class="form-control" pattern=".{8,20}" required>
				</div>
				<div class="form-group">
					<label>Type</label><br>
					<input type="radio" name="usertype" value="Seller" checked> Seller <br> <input type="radio" name="usertype" value="Customer"> Customer<br>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="submit">Sign in</button>
			</form>

		</div>
		<?php
		if(isset($_POST["submit"])){
			if(!empty($_POST['User']) && !empty($_POST['pwd']) && !empty($_POST['pwd1'])) {
				$user=$_POST['User'];
				$name=$_POST['Name'];
				$phone=$_POST['Phone'];
				$email=$_POST['Email'];
				$pass=$_POST['pwd'];
				$type=$_POST['usertype'];
				$cpass=$_POST['pwd1'];
				$address=$_POST['address'];
				$city=$_POST['city'];
				$state=$_POST['state'];
				$pin=$_POST['pin'];
				if($pass!=$cpass)
				{
					echo "<script type='text/javascript'>alert('Password Does not match!')</script>";
				}
				else
				{
					$pass = hash('sha256', (get_magic_quotes_gpc() ? stripslashes($pass) : $pass));
					$con=mysqli_connect('localhost','root','');
					mysqli_select_db($con,'hotspot') or die("cannot select DB");

					$query=mysqli_query($con,"SELECT * FROM user WHERE username='$user'");
					$numrows=mysqli_num_rows($query);
					if($numrows==0)
					{
						if($type=='Seller'){
							$val=1;
						}
						else{
							$val=0;
						}
						$sql="INSERT INTO user(username,name,phone,email,password,is_seller,address,city,state,pin) 	VALUES('$user','$name','$phone','$email','$pass','$val','$address','$city','$state','$pin')";
						$result=mysqli_query($con,$sql);
						if($result){
//							echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
							header("Location: login.php");
							die();
						}
						else {
							echo "<script type='text/javascript'>alert('HiFailure!')</script>";
						}
					}
					else {
						echo "<script type='text/javascript'>alert('username already exists! Please try again with another!')</script>";
					}
				}
			}
		}
		?>
		<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
