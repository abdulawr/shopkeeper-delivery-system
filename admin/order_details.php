<?php include("include/header.php");?>

<body>
    <!-- Sidenav -->
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php include("include/nav_top.php");?>  
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>

        <?php
        $products=DBHelper::get("SELECT cart.qty,items.name,items.price,items.image from cart INNER JOIN items on cart.item_id = items.id WHERE cart.order_id={$_GET["id"]}");
        $shopID=DBHelper::get("SELECT DISTINCT(shopkeeper_id) as 'id' from cart WHERE order_id = {$_GET["id"]}")->fetch_assoc()["id"];
        $shopkeeper=DBHelper::get("SELECT * from shopkeeper WHERE id=$shopID")->fetch_assoc();
       ?>

        <!-- Page content -->
        <div class="container-fluid mt--6">
           
            <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Order Details</h3>
            </div>
           
            <div class="container-fluid">
            <div class="row">
            
            <div class="col-6 w-100 ">
             <h2 class="text-center">Items Information</h2>

             <?php 
             while($row=$products->fetch_assoc())
             {
              ?>
            <div class="w-100 shadow circle p-2 mt-2">
            <div class="row">
            <div class="col-8">
            <div>
            <h4 class="d-inline">Name:   <p class="d-inline"><?php echo $row["name"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Quantity:   <p class="d-inline"><?php echo $row["qty"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Price:   <p class="d-inline">PKR-<?php echo $row["price"];?></p></h4>
            </div>
            </div>
            <div class="col-4">
            <img src="../<?php echo $row["image"];?>" width="100" height="100" alt="">
            </div>
            </div>
            </div>
              <?php
             }
             ?>
            </div>


            <div class="col-6 w-100 shadow bg-primary pt-2">
            <h1 class="text-center text-white pt-3">Shopkeeper Information</h1>
            
            <div class="w-100 shadow circle mt-2" style="padding-top: 50px;">
            <div class="row bg-white p-5">
            <div class="col-8">

            <div>
            <h4 class="d-inline">Name:   <p class="d-inline"><?php echo $shopkeeper["name"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Mobile:   <p class="d-inline"><?php echo $shopkeeper["mobile"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Address:   <p class="d-inline"><?php echo $shopkeeper["address"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">CNIC:   <p class="d-inline"><?php echo $shopkeeper["cnic"];?></p></h4>
            </div>
            
            </div>
            <div class="col-4">
            <img src="../<?php echo $shopkeeper["image"];?>" width="100" height="100" alt="">
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>

          </div>
        </div>
      </div>
           
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
