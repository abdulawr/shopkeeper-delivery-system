<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="boot4/bootstrap.css">
</head>
<body>

<?php
include_once("../include/conn.php");
include_once("../include/DBHelper.php");
$result=DBHelper::get("SELECT cart.id as 'cart_id',cart.order_id as 'order_id',items.company_name,items.name as 'itemName',items.image as 'item_image',items.price,cart.qty,cart.item_id as 'itemID',shopkeeper.name as 'shopname',shopkeeper.email,shopkeeper.mobile,shopkeeper.address,shopkeeper.cnic,shopkeeper.image as 'user_image',cart.shopkeeper_id as 'shopkeeper_id' from cart INNER JOIN items on cart.item_id = items.id INNER JOIN shopkeeper on cart.shopkeeper_id = shopkeeper.id WHERE cart.id={$_GET["id"]};")->fetch_assoc();
?>

<div style="width: 70%;  margin:30px auto;" class="border border-warning p-2">
 <h2 class="text-center">Product Information</h2>
 <div class="row">
     <div class="col-6">
        <p><b>ID:  </b><?php echo $result["itemID"];?></p>
        <p><b>Name:  </b><?php echo $result["itemName"];?></p>
        <p><b>Company Name:  </b><?php echo $result["company_name"];?></p>
        <p><b>Price:  </b><?php echo $result["price"] * $result["qty"];?></p>
        <p><b>Quantity:  </b><?php echo $result["qty"];?></p>

     </div>
     <div class="col-6">
     <img width="200" height="200" src="../<?php echo $result["item_image"];?>" class="img-thumbnail" alt="...">
     </div>
 </div>

</div>

<div style="width: 70%;  margin:30px auto;" class="border border-dark p-2">
<h2 class="text-center">Shopkeeper Information</h2>
<div class="row">
     <div class="col-6">
        <p><b>ID:  </b><?php echo $result["shopkeeper_id"];?></p>
        <p><b>Name:  </b><?php echo $result["shopname"];?></p>
        <p><b>Mobile:  </b><?php echo $result["mobile"];?></p>
        <p><b>Address:  </b><?php echo $result["address"];?></p>
        <p><b>Email:  </b><?php echo $result["email"];?></p>
        
     </div>
     <div class="col-6">
     <img src="../<?php echo $result["user_image"];?>" class="img-thumbnail" alt="...">
     </div>
 </div>
</div>

<div style="text-align: center;" class="mb-5">
<button onclick="window.print()" type="button" class="btn btn-primary">Print</button>
<a href="model/completeOrder.php?cart_id=<?php echo $result["cart_id"];?>&order_id=<?php echo $result["order_id"];?>" class="btn btn-warning">Complete</a>
</div>


</body>
</html>