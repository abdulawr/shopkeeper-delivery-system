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

        <!-- Page content -->
        <div class="container-fluid mt--6">
           
            <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Update Your Profile</h3>
            </div>
           
            <form class="p-5" method="post" enctype="multipart/form-data">

            <div class="row">
            <div class="col">
                <input name="name" type="text" class="form-control" value="<?php echo $userData["name"];?>" required aria-label="First name">
            </div>
            <div class="col">
                <input name="email" type="email" class="form-control" value="<?php echo $userData["email"];?>" required aria-label="Last name">
            </div>
            </div>

            <div class="row mt-3">
            <div class="col">
                <input name="mobile" type="number" class="form-control" value="<?php echo $userData["mobile"];?>" required aria-label="First name">
            </div>
            <div class="col">
                <input name="password" type="password" class="form-control" value="<?php echo Encryption::Decrypt($userData["password"]);?>" required aria-label="Last name">
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
    $password=Encryption::Encrypt($_POST["password"]);
    $userid=Encryption::Decrypt($_SESSION["admin"]);
    if(DBHelper::set("UPDATE admin SET name='{$name}', email='{$email}', mobile='{$mobile}', password='{$password}' where id=$userid")){
        ?>
        <script>
            alert('Profile updated successfully!');
            location.href="dashboard.php";
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Something went wrong try again');
        </script>
        <?php
    }
}
?>