<?php 
include("../../include/conn.php");
include("../../include/DBHelper.php");
if(isset($_POST["submit"]))
 foreach($_POST as $key=>$value){
  DBHelper::set("UPDATE cart SET qty=$value WHERE id=$key");
 }
 ?>
 <script>location.href="../cart.php";</script>
 <?php
?>