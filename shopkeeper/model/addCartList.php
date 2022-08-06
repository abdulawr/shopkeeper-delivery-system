<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
$shopKeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
$price=$_GET["price"];
$wholesale=$_GET["wholesale"];
if(DBHelper::set("INSERT into cart(shopkeeper_id,item_id,qty,price,wholeId,order_id) VALUES($shopKeeper,{$_GET["id"]},1,$price,$wholesale,0)")){
    ?>
    <script>
        alert("Successfully Added");
        var page="<?php echo $_GET['page']; ?>";
        location.href="../"+page+".php";
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("Something went wrong try again");
        var page="<?php echo $_GET['page']; ?>";
        location.href="../"+page+".php";
    </script>
    <?php
}
?>