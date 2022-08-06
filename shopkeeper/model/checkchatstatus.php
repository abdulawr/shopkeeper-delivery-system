<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
$id=Encryption::Decrypt($_COOKIE["shopkeeper"]);
$result=DBHelper::get("SELECT * from chatroom WHERE user_id=$id");
if($result->num_rows > 0)
{
    $result=$result->fetch_assoc();
 if($result["status"] == "0" && $result["notif"] == "0")
 {
    DBHelper::set("UPDATE chatroom set notif=1 WHERE user_id=$id");
    echo "1";
 }
 else{
     echo "0";
 }
}
else{
    echo "0";
}
?>