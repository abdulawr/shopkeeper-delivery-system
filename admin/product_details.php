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
        $products=DBHelper::get("select * from items where id={$_GET["id"]}")->fetch_assoc();
       
        $wholesale=DBHelper::get("SELECT * from wholesale WHERE id={$products["wholesale_id"]}")->fetch_assoc();
       ?>

        <!-- Page content -->
        <div class="container-fluid mt--6">
           
            <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Product Details</h3>
            </div>
           
            <div class="container-fluid">
            <div class="row">
            
            <div class="col-6 w-100 shadow bg-primary pt-2">
            <h1 class="text-center text-white pt-3">Product Information</h1>
            
            <div class="w-100 shadow circle mt-2" style="padding-top: 50px;">
            <div class="row bg-white p-5">
            <div class="col-8">

            <div>
            <h4 class="d-inline">Name:   <p class="d-inline"><?php echo $products["name"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Mobile:   <p class="d-inline"><?php echo $products["mobile"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Company:   <p class="d-inline"><?php echo $products["company_name"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Quality:   <p class="d-inline"><?php echo $products["quality"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Price:   <p class="d-inline">PKR-<?php echo $products["price"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Quantity:   <p class="d-inline"><?php echo $products["quantity"];?></p></h4>
            </div>
            
            </div>
            <div class="col-4">
            <img src="../<?php echo $products["image"];?>" width="100" height="100" alt="">
            </div>

            <div>
            <h4 class="d-inline text-justify">Description:   <p class="d-inline text-justify" style="text-align: justify;"><?php echo $products["des"];?></p></h4>
            </div>

            </div>
            </div>
            </div>


            <div class="col-6 w-100 shadow bg-primary pt-2">
            <h1 class="text-center text-white pt-3">Wholesale Dealer Information</h1>
            
            <div class="w-100 shadow circle mt-2" style="padding-top: 50px;">
            <div class="row bg-white p-5">
            <div class="col-8">

            <div>
            <h4 class="d-inline">Name:   <p class="d-inline"><?php echo $wholesale["name"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Mobile:   <p class="d-inline"><?php echo $wholesale["mobile"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">Address:   <p class="d-inline"><?php echo $wholesale["address"];?></p></h4>
            </div>
            <div>
            <h4 class="d-inline">CNIC:   <p class="d-inline"><?php echo $wholesale["cnic"];?></p></h4>
            </div>
            
            </div>
            <div class="col-4">
            <img src="../<?php echo $wholesale["image"];?>" width="100" height="100" alt="">
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
