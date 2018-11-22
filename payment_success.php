  <?php
session_start();
if($_SESSION["paypalphp"]=="")
{
    ?>
    <script type="text/javascript">
        window.location="store.php";
    </script>
<?php

}
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'hotspot') or die("cannot select DB");

$order_id=$_GET["id"];

//this is for getting record from temp table to permanent table
$res=mysqli_query($con,"select u.name,u.address,u.city,u.state,u.pin,o.cid,o.date from order_confirm o,user u where o.oid=$order_id and u.uid=o.cid");
while($row=mysqli_fetch_array($res))
{
    $name=$row[0];
    $cid=$row[5];
    $date=$row[6];
    $address=$row[1];
    $city=$row[2];
    $state=$row[3];
    $pin=$row[4];
}
mysqli_query($con,"insert into order_address values('$order_id','$cid','$date','$address','$city','$state','$pin','$name')");

//now need to get permanent table order id
$i=1;
$query=mysqli_query($con,"select c.cid,c.sid,c.pid,m.model_name,m.image,m.ram,m.storage,m.color,m.price from checkout c,model m where oid=$order_id and m.model_id=c.pid");
while($row1=mysqli_fetch_row($query))
{
$sql="INSERT INTO order_complete(oid,cid,sid,pid,mname,image,ram,storage,color,price) VALUES('$order_id','$row1[0]','$row1[1]','$row1[2]','$row1[3]','$row1[4]','$row1[5]')";
$result=mysqli_query($con,$sql);
 $i=$i+1;
}


echo "your order get successfully, we deliver product soon";

$_SESSION["pay"]="";
$_SESSION["paypalphp"]="";


?>

<script type="text/javascript">

    setTimeout(function(){
        window.location="store.php";

    },3000);

</script>
