<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
     <!-- Font awesome -->
     <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="../css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="../stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="../stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="../stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="../css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="../css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">  
</head>
</html>
<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
if(isset($_POST["pp_ResponseCode"]))
{
if($_POST["pp_ResponseCode"] == "000")
{
  $amount=$_POST["pp_Amount"]/100;
  $count=$_POST["ppmpf_1"];
  $shopkeeper_id=$_POST["ppmpf_2"];
  $order=DBHelper::set("INSERT into orders(shopkeeper_id,price,number_of_items) VALUES($shopkeeper_id,$amount,$count)");
  if($order){
   $order_id=$con->insert_id;
    DBHelper::set("UPDATE cart SET order_id=$order_id,status=1 where status=0 and shopkeeper_id=$shopkeeper_id");
    ?>
    <div style="border: 2px solid red; padding:10px; width:90%; margin:20px auto;">
                <h1 style="text-align: center;">Order Invoice</h1>
                <p><b>Date: </b><?php echo date("d/m/Y");?></p>
                <div class="checkout-right">
                
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $total=0;
                      $result=DBHelper::get("SELECT items.name,cart.qty,items.price from cart INNER JOIN items on cart.item_id = items.id WHERE order_id=$order_id;");
                      while($row=$result->fetch_assoc())
                      {
                        ?>
                      <tr>
                          <td><?php echo $row["name"];?> <strong> x  <?php echo $row["qty"];?></strong></td>
                          <td>PKR-<?php echo $row["price"] * $row["qty"];?></td>
                        </tr>
                        <?php
                        $total+=$row["price"] * $row["qty"];
                      }
                     ?>  
                       
                      </tbody>
                      <tfoot>
                         <tr>
                          <th>Total</th>
                          <td>PKR-<?php echo $total;?></td>
                        </tr>
                      </tfoot>
                    </table>
                    <a href="../index.php" class="btn btn-success" style="margin:10px auto">Completed</a>
                  </div>                 
                </div>
                </div>
                <script>
                window.print();
                </script>

    <?php
  }
  else{
    ?>
    <script>
    alert("Something went wrong in inserting order data");
    location.href="../checkout.php"
    </script>
    <?php
  }
}
else{
    $message=$_POST["pp_ResponseMessage"];
    ?>
    <script>
    var msg="<?php echo $message;?>"
    alert(msg);
    location.href="../checkout.php"
    </script>
    <?php
}
}
?>

