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
           
           <div class="cart-view-table aa-wishlist-table">
            <h1>Details About Us</h1> 
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non leo sapien. Praesent egestas augue ut dolor porta aliquet. Donec fringilla volutpat lectus, non bibendum libero fringilla vitae. Ut cursus, nisi ut tempor pulvinar, orci nisl aliquet sem, in feugiat odio magna nec metus. Quisque faucibus vehicula sapien sit amet condimentum. Quisque convallis aliquet turpis, at iaculis tortor euismod vel. Pellentesque bibendum non tellus eget vehicula. Sed magna purus, pretium nec convallis ac, facilisis vel ligula. Aenean ac dictum est. Integer ut sem eros. Pellentesque consequat mauris at mi molestie, eu vestibulum massa gravida. Etiam ornare bibendum condimentum. Quisque eget vehicula nulla.
            </p> 
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non leo sapien. Praesent egestas augue ut dolor porta aliquet. Donec fringilla volutpat lectus, non bibendum libero fringilla vitae. Ut cursus, nisi ut tempor pulvinar, orci nisl aliquet sem, in feugiat odio magna nec metus. Quisque faucibus vehicula sapien sit amet condimentum. Quisque convallis aliquet turpis, at iaculis tortor euismod vel. Pellentesque bibendum non tellus eget vehicula. Sed magna purus, pretium nec convallis ac, facilisis vel ligula. Aenean ac dictum est. Integer ut sem eros. Pellentesque consequat mauris at mi molestie, eu vestibulum massa gravida. Etiam ornare bibendum condimentum. Quisque eget vehicula nulla.
            </p>           
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