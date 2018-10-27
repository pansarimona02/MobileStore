<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['sess_user']))
{

	header("location:index.php");
}
 $sellerid=$_SESSION['sess_user'];
?>
<html>
<head>
<meta charset="utf-8">
    <title>Seller</title>
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

      down vote
      accepted
      table {
          border-collapse: collapse;
      }

      td {
          padding-top: .8em;
          padding-bottom: .8em;
          padding-left: 150px;
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
        margin: 20px auto;
        width: 800px;
      }
      #login form {
        margin: auto;
        padding: 22px 22px 22px 22px;
        width: 100%;
        border-radius: 5px;
        background: #282e33;
        border-top: 3px solid #434a52;
        border-bottom: 3px solid #434a52;
        color: white;
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
        <li><a href="logout.php">Logout</a></li>
        <li><a href="#">My account</a></li>
  </ul>
  </div>
  <div class="clear"> </div>
  </div>

  <div class="top-header">
      <div class="wrap">
      <!----start-logo---->
      <div class="logo" style="font-family: Segoe Script;"><a href="index.php"><h3>MyStore<h3></a></div>
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
    <div id="login">
      <form method="POST">
          <table style="width:800px;">
          <tr>
            <td style="align:center;">Comapany</td>
            <td>
            <select name="input" id="brand">
            <?php
            $con=mysqli_connect('localhost','root','');
            mysqli_select_db($con,'hotspot') or die("cannot select DB");
            $i=1;
            $query=mysqli_query($con,"select model_name,ram,storage,price,model_id from model");
            while($row=mysqli_fetch_row($query))
            {
              echo" <option id=$i value='$row[4]'>$row[0]  $row[1]GB RAM $row[2]GB Storage $row[3]/- Rs</option>";

              $i=$i+1;
            }?>
          </select>
            </td>
          </tr>
          <tr>
            <td style="align:center;">Quantity</td>
            <td>
            <input type="text" name="quantity">
            </td>
          </tr>
          <tr>

            <td>
            <input type="hidden" name="name"value=<?php echo $sellerid ?> >
            </td>
          </tr>
        </table>
        <br/>
            <input type="submit" value="Add Product" name="submit">
      </form>
            <?php
                if(isset($_POST["submit"])){
                      $quantity=$_POST['quantity'];
                      //  $sname=$_POST['name'];
                      $mid=$_POST['input'];
                      $con=mysqli_connect('localhost','root','');
                      mysqli_select_db($con,'hotspot') or die("cannot select DB");
                     $query=mysqli_query($con,"SELECT * FROM seller WHERE model_id='$mid' and seller_id='$sellerid'");
                      $numrows=mysqli_num_rows($query);
                      echo $numrows;
                      if($numrows==0)
                      {
                          $sql="INSERT INTO seller(seller_id,model_id,quantity) VALUES('$sellerid','$mid','$quantity')";
                          $result=mysqli_query($con,$sql);
                          if($result){
                           // header("Location: index.php");
                            echo "<script type='text/javascript'>alert('Your Product Added successfully!')</script>";
                          }
                          else {
                          echo "<script type='text/javascript'>alert('Failure!')</script>";
                          }
                    }
                        else {
                           $query1=mysqli_query($con,"SELECT * FROM seller WHERE model_id='$mid' and seller_id='$sellerid'");
                          $row=mysqli_fetch_row($query1);
                          $val=$quantity+$row[2];
                          $sql="update seller SET quantity='$val' where model_id='$mid'and seller_id='$sellerid'";
                          $result=mysqli_query($con,$sql);
                          if($result){
                           // header("Location: index.php");
                            echo "<script type='text/javascript'>alert('Your this Product Added successfully!')</script>";}
                            else {

                          echo "<script type='text/javascript'>alert('hi Failure!')</script>";
                          }
                        }
                   }

                else {
                  echo "<script type='text/javascript'>alert('All fields are required!')</script>";
                }

              ?>







</body>
</html>
