<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
$id=$_GET["id"];
DBHelper::get("DELETE from items WHERE id=$id");
?>
<script>
location.href="../products.php";
</script>
<?php
?>