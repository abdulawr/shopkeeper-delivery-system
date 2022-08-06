<?php
include("include/header.php");
?>

<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">
    <?php $pageName="addProduct"; include("include/nav.php");?>
        <!--PAGE CONTENT -->
        <div id="content" style="width: 80%;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12 " >
                     <h3>Add New Product</h3>

                    </div>
                </div>

                <hr />

      <div id="success" class="alert alert-success" style="display: none;" role="alert">
       Product added successfully
      </div>

      <div id="error" class="alert alert-danger " style="display: none;" role="alert">
       Something went wrong try again
      </div>

<form method="post" style="margin: 30px auto; padding-left:30px" enctype="multipart/form-data">

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Name</label>
<input required type="text" name="name" class="form-control">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">Company Name</label>
<input required type="text" name="company_name" class="form-control">
</div>
</div>

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Price</label>
<input required type="number" name="price" class="form-control" >
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">Quantity</label>
<input required type="number" name="quantity" class="form-control"> 
</div>
</div>

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Mobile</label>
<input required type="number" name="mobile" class="form-control" value="<?php echo $userData["mobile"]; ?>">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">Quality</label>
<input required name="quality" type="text" class="form-control">
</div>
</div>

<div class="row">
<div class="form-group col-lg-10">
<label style="font-size:small;">Description</label>
<textarea name="des" type="text" class="form-control" rows="5"></textarea>
</div>
</div>

<div class="row">
<div class="form-group col-lg-10">
<input required type="file" name="file">
</div>
</div>

<input type="hidden" name="id" value="<?php echo $userData["id"]; ?>">

<button name="submit" type="submit" class="btn btn-info">Submit</button>

</form>


            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>

<?php
if(isset($_POST["submit"]) && isset($_POST["name"])){
 $name=$_POST["name"];
 $company_name=$_POST["company_name"];
 $price=$_POST["price"];
 $quantity=$_POST["quantity"];
 $mobile=$_POST["mobile"];
 $des=$_POST["des"];
 $quality=$_POST["quality"];
 $id=$_POST["id"];
 $imgNameForDB="";
 $file=$_FILES["file"]["tmp_name"];
 $fileType=$_FILES["file"]["type"];
 list($width,$height)=getimagesize($file);
 $nwidth=250; $nheight=300;
 $newImg=imagecreatetruecolor($nwidth,$nheight);
 $check=false;

 if($fileType == "image/jpeg")
 {
 $source=imagecreatefromjpeg($file);
 $imgName="items_".$mobile."_".$price."_".$quantity."_".strlen($name)."_".strlen($des).".jpg";
 $imgNameForDB="images/items/".$imgName;
 imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
 imagejpeg($newImg,'../images/items/'.$imgName);
 $check=true;
 }
 elseif($fileType == "image/png")
 {
     $source=imagecreatefrompng($file);
     $imgName="items_".$mobile."_".$price."_".$quantity."_".strlen($name)."_".strlen($des).".png";
     $imgNameForDB="images/items/".$imgName;
     imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
     imagepng($newImg,'../images/items/'.$imgName);
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
  $status=DBHelper::set("INSERT into items(name,company_name,price,quantity,mobile,quality,des,image,wholesale_id) VALUES('{$name}','{$company_name}','{$price}',{$quantity},'{$mobile}','{$quality}','{$des}','{$imgNameForDB}',{$id})");
  if($status)
  {
     ?>
     <script>     
           var success=$("#success").css("display","block").text("Product added successfully");
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
?>
