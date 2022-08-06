<?php include("include/header.php"); ?>  
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

  <?php include("include/nav.php"); ?>   


 <!-- Cart view section -->
 <section id="cart-view" style="margin-bottom:50px;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
             <?php
             $shopkeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
             $profile=DBHelper::get("SELECT * from shopkeeper where id={$shopkeeper}")->fetch_assoc();
             ?>
           <div class="cart-view-table aa-wishlist-table">
             <form action="" method="post" class="form-inline">
            <div>
              <div class="form-group">
                <label for="exampleInputName2">Name</label>
                <input required name="name" style="width: 300px;" type="text" class="form-control" id="exampleInputName2" value="<?php echo $profile["name"];?>">
              </div>
              <div class="form-group" style="margin-left: 50px;">
                <label for="exampleInputEmail2">Email</label>
                <input required name="email" style="width: 300px;" type="email" class="form-control" id="exampleInputEmail2" value="<?php echo $profile["email"];?>">
              </div>
            </div>

            <div style="margin-top: 30px;">
              <div class="form-group">
                <label for="exampleInputName2">CNIC</label>
                <input required name="cnic" style="width: 300px;" type="number" class="form-control" id="exampleInputName2" value="<?php echo $profile["cnic"];?>">
              </div>
              <div class="form-group" style="margin-left: 50px;">
                <label for="exampleInputEmail2">Mobile</label>
                <input required name="mobile" style="width: 300px;" type="number" class="form-control" id="exampleInputEmail2" value="<?php echo $profile["mobile"];?>">
              </div>
            </div>

            <div style="margin-top: 30px;">
              <div class="form-group">
                <label for="exampleInputName2">Address</label>
                <input required name="address" style="width: 300px;" type="text" class="form-control" id="exampleInputName2" value="<?php echo $profile["address"];?>">
              </div>
              <div class="form-group" style="margin-left: 50px;">
                <label for="exampleInputEmail2">Password</label>
                <input required name="password" style="width: 300px;" type="Password" class="form-control" id="exampleInputEmail2" value="<?php echo Encryption::Decrypt($profile["password"]);?>">
              </div>
            </div>

            <button name="submit" type="submit" style="margin-top: 30px; margin-left:20px;"  class="btn btn-warning">Update</button>

            
             
            </form>             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <?php include("include/footer.php"); ?>  



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
if(isset($_POST["submit"]) && isset($_POST["name"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $cnic=$_POST["cnic"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
    $password=Encryption::Encrypt($_POST["password"]);
    $shopkeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
    $status=DBHelper::set("UPDATE shopkeeper set name='{$name}', email='{$email}', cnic='{$cnic}', mobile='{$mobile}', address='{$address}', password='{$password}' where id=$shopkeeper");
    if($status){
   ?>
   <script>
       alert('Successfully updated!');
   </script>
   <?php
    }
    else{
        ?>
<script> alert("Something went wrong try again")</script>
        <?php
    }
}
?>