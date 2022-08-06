<?php include("include/header.php");
$info=DBHelper::get("select * from companyinfo")->fetch_assoc();
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
              <h3 class="mb-0">Company Information</h3>
            </div>
           
            <form class="p-5" method="post" enctype="multipart/form-data">

            <div class="row">
            <div class="col">
                <input name="name" value="<?php echo $info["name"];?>" type="text" class="form-control" placeholder="Name" required aria-label="First name">
            </div>
            <div class="col">
                <input name="email" value="<?php echo $info["email"];?>" type="email" class="form-control" placeholder="Email" required aria-label="Last name">
            </div>
            </div>

            <div class="row mt-3">
            <div class="col">
                <input name="mobile" value="<?php echo $info["mobile"];?>" type="number" class="form-control" placeholder="Mobile" required aria-label="First name">
            </div>
            <div class="col">
                <input name="address" value="<?php echo $info["address"];?>" type="text" class="form-control" placeholder="Address" required aria-label="Last name">
            </div>
            </div>
           
           
            <button name="submit" type="submit" class="btn btn-primary mt-4">Update</button>
            </form>


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

<?php
if(isset($_POST["submit"]) && isset($_POST["email"]) && isset($_POST["name"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
   
    if(DBHelper::set("UPDATE `companyinfo` SET `name`='{$name}',`mobile`='{$mobile}',`email`='{$email}',`address`='{$address}' "))
    {
        ?>
        <script>alert("Successfully updated")</script>
        <?php
    }
    else{
    ?>
    <script>alert("Something went wrong try again")</script>
    <?php
    }

}
?>