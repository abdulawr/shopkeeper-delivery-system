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
        <h2>Wishlist Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">Wishlist</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view" style="margin-bottom:50px;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                 $id=Encryption::Decrypt($_COOKIE["shopkeeper"]);
                 $result=DBHelper::get("SELECT wishlist.id as 'wishID',items.id,items.wholesale_id,items.name,price,items.image from items INNER JOIN wishlist on wishlist.item_id = items.id WHERE wishlist.shopkeeper_id = {$id}");
                if($result->num_rows > 0)
                {
                 while($row=$result->fetch_assoc())
                 {
                  ?>
                  <tr>
                        <td><a class="remove" href="model/deleteWhistList.php?id=<?php echo $row["wishID"];?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="product-detail.php?id=<?php echo $row["id"];?>"><img src="../<?php echo $row["image"];?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></td>
                        <td>PKR-<?php echo $row["price"];?></td>
                        <td>In Stock</td>
                        <td><a href="model/addCartList.php?id=<?php echo $row["id"];?>&page=wishlist&price=<?php echo $row["price"];?>&wholesale=<?php echo $row["wholesale_id"];?>" class="aa-add-to-cart-btn">Add To Cart</a></td>
                      </tr>
                  <?php
                 }
                } 
                else{
                  ?>
                 <h2>Nothing to show</h2>
                  <?php
                }               
                ?>
                                                             
                      </tbody>
                  </table>
                </div>
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