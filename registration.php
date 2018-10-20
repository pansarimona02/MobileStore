
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
   <style>
   .container{
     background-color: #f8f8f8;
   }
   </style>

    <title>Registraytion page</title>
    <link href="http://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/docs/3.3/examples/signin/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="header">

      <div class="header-top-nav">
        <ul>
          <li><a href="registration.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="#">Delivery</a></li>
          <li><a href="#">Checkout</a></li>
          <li><a href="#">My account</a></li>
          <li><a href="#"><span>shopping cart&nbsp;&nbsp;: </span></a><label> &nbsp;noitems</label></li>
        </ul>
      </div>
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




    <div class="container">

      <form method="post" class="form-signin">
        <h2 class="form-signin-heading">New to MyStore</h2>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" id="User" name="User" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" id="Name" name="Name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>Phone No</label>
            <input type="text" id="Phone" name="Phone" class="form-control" placeholder="Enter Phone">
        </div>
        <div class="form-group">
            <label>Email Id</label>
            <input type="text" id="Email" name="Email" class="form-control" placeholder="Enter E-mail ID">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" id="pwd1" name="pwd1" class="form-control" >
        </div>

        <div class="form-group">
            <label>Type</label></br>
            <input type="checkbox" name="usertype" value="Seller"> Seller </br> <input type="checkbox" name="usertype" value="Customer"> Customer<br>


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
            //confirming password
            if($pass!=$cpass)
            {
              echo "<script type='text/javascript'>alert('Password Does not match!')</script>";
            }
            else
            {
						$count=0;
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
                  $sql="INSERT INTO user(username,name,phone,email,password,is_seller) VALUES('$user','$name','$phone','$email','$pass','$val')";
								  $result=mysqli_query($con,$sql);
								  if($result){
									 // header("Location: index.php");
                    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
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
				else {
          echo "<script type='text/javascript'>alert('All fields are required!')</script>";
				}
		}
			?>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
