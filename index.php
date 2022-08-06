<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap/bootstrap.css">
    <title>Home</title>
    <style>
       .hov:hover{
           color: black;
           background-color: yellow;
           border-right: 5px solid #FFA500;
       }
       h2{
           color: grey;
           text-decoration: none;
       }
       a:hover{
        text-decoration: none;
        color: blue;
       }
    </style>
</head>
<body>
    
    <div class="container">
    <div class="row mt-5">
    <div class="col-3 w-100 shadow rounded text-center hov ml-5">
     <a href="shopkeeper/index.php">
     <div>
     <img src="images/shop.png" width="120" height="120" alt="" class="mt-2">
     <h2 class="mt-2 mb-3">Shopkeeper</h2>
     </div>
     </a>
    </div>

    <div class="col-1"></div>

    <div class="col-3 w-100 shadow rounded text-center hov">
     <a href="wholesale/login.php">
     <div>
     <img src="images/wholesaler.png" width="120" height="120" alt="" class="mt-2">
     <h2 class="mt-2 mb-3">Wholesale</h2>
     </div>
     </a> 
    </div>

    <div class="col-1"></div>

    <div class="col-3 w-100 shadow rounded text-center hov">
    <a href="admin/index.php">
     <div>
     <img src="images/admin.png" width="120" height="120" alt="" class="mt-2">
     <h2 class="mt-2 mb-3">Admin</h2>
     </div>
     </a>
    </div>
    </div>
    </div>

</body>
</html>