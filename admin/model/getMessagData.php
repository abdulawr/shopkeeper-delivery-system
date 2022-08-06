<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");

 $chatroom_id=$_POST["chatroomId"];
 $message_Result=DBHelper::get("SELECT date,message from chat WHERE chatroom_id=$chatroom_id and admin_status=0");
 if($message_Result->num_rows > 0)
 {
  DBHelper::set("UPDATE chat set admin_status=1 where chatroom_id=$chatroom_id");
  $response=[];
  while($row=$message_Result->fetch_assoc()){
    array_push($response,$row);
  }
  echo json_encode($response);
 }
 else{
     echo "0";
 }
?>