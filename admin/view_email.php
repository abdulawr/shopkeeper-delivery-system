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
        DBHelper::set("update contact SET status=1 where id={$_GET["id"]}");
        $email=DBHelper::get("select * from contact where id={$_GET["id"]}")->fetch_assoc();
        ?>
           
            <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h4 class="mb-0">ID:  <small><?php echo $email["id"];?></small></h4>
              <h4 class="mb-0">Name:  <small><?php echo $email["name"];?></small></h4>
              <h4 class="mb-0">Email:  <small><?php echo $email["email"];?></small></h4>
              <h4 class="mb-0">Mobile:  <small><?php echo $email["mobile"];?></small></h4>
              
            </div>
            <hr>
            <div class="container">
            <h3 class="mb-0">Subject</h3>
            <p><?php echo $email["subject"];?></p>
            <h3 class="mb-0">Message</h3>
            <p><?php echo $email["message"];?></p>
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