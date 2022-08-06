<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
$check=DBHelper::set("UPDATE cart SET delivery_status=1 WHERE id={$_GET["cart_id"]}");
$order_id=$_GET["order_id"];
if($check)
{
 $orderCount=DBHelper::get("SELECT number_of_items from orders where id=$order_id")->fetch_assoc()["number_of_items"];
 $cout=DBHelper::get("SELECT count(id) as 'total' from cart WHERE delivery_status = 1 and order_id = $order_id;")->fetch_assoc()["total"];
 if($orderCount == $cout)
 {
  DBHelper::set("UPDATE orders set status=1 WHERE id=$order_id");
 }
 ?>
 <script>
     alert('Successfully updated the stutus of order');
     location.href="../index.php";
 </script>
 <?php
}
else{
    ?>
   <script>
       alert("Something went wrong try again");
       location.href="../index.php";
   </script>
    <?php
}
?>