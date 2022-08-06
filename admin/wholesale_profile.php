<?php include("include/header.php"); ?>

<body>
    <!-- Sidenav -->
    <?php include("include/nav.php");?>   
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
        <!-- Page content -->
        <div class="container-fluid mt--6">

        <?php
        $wholeName=DBHelper::get("select name from wholesale where id = {$_GET["id"]}")->fetch_assoc()["name"];
        $prod=DBHelper::get("SELECT cart.qty,items.name,items.company_name,items.image,items.price,cart.delivery_status from cart INNER JOIN items on cart.item_id = items.id WHERE cart.wholeId = {$_GET["id"]}");
        ?>
           
        <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Order For <?php echo $wholeName;?> <small>(Wholesale)</small></h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name"></th>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="completion">Company</th>
                    <th scope="col" class="sort" data-sort="completion">Price</th>
                    <th scope="col" class="sort" data-sort="completion">Quantity</th>
                    <th scope="col" class="sort" data-sort="completion">Status</th>
                    
                  </tr>
                </thead>
                <tbody class="list">

                 <?php
                 if($prod->num_rows > 0)
                 {
                  while($row=$prod->fetch_assoc()){
                    ?>
                    <tr>
                    <td scope="row">
                    <img src="../<?php echo $row["image"];?>" width="50" height="50" alt="">
                    </td>
                    <td scope="row"><?php echo $row["name"];?></td>
                    <td scope="row"><?php echo $row["company_name"];?></td>
                    <td scope="row">PKR-<?php echo $row["price"];?></td>
                    <td scope="row"><?php echo $row["qty"]; ?></td>
                    <td scope="row"><?php echo ($row["delivery_status"] == "0")?"Pending":"Completed"; ?></td>
                    
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
          </div>
        </div>
      </div>

    <?php
    $whole_product=DBHelper::get("select * from items where wholesale_id = {$_GET["id"]}");
    ?>
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Products Added By <?php echo $wholeName;?> <small>(Wholesale)</small></h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="name"></th>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="completion">Company</th>
                    <th scope="col" class="sort" data-sort="completion">Price</th>
                    <th scope="col" class="sort" data-sort="completion">Quantity</th>
                    <th scope="col" class="sort" data-sort="completion">Mobile</th>
                    <th scope="col" class="sort" data-sort="completion">Quality</th>
                  </tr>
                </thead>
                <tbody class="list">

                 <?php
                 if($whole_product->num_rows > 0)
                 {
                  while($row=$whole_product->fetch_assoc()){
                    ?>
                    <tr>
                    <td scope="row"><?php echo $row["id"];?></td>
                    <td scope="row">
                    <img src="../<?php echo $row["image"];?>" width="50" height="50" alt="">
                    </td>
                    <td scope="row"><?php echo $row["name"];?></td>
                    <td scope="row"><?php echo $row["company_name"];?></td>
                    <td scope="row">PKR-<?php echo $row["price"];?></td>
                    <td scope="row"><?php echo $row["quantity"]; ?></td>
                    <td scope="row"><?php echo $row["mobile"] ?></td>
                    <td scope="row"><?php echo $row["quality"] ?></td>
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