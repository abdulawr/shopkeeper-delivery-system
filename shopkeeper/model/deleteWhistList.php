<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
DBHelper::get("DELETE FROM wishlist where id={$_GET["id"]}");
?>
<script>
    location.href="../wishlist.php";
</script>
<?php
?>