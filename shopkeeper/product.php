<?php include("include/header.php");
 $popular;
 if(isset($_POST["query"]))
 {
  $str="SELECT * from items WHERE name LIKE '%".$_POST["query"]."%' or company_name LIKE '%".$_POST["query"]."%'";
  $popular=DBHelper::get($str);
 }
 elseif(isset($_GET["query"]))
 {
  $str="SELECT * from items WHERE name LIKE '%".$_GET["query"]."%' or company_name LIKE '%".$_GET["query"]."%'";
  $popular=DBHelper::get($str);
 }
 else{
  $popular=DBHelper::get("SELECT * FROM items ORDER BY RAND() LIMIT 40;");
 }

 $rece
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


<?php include("include/nav.php");?>

  <!-- product category -->
  <section id="aa-product-category" style="margin-top: 30px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>



            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->

                <?php
                   
                    if($popular->num_rows > 0)
                    {
                     while($row=$popular->fetch_assoc())
                     {
                    ?>
                      <li>
                      <figure>
                        <a class="aa-product-img" href="product-detail.php?id=<?php echo $row["id"];?>"><img src="../<?php echo $row["image"];?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="model/addCartList.php?id=<?php echo $row["id"];?>&page=product&price=<?php echo $row["price"];?>&wholesale=<?php echo $row["wholesale_id"];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></h4>
                          <span class="aa-product-price">PKR <?php echo $row["price"];?></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="model/addWishList.php?page=product&id=<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
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

              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
           
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <a href="product.php?query=car">car</a>
                <a href="product.php?query=bike">bike</a>
                <a href="product.php?query=oil">oil</a>
                <a href="product.php?query=engine">engine</a>
                <a href="product.php?query=break">break</a>
                <a href="product.php?query=paint">paint</a>
                <a href="product.php?query=seat">seat</a>
                <a href="product.php?query=light">light</a>
                <a href="product.php?query=body part">body part</a>
                <a href="product.php?query=wire">wire</a>
                <a href="product.php?query=tire">Tire</a>
              </div>
            </div>
            
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                 
                <?php
                $recent=DBHelper::get("SELECT * FROM items ORDER BY RAND() LIMIT 3;");
                if($recent->num_rows > 0)
                {
                  while($row=$recent->fetch_assoc())
                  {
                    ?>
                  <li>
                    <a href="product-detail.php?id=<?php echo $row["id"];?>" class="aa-cartbox-img"><img alt="img" src="../<?php echo $row["image"];?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></h4>
                      <p>PKR <?php echo $row["price"];?></p>
                    </div>                    
                  </li>
                    <?php
                  }
                }
                ?>
                                    
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>

               <?php
                $recent=DBHelper::get("SELECT * FROM items ORDER BY RAND() LIMIT 3;");
                if($recent->num_rows > 0)
                {
                  while($row=$recent->fetch_assoc())
                  {
                    ?>
                  <li>
                    <a href="product-detail.php?id=<?php echo $row["id"];?>" class="aa-cartbox-img"><img alt="img" src="../<?php echo $row["image"];?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="product-detail.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></h4>
                      <p>PKR <?php echo $row["price"];?></p>
                    </div>                    
                  </li>
                    <?php
                  }
                }
                ?>
                                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->

<?php include("include/footer.php");?>


    

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