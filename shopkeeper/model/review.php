<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
$review=$_POST["review"];
$rating=$_POST["rating"];
$itemID=$_POST["itemID"];
$shopkeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
$result=DBHelper::set("INSERT INTO review(item_id,rating,review,shopkeeper_id) VALUES($itemID,$rating,'{$review}',$shopkeeper)");
if($result){
?>
<script>
alert('Successfully added');
var id="<?php echo $itemID;?>";
location.href="../product-detail.php?id="+id;
</script>
<?php
}
else{
?>
<script>
alert("Something went wrong try again")
var id="<?php echo $itemID;?>";
location.href="../product-detail.php?id="+id;
</script>
<?php
}
?>