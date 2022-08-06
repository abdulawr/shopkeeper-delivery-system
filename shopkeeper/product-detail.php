<?php include("include/header.php");
$product=DBHelper::get("select * from items where id={$_GET["id"]}")->fetch_assoc();
?> 
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
        <h2><?php echo $product["name"];?></h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>         
          <li><a href="product.php">Product</a></li>
          <li class="active">Product Details</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-lens-image"><img src="../<?php echo $product["image"];?>" class="simpleLens-big-image"></a></div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo $product["name"];?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">PKR <?php echo $product["price"];?></span>
                      <p class="aa-product-avilability">Avilability: <span>In Stoke</span></p>
                      <p class="aa-product-avilability">Company: <span><?php echo $product["company_name"];?></span></p>
                      <p class="aa-product-avilability">Quantity: <span><?php echo $product["quantity"];?></span></p>
                      <p class="aa-product-avilability">Quality: <span><?php echo $product["quality"];?></span></p>
                      <p class="aa-product-avilability">Dealer Mobile: <span><?php echo $product["mobile"];?></span></p>
                    </div>
                  
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="model/addCartList.php?id=<?php echo $product["id"];?>&page=product&price=<?php echo $product["price"];?>&wholesale=<?php echo $product["wholesale_id"];?>">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="model/addWishList.php?page=product&id=<?php echo $product["id"];?>">Wishlist</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p style="text-align: justify;"><?php echo $product["des"];?></p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>Reviews for <?php echo $product["name"];?></h4> 
                   <ul class="aa-review-nav">

                    <?php
                    $id=$product["id"];
                    $result=DBHelper::get("SELECT shopkeeper.name,shopkeeper.image,date,rating,review from review INNER JOIN shopkeeper on review.shopkeeper_id = shopkeeper.id WHERE review.item_id=$id");
                    if($result->num_rows > 0)
                    {
                    while($row=$result->fetch_assoc())
                    {
                    ?>
                        <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="../<?php echo $row["image"];?>" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong><?php echo $row["name"];?></strong> - <span><?php echo $row["date"];?></span></h4>
                            <div class="aa-product-rating">
                             <?php
                             for($i=0; $i<$row["rating"]; $i++)
                             {
                               ?>
                              <span class="fa fa-star"></span>
                               <?php
                             }
                             ?>
                            </div>
                            <p><?php echo $row["review"];?></p>
                          </div>
                        </div>
                      </li>
                    <?php
                    }
                    }
                    else{
                      ?>
                      <h2>Nothing to show</h2>
                      <?php
                    }
                    ?>
                  
                  </ul>

                <?php 
                if(isset($_COOKIE["shopkeeper"]))
                {
                  ?>
                  <h4 style="margin-top: 50px;">Add a review</h4>
                  <!-- review form -->
                   <form action="model/review.php" class="aa-review-form" method="post">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea name="review" required class="form-control" rows="3" id="message"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="rating">Rating</label>
                        <select name="rating" id="rating" class="form-control">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        </select>
                      </div>                 
                       <input name="itemID" type="hidden" value="<?php echo $product["id"];?>">
                      <button name="ReviewItem" type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                  <?php
                }
                ?>

                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product --> 
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->

<?php include("include/footer.php");?>
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