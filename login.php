<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['sess_user']))
{
  session_destroy();
}
?>
<html>
<head>
<meta charset="utf-8">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
    <link rel="stylesheet" href="css/logincss.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>

</head>
<body>
  <div class="header">
    <div class="clear"> </div>
    <div class="header-top-nav">
      <ul>
        <li><a href="registration.php">Register</a></li>
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
  $passward=$_POST['password'];
      $pass = hash('sha256', (get_magic_quotes_gpc() ? stripslashes($passward) : $passward));
      echo $pass;
  $confrm="Incorrect username or password !!";
  $con=mysqli_connect('localhost','root','') or die(mysql_error());
  mysqli_select_db($con,'hotspot') or die("cannot select DB");

      $stmt = $con->prepare('SELECT * FROM user WHERE username = ?');
      $stmt->bind_param('s', $user); // 's' specifies the variable type => 'string'

      $stmt->execute();

      $result = $stmt->get_result();


//		$result=mysqli_query($con,"SELECT * FROM user WHERE username='".$user."' AND password='".$pass."'");
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
                  @$_SESSION['type']=0;
             header("Location: store.php");}
             else{
                 @$_SESSION['type']=1;
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
