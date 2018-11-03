<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="css/responsiveslides.css">
            <script src="js/jquery.min.js"></script>
            <script src="js/responsiveslides.min.js"></script>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
              <div class="logo" style="font-family: Segoe Script;"><a href="index.php"><h3>MyStore</h3></a></div>
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
        <div class="text-center">
            <a href="" class="btn btn-default bg-dark" data-toggle="modal" data-target="#modalRegisterForm" style="margin-top:5px;">Add New Model Specification </a>
        </div>
        <div class="text-center">
            <a href="" class="btn btn-default bg-dark" data-toggle="modal" data-target="#modalAddCompany" style="margin-top:5px;">Add New Company </a>
        </div>
     
<div class="modal fade" id="modalAddCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Company details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form method="post">
                    <div class="md-form mb-5">
                        <input type="text" id="orangeForm-name" class="form-control validate" name="c_name">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Company Name</label>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-deep-orange" name="add" type="submit">Add</button>
                    </div>
                </form>
                <?php
                   
                   if(isset($_POST["add"])){
                       $c_name = $_POST["c_name"];
                       $con=mysqli_connect('localhost','root','');
                       mysqli_select_db($con,'hotspot') or die("cannot select DB");
                       $sql="INSERT INTO company(comp) VALUES('$c_name')";
                       $result=mysqli_query($con,$sql);
                       if($result){
                           echo "<script type='text/javascript'>alert('Company Added!')</script>";
                       }
                       else {
                           echo "<script type='text/javascript'>alert('Failure!')</script>";
                       }
                   }    
                ?>
            </div>
        </div>
    </div>
</div>




        <div class="row">
            <div class="col-lg-6">
                  
                 <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Add New Model Request</h6>
                     
                 <?php

	 						 $con=mysqli_connect('localhost','root','');
	 						 mysqli_select_db($con,'hotspot') or die("cannot select DB");
	 						    $query=mysqli_query($con,"select model_id, c_name from new_model_req");
	 						    while($row=mysqli_fetch_row($query)){
                                     echo "<div class='media text-muted pt-3'>
                                      <img data-src='holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1' alt='' class='mr-2 rounded'>
                                      <div class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>
                                        <div class='d-flex justify-content-between align-items-center w-100'>
                                          <strong class='text-gray-dark'>$row[0]</strong>
                                          <a href='' class='btn btn-default bg-dark' data-toggle='modal' data-target='#modalRegisterForm'>Add</a>
                                        </div>
                                        <span class='d-block'>@$row[1]</span>
                                      </div>
                                    </div>"  ;
                                }
                ?>
              </div>
            </div>
            <div class="col-lg-6">
            </div>
<!--        </div>-->
       <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <form enctype="multipart/form-data" method="post">
                                    <div class="md-form mb-5">
                                        <input type="text" id="orangeForm-name" class="form-control validate" name="model_id">
                                        <label data-error="wrong" data-success="right" for="orangeForm-name" >Model ID</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <input type="text" id="orangeForm-email" class="form-control validate" name="model_name">
                                        <label data-error="wrong" data-success="right" for="orangeForm-email">Model Name</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="number" id="orangeForm-pass" class="form-control validate" name="ram">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Ram</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="number" id="orangeForm-pass" class="form-control validate" name="storage">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Storage</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="color">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Color</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="number" id="orangeForm-pass" class="form-control validate" name="price">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Price</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <select  id="orangeForm-pass" class="form-control validate" name="c_name">
                                        <?php
                                            $con=mysqli_connect('localhost','root','');
                                            mysqli_select_db($con,'hotspot') or die("cannot select DB");
                                            $i=1;
                                            $query=mysqli_query($con,"select comp from company");
                                            while($row=mysqli_fetch_row($query))
                                            {
                                            echo" <option id=$i value='$row[0]'>$row[0]</option>";

                                            $i=$i+1;
                                            }?>
                                        </select>

                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Company Name</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="memory_slot">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Memory Slot</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="camera">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Camera</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="network">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Network</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="battery">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Battery</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="display">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Display Size</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="weight">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Weight</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="warrenty">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Warrenty</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="os">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Operating System</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="processor">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Processor</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="text" id="orangeForm-pass" class="form-control validate" name="clock">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Clock</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <input type="file" id="orangeForm-pass" class="form-control validate" name="image">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Upload Image</label>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-deep-orange" name="send" type="submit">Send</button>
                                    </div>
                                </form>
                        <?php
                           if(isset($_POST["send"])){
                               $model_id = $_POST["model_id"];
                               $model_name = $_POST["model_name"];
                               $ram = $_POST["ram"];
                               $storage = $_POST["storage"];
                               $color = $_POST["color"];
                               $price = $_POST["price"];
                               $c_name = $_POST["c_name"];
                               $memory_slot = $_POST["memory_slot"];
                               $camera = $_POST["camera"];
                               $battery = $_POST["battery"];
                               $network = $_POST["network"];
                               $display  = $_POST["display"];
                               $weight = $_POST["weight"];
                               $warrenty = $_POST["warrenty"];
                               $os = $_POST["os"];
                               $processor = $_POST["processor"];
                               $clock = $_POST["clock"];
                                echo "<pre>";
                               print_r( $_FILES);
                               echo "</pre>";
                                 if(isset($_FILES['image'])){
                                  $errors= array();
                                  $file_name = $_FILES['image']['name'];
                                  $file_size =$_FILES['image']['size'];
                                  $file_tmp =$_FILES['image']['tmp_name'];
                                  $file_type=$_FILES['image']['type'];
//                                  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
//
//                                  $expensions= array("jpeg","jpg","png");
//
//                                  if(in_array($file_ext,$expensions)=== false){
//                                     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
//                                  }

                                  if($file_size > 2097152){
                                     $errors[]='File size must be excately 2 MB';
                                  }

                                  if(empty($errors)==true){
                                     move_uploaded_file($file_tmp,"images/".$file_name);
                                  }else{
                                     print_r($errors);
                                  }
                                  $image_name = "images/".$file_name;
                                  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                                  $con=mysqli_connect('localhost','root','');
                                  mysqli_select_db($con,'hotspot') or die("cannot select DB");
                                  $sql_model="INSERT INTO model(model_id,image,model_name,ram,storage,color,price, cid) VALUES('$model_id','$image_name','$model_name',$ram,$storage,'$color',$price, 101)";
                                  $sql_spe="INSERT INTO specifications(com_name,model_id,memory_slot,camera,network,battery,display_size,weight,warranty,OS,processor,clock) VALUES('$c_name','$model_id','$memory_slot','$camera','$network','$battery','$display','$weight', '$warrenty','$os','$processor','$clock')";
                                   $result_model=mysqli_query($con,$sql_model);
                                   $result_spe=mysqli_query($con,$sql_spe);
                                     if($result_model and $result_spe){
                                         mysqli_query($con,"DELETE FROM new_model_req where model_id = '$model_id'");
                                         header("Location: admin.php");
                                       }
                                       else {
                                           echo "<script type='text/javascript'>alert('HiFailure!')</script>";
                                       } 
                               }
                              
                           
                           }    
                        ?>
                    </div>
                </div>
            </div>
        </div>
      

</div>
    </body>
</html>