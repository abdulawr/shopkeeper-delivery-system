<?php include("include/header.php");?>

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
              <h3 class="mb-0">Add New Admin</h3>
            </div>
           
            <form class="p-5" method="post" enctype="multipart/form-data">

            <div class="row">
            <div class="col">
                <input name="name" type="text" class="form-control" placeholder="Name" required aria-label="First name">
            </div>
            <div class="col">
                <input name="email" type="email" class="form-control" placeholder="Email" required aria-label="Last name">
            </div>
            </div>

            <div class="row mt-3">
            <div class="col">
                <input name="mobile" type="number" class="form-control" placeholder="Mobile" required aria-label="First name">
            </div>
            <div class="col">
                <input name="password" type="password" class="form-control" placeholder="Password" required aria-label="Last name">
            </div>
            </div>

            <div class="mt-3">
            <input name="file" type="file">
            </div>
           
           
            <button name="submit" type="submit" class="btn btn-primary mt-4">Submit</button>
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
    $imageN=explode("@",$email)[0];
    $fileType=explode("/",$_FILES["file"]["type"])[1];
    $imagePath="Admin_".$mobile."_".$imageN."_.".$fileType;
    if(move_uploaded_file($_FILES["file"]["tmp_name"], "../images/admin/".$imagePath))
    {
     if(DBHelper::set("INSERT INTO admin(name,email,mobile,password,image) VALUES('{$name}','{$email}','{$mobile}','{$password}','{$imagePath}')"))
     {
        ?>
        <script>alert("Admin account created successfully");</script>
        <?php
     }
     else{
        ?>
        <script>alert("Something went wrong try again");</script>
        <?php 
     }
    }
    else{
        ?>
        <script>alert("Problem in file uploading");</script>
        <?php
    }

}
?>