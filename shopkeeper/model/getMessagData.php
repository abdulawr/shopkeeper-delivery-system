<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
$id=Encryption::Decrypt($_COOKIE["shopkeeper"]);
$chatRoom=DBHelper::get("SELECT id from chatroom WHERE user_id=$id");
if($chatRoom->num_rows > 0){
 $chatroom_id=$chatRoom->fetch_assoc()["id"];
 $message_Result=DBHelper::get("SELECT date,message from chat WHERE chatroom_id=$chatroom_id and status=0 and admin=1;");
 if($message_Result->num_rows > 0)
 {
DBHelper::set("UPDATE chat set status=1 WHERE chatroom_id=$chatroom_id && status=0;");
  $response=[];
  while($row=$message_Result->fetch_assoc()){
    array_push($response,$row);
  }
  echo json_encode($response);
 }
 else{
     echo "0";
 }
}
else{
    echo "0";
}
?>