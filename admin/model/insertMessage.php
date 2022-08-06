<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");

 $chatroom_id=$_POST["chatroom"];
 $message=$_POST["message"];

if(DBHelper::set("INSERT INTO chat(message,admin,chatroom_id,status,admin_status) VALUES('{$message}',1,$chatroom_id,0,1);")){
   DBHelper::set("UPDATE chatroom set status=0, notif=0 WHERE id=$chatroom_id");
    echo "1";
}
else{
echo "0";
}
?>