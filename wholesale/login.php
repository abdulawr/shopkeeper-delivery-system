<?php
session_start();
include("../include/conn.php");
include("../include/DBHelper.php");
include("../include/Encryption.php");
if(isset($_SESSION["wholeseller"]))
{
    ?>
    <script>
        location.href="index.php";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <style>
        .tess{
            margin-top: 10px;
            height: 50px;
        }
    </style>
     <meta charset="UTF-8" />
    <title>Wholesale</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
      <!-- Message Part Start -->
      <div id="success" class="alert alert-success" style="display: none;" role="alert">
                   Successfully submitted
      </div>

      <div id="error" class="alert alert-danger " style="display: none;" role="alert">
                    Something went wrong try again
      </div>
                  <!-- Message Pare End -->
    </div>
    <div class="tab-content">
       

        <div id="login" class="tab-pane active">
            <form action="" class="form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
                <input name="email" type="email" placeholder="Email" class="form-control" />
                <input name="pass" type="password" placeholder="Password" class="form-control" />
                <button name="login_user" class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
       
        <div id="signup" class="tab-pane">
            <form action="" class="form-signin" method="post" enctype="multipart/form-data">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                <input required name="name" type="text" placeholder="Name" class="form-control" />
                <input required name="email" type="email" placeholder="Email" class="form-control" />
                <input  required name="cnic" type="number" placeholder="CNIC" class="form-control tess" />
                <input  required name="mobile" type="number" placeholder="Mobile" class="form-control tess" />
                <input required name="address" type="text" placeholder="Address" class="form-control" />
                <input required name="password" type="password" placeholder="Password" class="form-control" />
                <input required name="file" type="file" style="margin-bottom:20px" />
                <button name="reqister_user" class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
   <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>

<?php
if(isset($_POST["reqister_user"]) && isset($_POST["name"]))
{
  $name=$_POST["name"];
  $email=$_POST["email"];
  $cnic=$_POST["cnic"];
  $mobile=$_POST["mobile"];
  $address=$_POST["address"];
  $password=Encryption::Encrypt($_POST["password"]);
  $imgNameForDB="";
  $check=DBHelper::get("SELECT * from wholesale WHERE email='{$email}';");
  if($check->num_rows > 0)
  {
    ?>
    <script>
      var success=$("#success");
      success.css("display","none");
      var error=$("#error");
      error.text("Account already exist");
      error.css("display","block");
      </script>
    <?php
  }
  else{
    $file=$_FILES["file"]["tmp_name"];
    $fileType=$_FILES["file"]["type"];
    list($width,$height)=getimagesize($file);
    $nwidth=250; $nheight=250;
    $newImg=imagecreatetruecolor($nwidth,$nheight);
    $check=false;
    if($fileType == "image/jpeg")
    {
    $source=imagecreatefromjpeg($file);
    $imgName="Whole_Sale".$mobile."_".$cnic.".jpg";
    $imgNameForDB="images/wholesale/".$imgName;
    imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
    imagejpeg($newImg,'../images/wholesale/'.$imgName);
    $check=true;
    }
    elseif($fileType == "image/png")
    {
        $source=imagecreatefrompng($file);
        $imgName="Whole_Sale".$mobile."_".$cnic.".png";
        $imgNameForDB="images/wholesale/".$imgName;
        imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        imagepng($newImg,'../images/wholesale/'.$imgName);
        $check=true;
    }
    else{
        ?>
        <script>     
              var success=$("#success");
              success.css("display","none");
              var error=$("#error");
              error.css("display","block");
              error.text("Image Format is not supported. You can only upload(png,jpg,jpeg");
        </script>
        <?php 
          $check=false;
    }

    if($check)
    {
     $status=DBHelper::set("INSERT INTO wholesale(name,email,cnic,mobile,address,pass,image) VALUES('{$name}','{$email}','{$cnic}','{$mobile}','{$address}','{$password}','{$imgNameForDB}')");
     if($status)
     {
        ?>
        <script>     
              var success=$("#success").css("display","block").text("Account created successfully");
              var error=$("#error").css("display","none");
              alert('msg');
        </script>
        <?php 
     }
     else{
        ?>
        <script>     
              var success=$("#success");
              success.css("display","none");
              var error=$("#error");
              error.css("display","block");
              error.text("Something went wrong try again");
        </script>
        <?php    
     }
    }
    else{
        ?>
        <script>     
              var success=$("#success");
              success.css("display","none");
              var error=$("#error");
              error.css("display","block");
              error.text("Error occured in image uploading");
        </script>
        <?php   
    }

  }
}
elseif(isset($_POST["login_user"]) && isset($_POST["pass"]))
{
 $email=$_POST["email"];
 $password=Encryption::Encrypt($_POST["pass"]);
 $result=DBHelper::get("SELECT id from wholesale WHERE email='{$email}' and pass='{$password}'");
 if($result->num_rows > 0){
  $_SESSION["wholeseller"]=Encryption::Encrypt($result->fetch_assoc()["id"]);
  ?>
  <script>
      location.href="index.php";
  </script>
  <?php
 }
 else{
     ?>
     <script>
        var success=$("#success").css("display","none");
        var error=$("#error").css("display","block").text("Invalid Email Or Password");
     </script>
     <?php
 }
}
?>
