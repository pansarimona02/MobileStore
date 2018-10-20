<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
    <style>
    @charset "utf-8";
    @import url(http://weloveiconfonts.com/api/?family=fontawesome);
    [class*="fontawesome-"]:before {
      font-family: 'FontAwesome', sans-serif;
    }
body {
  background: #f8f8f8;
  color: #606468;
  font: 87.5%/1.5em 'Open Sans', sans-serif;
  margin: 0;
}
input {
  border: none;
  font-family: 'Open Sans', Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5em;
  padding: 0;
  -webkit-appearance: none;
}
p {
  line-height: 1.5em;
}
after { clear: both; }
#login {
  margin: 50px auto;
  width: 320px;
}
#login form {
  margin: auto;
  padding: 22px 22px 22px 22px;
  width: 100%;
  border-radius: 5px;
  background: #282e33;
  border-top: 3px solid #434a52;
  border-bottom: 3px solid #434a52;
}
#login form span {
  background-color: #363b41;
  border-radius: 3px 0px 0px 3px;
  border-right: 3px solid #434a52;
  color: #606468;
  display: block;
  float: left;
  line-height: 50px;
  text-align: center;
  width: 50px;
  height: 50px;
}
#login form input[type="text"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 235px;
  height: 50px;
}
#login form input[type="password"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 235px;
  height: 50px;
}
#login form input[type="submit"] {
  background: #b5cd60;
  border: 0;
  width: 100%;
  height: 40px;
  border-radius: 3px;
  color: white;
  cursor: pointer;
  transition: background 0.3s ease-in-out;
}
#login form input[type="submit"]:hover {
  background: #16aa56;
}
</style>
</head>
<body>
  <div class="header">
    <div class="clear"> </div>
    <div class="header-top-nav">
      <ul>
        <li><a href="registration.php">Register</a></li>
        <li><a href="login.php">Logout</a></li>
      
      </ul>
    </div>
    <div class="clear"> </div>
  </div>

  <div class="clear"> </div>
  <div class="top-header">
      <div class="wrap">
      <!----start-logo---->
      <div class="logo"><a href="index.php"><img src="images/logo.png" title="logo" /></a></div>
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



    <div id="login">
      <form name='form-login' method="POST">
        <span class="fontawesome-user"></span>
          <input type="text" id="user" placeholde="Username" name="username">
          <span class="fontawesome-lock"></span>
          <input type="password" id"pass" placeholder="Password" name="password">
          <input type="submit" value="Login" name="submit">
      </form>
<?php
	if(isset($_POST["submit"])){
		$not="Fill all fields !!";
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$confrm="Incorrect username or password !!";
		$con=mysqli_connect('localhost','root','') or die(mysql_error());
		mysqli_select_db($con,'hotspot') or die("cannot select DB");
		$result=mysqli_query($con,"SELECT * FROM user WHERE username='".$user."' AND password='".$pass."'");
		$numrows=mysqli_num_rows($result);
		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
			}
			if($user == $dbusername && $pass == $dbpassword)
			{
				$result=mysqli_query($con,"SELECT uid,is_seller FROM user WHERE username='".$user."' AND password='".$pass."'");
				$row=mysqli_fetch_assoc($result);
				session_start();
				@$_SESSION['sess_user']=$row['uid'];
				@$_SESSION['sess_name']=$user;
                echo "logged in session started";
                $type=$row['is_seller'];
                echo $type;
                if($type==0){
               header("Location: store.php");}
               else{
               header("Location: seller.php");
               }
			}
		} else {
			echo "<script type='text/javascript'>alert('$confrm');</script>";
		}
		} else {
			echo "<script type='text/javascript'>alert('$not');</script>";
		}
	}
?>
</body>
</html>
