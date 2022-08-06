
<?php include("include/header.php");
include_once("model/search_Shopkeeper.php");
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
                    
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">

           
            <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Search Shopkeeper</h3>

              <form action="" class="mt-3" method="post">
              
              <div class="row">
                <div class="col-4">
                    <input name="query" type="text" class="form-control" placeholder="First name" aria-label="Enter Query">
                </div>
                <div class="col-3">
                <select name="option" class="form-select form-select-lg" aria-label="Default select example">
                <option value="0" selected>Name</option>
                <option value="1">Mobile</option>
                <option value="2">CNIC</option>
                <option value="3">Email</option>
                </select>
                </div>
                <div class="col-2">
                    <button name="submit" type="submit" class="btn btn-primary">Search</button>
                </div>
               </div>

              </form>
             
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name"></th>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="completion">Email</th>
                    <th scope="col" class="sort" data-sort="completion">Mobile</th>
                    <th scope="col" class="sort" data-sort="completion">CNIC</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">

                 <?php
                 if($shopkeeper != null)
                 {
                 if($shopkeeper->num_rows > 0)
                 {
                  while($row=$shopkeeper->fetch_assoc()){
                    ?>
                    <tr>
                    <td scope="row">
                    <img src="../<?php echo $row["image"];?>" width="50" height="50" alt="">
                    </td>
                    <td scope="row"><?php echo $row["name"];?></td>
                    <td scope="row"><?php echo $row["email"];?></td>
                    <td scope="row"><?php echo $row["mobile"];?></td>
                    <td scope="row"><?php echo $row["cnic"]; ?></td>
                    <td class="text-center">
                      <a href="shopkeeper_Order.php?id=<?php echo $row["id"];?>" class="btn-sm btn-primary">Details</a>
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