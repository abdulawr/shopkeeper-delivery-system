<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">

                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span><?php echo $info["mobile"];?></p>
                </div>

                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-envelope"></span><?php echo $info["email"];?></p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.php">My Account</a></li>
                  
                  <?php
                    if(isset($_COOKIE["shopkeeper"]))
                    {
                    ?>
                    <li class="hidden-xs"><a href="wishlist.php">Wishlist</a></li>
                    <li class="hidden-xs"><a href="cart.php">My Cart</a></li>
                    <li class="hidden-xs"><a href="checkout.php">Checkout</a></li>
                    <li><a href="model/logout.php">Logout</a></li>
                    <?php
                    }
                  ?>
          
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
               <?php 
               if(isset($_COOKIE["shopkeeper"]))
               {
                 $id=Encryption::Decrypt($_COOKIE["shopkeeper"]);
                 $total=DBHelper::get("SELECT count(id) as 'total' from cart where cart.status=0 and cart.shopkeeper_id = $id")->fetch_assoc()["total"];
                 ?>
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="cart.php">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify"><?php echo $total;?></span>
                </a>
              </div>
              <?php
               }
               ?>
             
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="product.php" method="post">
                  <input required type="text" name="query" placeholder="Search product ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              
              <li><a href="index.php">Home</a></li>

              <li><a href="product.php">Products</a></li>

              <?php 
               if(isset($_COOKIE["shopkeeper"]))
               {
                 ?>
              <li><a href="wishlist.php">Wishlist</a></li>                   
              <li><a href="cart.php">Cart</a></li>  
              <li><a href="order.php">Orders</a></li>           
              <li><a href="profile.php">Profile</a></li> 
              <li><a href="chat.php">Chat</a></li>  
                 <?php } ?>
                        
              <li><a href="contact.php">Contact</a></li>
             
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>