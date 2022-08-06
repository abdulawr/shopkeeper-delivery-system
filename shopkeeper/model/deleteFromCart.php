<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
DBHelper::get("DELETE FROM cart where id={$_GET["id"]}");
?>
<script>
    location.href="../cart.php";
</script>
<?php
?>