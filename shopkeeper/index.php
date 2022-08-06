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

  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="../images/item1.png" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Spare Part</h2>                
                <p data-seq>A Huge Collection of Spare Part</p>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="../images/item2.png" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 40% Off</span>                
                <h2 data-seq>Oils & Lubricants</h2>                
                <p data-seq>Buy any type of Oils & Lubricants<</p>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="../images/item3.png" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 55% Off</span>                
                <h2 data-seq>Repair & Maintenance</h2>                
                <p data-seq>Additives, Degreasers, Engine treatments</p>
               
              </div>
            </li>
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq src="../images/item4.png" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 35% Off</span>                
                <h2 data-seq>Car,Truck Accessories</h2>                
                <p data-seq>Emergency Kits & Road Safety Devices</p>
               
              </div>
            </li>
            <!-- single slide item -->  
                  
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->

  
  <!-- banner section -->
  <section id="aa-banner" style="margin-top: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="../images/mainpagetop.png" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->

                    <?php
                    $popular=DBHelper::get("SELECT * FROM items ORDER BY RAND() LIMIT 10;");
                    if($popular->num_rows > 0)
                    {
                     while($row=$popular->fetch_assoc())
                     {
                    ?>
                      <li>
                      <figure>
                        <a class="aa-product-img" href="product-detail.php?id=<?php echo $row["id"];?>"><img src="../<?php echo $row["image"];?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="model/addCartList.php?id=<?php echo $row["id"];?>&page=index&price=<?php echo $row["price"];?>&wholesale=<?php echo $row["wholesale_id"];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></h4>
                          <span class="aa-product-price">PKR <?php echo $row["price"];?></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="model/addWishList.php?page=index&id=<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="product-detail.php?id=<?php echo $row["id"];?>" data-toggle2="tooltip" data-placement="top" title="View Details" data-toggle="modal" ><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
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
                  <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                 <?php
                    $popular=DBHelper::get("SELECT * FROM items ORDER BY RAND() LIMIT 10;");
                    if($popular->num_rows > 0)
                    {
                     while($row=$popular->fetch_assoc())
                     {
                    ?>
                      <li>
                      <figure>
                        <a class="aa-product-img" href="product-detail.php?id=<?php echo $row["id"];?>"><img src="../<?php echo $row["image"];?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="model/addCartList.php?id=<?php echo $row["id"];?>&page=index&price=<?php echo $row["price"];?>&wholesale=<?php echo $row["wholesale_id"];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></h4>
                          <span class="aa-product-price">PKR <?php echo $row["price"];?></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="model/addWishList.php?page=index&id=<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="product-detail.php?id=<?php echo $row["id"];?>" data-toggle2="tooltip" data-placement="top" title="View Details" data-toggle="modal" ><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
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
                  <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                  <?php
                    $popular=DBHelper::get("SELECT * FROM items ORDER BY RAND() LIMIT 10;");
                    if($popular->num_rows > 0)
                    {
                     while($row=$popular->fetch_assoc())
                     {
                    ?>
                      <li>
                      <figure>
                        <a class="aa-product-img" href="product-detail.php?id=<?php echo $row["id"];?>"><img src="../<?php echo $row["image"];?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="model/addCartList.php?id=<?php echo $row["id"];?>&page=index&price=<?php echo $row["price"];?>&wholesale=<?php echo $row["wholesale_id"];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></h4>
                          <span class="aa-product-price">PKR <?php echo $row["price"];?></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="model/addWishList.php?page=index&id=<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="product-detail.php?id=<?php echo $row["id"];?>" data-toggle2="tooltip" data-placement="top" title="View Details" data-toggle="modal" ><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
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
                   <a class="aa-browse-btn" href="product.php">Browse all Product<span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Get free shipping for all you order, receive any order at you shop</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>Get Money Back</h4>
                <P>Cancel you order at anytime if you found any issue in it</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>We are available to help you 24/7, contact us anytime you want </P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial" style="background-image: url(../images/mainback.png);">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->

              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="../images/member1.png" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Abdul Basit</p>
                    <span>Android Developer</span>
                    <a href="#">Web Developer</a>
                  </div>
                </div>
              </li>

              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="../images/member2.png" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>

               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="../images/member3.png" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

 
   <!-- banner section -->
  <section id="aa-banner" style="margin-top: 50px; margin-bottom:50px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="../images/bottompagebannner.png" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="img/client-brand-wordpress.png" alt="wordPress img"></a></li>
              <li><a href="#"><img src="img/client-brand-joomla.png" alt="joomla img"></a></li>
              <li><a href="#"><img src="img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="img/client-brand-wordpress.png" alt="wordPress img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <form action="" class="aa-subscribe-form" method="post">
              <input required type="email" name="email" placeholder="Enter your Email">
              <input name="submit" type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

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
if(isset($_POST["submit"]) && isset($_POST["email"]))
{
  if(DBHelper::set("INSERT INTO subscribe(email) VALUES('{$_POST["email"]}')"))
  {
    ?>
    <script>alert("Successfully submitted")</script>
    <?php
  }
}
?>