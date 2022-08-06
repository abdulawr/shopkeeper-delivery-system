<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
$shopKeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
if(DBHelper::set("INSERT into wishlist(item_id,shopkeeper_id) VALUES({$_GET["id"]},$shopKeeper);")){
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