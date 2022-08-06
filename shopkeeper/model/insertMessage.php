<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
$id=Encryption::Decrypt($_COOKIE["shopkeeper"]);
$chatRoom=DBHelper::get("SELECT id from chatroom WHERE user_id=$id");
if($chatRoom->num_rows > 0)
{
 $chatroom_id=$chatRoom->fetch_assoc()["id"];
 DBHelper::set("UPDATE chatroom set status=0 WHERE user_id=$id");
 if(DBHelper::set("INSERT INTO chat(message,admin,chatroom_id,status) VALUES('{$_POST["message"]}',0,$chatroom_id,1);")){
    echo "1";
   }
   else{
       echo "0";
   }
}
else{
 if(DBHelper::set("INSERT INTO chatroom(user_id,status,notif,user_role) VALUES($id,0,1,'shopkeeper');")){
  $chatroom_id=$con->insert_id;
  if(DBHelper::set("INSERT INTO chat(message,admin,chatroom_id,status) VALUES('{$_POST["message"]}',0,$chatroom_id,1);")){
    echo "1";
   }
   else{
       echo "0";
   }
 }
 else{
     echo "0";
 }
}
?>