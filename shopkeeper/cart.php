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
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="../images/top.png" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view" style="margin-bottom: 40px;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="model/updateCart.php" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $shopkeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
                      $result=DBHelper::get("SELECT items.id,cart.id as 'carid',items.name,items.price as 'single',items.image,cart.qty,cart.price as 'total' from items INNER JOIN cart on items.id = cart.item_id where cart.shopkeeper_id = {$shopkeeper} and cart.status = 0");
                      $totalamount=0;
                      if($result->num_rows > 0){
                       while($row=$result->fetch_assoc())
                       {
                         ?>
                       <tr>
                        <td><a class="remove" href="model/deleteFromCart.php?id=<?php echo $row["carid"];?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="product-detail.php?id=<?php echo $row["id"];?>"><img src="../<?php echo $row["image"];?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></td>
                        <td>PKR-<?php echo $row["single"];?></td>
                        <td><input name="<?php echo $row["carid"];?>" class="aa-cart-quantity" type="number" value="<?php echo $row["qty"];?>"></td>
                        <td>PKR-<?php echo $row["single"] * $row["qty"];?></td>
                      </tr>
                         <?php
                         $totalamount+=$row["single"] * $row["qty"];
                       }
                      }
                      else{
                        ?>
                        <h2>Nothing to show</h2>
                        <?php
                      }
                     ?>
                                         
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                       
                          <input name="submit" class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                  
                   <tr>
                     <th>Total</th>
                     <td>PKR-<?php echo $totalamount;?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->




  <?php include("include/footer.php");?>
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

