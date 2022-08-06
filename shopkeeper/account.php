<?php include("include/header.php");?>

    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
        <div class="wpf-loader-two-inner">
            <span>Loading</span>
        </div>
    </div>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <?php include("include/nav.php");?>

    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="../images/top.png" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Account Page</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <!-- Cart view section -->
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                        <div id="success" class="alert alert-success" style="display: none;" role="alert">
                   Successfully submitted
                  </div>

                  <div id="error" class="alert alert-danger " style="display: none;" role="alert">
                    Something went wrong try again
                  </div>
                            <div class="col-md-6">
                                <div class="aa-myaccount-login">
                                    <h4>Login</h4>

                                    <form action="" class="aa-login-form" method="post">
                                        <label for="">E-mail<span>*</span></label>
                                        <input required name="email" type="text" placeholder="E-mail">
                                        <label for="">Password<span>*</span></label>
                                        <input required name="password" type="password" placeholder="Password">
                                        <button name="loginUser" type="submit" class="aa-browse-btn">Login</button>
                                    </form>

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="aa-myaccount-register">
                                    <h4>Register</h4>
                                    <form action="" class="aa-login-form" method="post" enctype="multipart/form-data">
                                        
                                        <input name="name" required type="text" placeholder="Enter Name">
                                        <input name="email" required type="text" placeholder="Enter Email">
                                        <input name="mobile" required type="text" placeholder="Enter Mobile">
                                        <input name="cnic" required type="text" placeholder="Enter CNIC">
                                        <input name="address" required type="text" placeholder="Enter Address">
                                        <input name="password" required type="password" placeholder="Enter Password">
                                        <input name="file" required type="file">

                                        <button name="registerUser" type="submit" class="aa-browse-btn">Register</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->

    <?php include("include/footer.php");?>
    <!-- / footer -->
    <!-- Login Modal -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
    <!-- To Slider JS -->
    <script src="js/sequence.js"></script>
    <script src="js/sequence-theme.modern-slide-in.js"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="js/slick.js"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script>


</body>

</html>


<?php
if(isset($_POST["registerUser"]) && isset($_POST["name"]) && isset($_POST["cnic"]))
{
   $name=$_POST["name"];
   $email=$_POST["email"];
   $mobile=$_POST["mobile"];
   $cnic=$_POST["cnic"];
   $address=$_POST["address"];
   $password=Encryption::Encrypt($_POST["password"]);

   $imgNameForDB="";
   $file=$_FILES["file"]["tmp_name"];
   $fileType=$_FILES["file"]["type"];
   list($width,$height)=getimagesize($file);
   $nwidth=200; $nheight=200;
   $newImg=imagecreatetruecolor($nwidth,$nheight);
   $check=false;
  
   $result=DBHelper::get("SELECT id from shopkeeper WHERE email='{$email}'");
   if(!$result->num_rows > 0)
   {
    if($fileType == "image/jpeg")
    {
    $source=imagecreatefromjpeg($file);
    $imgName="shopkeeper_".$mobile."_".$cnic."_".strlen($password)."_".strlen($email).".jpg";
    $imgNameForDB="images/shopkeeper/".$imgName;
    imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
    imagejpeg($newImg,'../images/shopkeeper/'.$imgName);
    $check=true;
    }
    elseif($fileType == "image/png")
    {
        $source=imagecreatefrompng($file);
        $imgName="shopkeeper_".$mobile."_".$cnic."_".strlen($password)."_".strlen($email).".png";
        $imgNameForDB="images/shopkeeper/".$imgName;
        imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        imagepng($newImg,'../images/shopkeeper/'.$imgName);
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
     $status=DBHelper::set("INSERT into shopkeeper(name,email,cnic,mobile,address,password,image) VALUES('{$name}','{$email}','{$cnic}','{$mobile}','{$address}','{$password}','{$imgNameForDB}')");
     if($status)
     {
        ?>
        <script>     
              var success=$("#success").css("display","block").text("account created successfully");
              var error=$("#error").css("display","none");
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
   else{
    ?>
    <script>     
          var success=$("#success");
          success.css("display","none");
          var error=$("#error");
          error.css("display","block");
          error.text("Account exist try another email address");
    </script>
    <?php 
   }
  
}
elseif(isset($_POST["loginUser"]) && isset($_POST["email"]) && isset($_POST["password"]))
{
   $email=$_POST["email"];
   $password=Encryption::Encrypt($_POST["password"]);
   $result=DBHelper::get("SELECT id from shopkeeper WHERE email='{$email}' and password='{$password}'");
   if($result->num_rows > 0)
   {
    $id = Encryption::Encrypt($result->fetch_assoc()["id"]);
     ?>
     <script>
         function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
         var id="<?php echo $id?>"
         setCookie("shopkeeper",id,30);
         location.href="index.php";
     </script>
     <?php
   }
   else{
       ?>
        <script>     
              var success=$("#success").css("display","none");
              var error=$("#error").css("display","block").text("Invalid email or password")
        </script>
       <?php
   }
}
?>