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


  <!-- Start header section -->
  <?php include("include/nav.php"); ?>
  <!-- / menu -->  
 
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>We are wating to assist you..</h2>
             <p>Contact us for any query or suggestion or report new problem</p>
           </div>
           <!-- contact map -->
          
           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">

                  <!-- Message Part Start -->
                  <div id="success" class="alert alert-success" style="display: none;" role="alert">
                   Successfully submitted
                  </div>

                  <div id="error" class="alert alert-danger " style="display: none;" role="alert">
                    Something went wrong try again
                  </div>
                  <!-- Message Pare End -->

                   <form class="comments-form contact-form" action="" method="post">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input required name="name" type="text" placeholder="Your Name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input required name="email" type="email" placeholder="Email" class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input required name="subject" type="text" placeholder="Subject" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input required name="mobile" type="text" placeholder="Mobile" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea required name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button name="submit" class="aa-secondary-btn">Submit</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4><?php echo $info["name"];?></h4>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum modi dolor facilis! Nihil error, eius.</p>
                     <p><span class="fa fa-home"></span><?php echo $info["address"];?></p>
                     <p><span class="fa fa-phone"></span><?php echo $info["mobile"];?></p>
                     <p><span class="fa fa-envelope"></span>Email: <?php echo $info["email"];?></p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

  <!-- footer -->  
  <?php include("include/footer.php"); ?>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>


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
if(isset($_POST["submit"]) && isset($_POST["mobile"]) && isset($_POST["name"]))
{
  $name=validateInput($_POST["name"]);
  $email=$_POST["email"];
  $subject=$_POST["subject"];
  $mobile=$_POST["mobile"];
  $message=$_POST["message"];
  if(DBHelper::set("INSERT INTO contact(name,email,mobile,subject,message) VALUES('{$name}','{$email}','{$mobile}','{$subject}','{$message}');"))
  {
?>
<script>
  var success=$("#success").css("display","block");
  var error=$("#error").css("display","none");
  </script>
<?php
  }
  else{
    ?>
<script>
  var success=$("#success").css("display","none");
  var error=$("#error").css("display","block");
  </script>
    <?php
  }
}
?>