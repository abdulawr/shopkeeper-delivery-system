<?php include("include/header.php");
$counts=DBHelper::get("SELECT  (
  SELECT COUNT(id)
  FROM   shopkeeper
) AS shopkeeper,
(
  SELECT COUNT(id)
  FROM   wholesale
) AS wholesale,
(
  SELECT COUNT(id)
  FROM   items
) AS items,
(
  SELECT COUNT(id)
  FROM   orders
) AS orders

")->fetch_assoc();
?>

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
                    
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Wholesale</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $counts["wholesale"];?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-active-40"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
            
                                        <span class="text-nowrap">Total Wholesale Dealers</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">ShopKeepers</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $counts["shopkeeper"];?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-chart-pie-35"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                       
                                        <span class="text-nowrap">Total ShopKeeper</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $counts["items"];?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="ni ni-money-coins"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                       
                                        <span class="text-nowrap">Total Product Active</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Orders</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $counts["orders"];?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                       
                                        <span class="text-nowrap">Total Orders Placed</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">

        <?php
        $order=DBHelper::get("SELECT orders.id,orders.price,number_of_items,status,date,shopkeeper.name from orders INNER JOIN shopkeeper on orders.shopkeeper_id = shopkeeper.id;");
        ?>
           
            <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Order List</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Date</th>
                    <th scope="col" class="sort" data-sort="budget">Shopkeeper</th>
                    <th scope="col" class="sort" data-sort="completion">Amount</th>
                    <th scope="col" class="sort" data-sort="completion">No. Item</th>
                    <th scope="col" class="sort" data-sort="completion">Status</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">

                 <?php
                 if($order->num_rows > 0)
                 {
                  while($row=$order->fetch_assoc()){
                    ?>
                    <tr>
                    <td scope="row"><?php echo $row["date"];?></td>
                    <td scope="row"><?php echo $row["name"];?></td>
                    <td scope="row"><?php echo $row["price"];?></td>
                    <td scope="row"><?php echo $row["number_of_items"];?></td>
                    <td scope="row"><?php echo ($row["status"] == "0") ? "Pending" : "Completed"; ?></td>
                    <td class="text-center">
                      <a href="order_details.php?id=<?php echo $row["id"];?>" class="btn-sm btn-primary">Details</a>
                    </td>
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