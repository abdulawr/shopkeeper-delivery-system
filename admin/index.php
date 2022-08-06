<?php
session_start();
if(isset($_SESSION["admin"]))
{
 header("Location:dashboard.php");
}
include("../include/conn.php");
include("../include/DBHelper.php");
include("../include/Encryption.php");
include("../include/HelperFunction.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="../wholesale/boot4/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>

    <div class="main-content" id="panel">
      <div class="w-50 mx-auto bg-white shadow--hover border-0 mt-5 rounded " >
        <h3 class="text-center pt-3 display-5 pb-0">LOGIN</h3>
      <form class="p-5" method="post">
      <div id="error" class="alert alert-danger d-none" role="alert">
        A simple danger alert—check it out!
      </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input required name="pass" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button name="submit" type="submit" class="btn btn-primary">Login</button>
      </form>
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
if(isset($_GET["error"]))
{
  ?>
  <script>
 $("#error").addClass("d-block").text("Direct access is not allowed");
  </script>
   <?php
}
?>

<?php
if(isset($_POST["submit"]) && isset($_POST["email"])){
  $email=$_POST["email"];
  $pass=Encryption::Encrypt($_POST["pass"]);
  $result=DBHelper::get("SELECT id FROM admin WHERE email='{$email}' and password='{$pass}'");
  if($result->num_rows > 0){
   $_SESSION["admin"]=Encryption::Encrypt($result->fetch_assoc()["id"]);
   ?>
   <script>
     location.href="dashboard.php";
   </script>
   <?php
  }
  else{
    ?>
   <script>
  $("#error").addClass("d-block").text("Invalid email or password");
   </script>
    <?php
  }
}
?>
