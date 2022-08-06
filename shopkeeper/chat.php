<?php
include_once("../include/conn.php");
include_once("../include/DBHelper.php");
include_once("../include/Encryption.php");
$id=Encryption::Decrypt($_COOKIE["shopkeeper"]);
$shopkeeperData=DBHelper::get("select name,image from shopkeeper where id=$id")->fetch_assoc();
DBHelper::set("UPDATE chatroom SET status=1, notif=1 WHERE user_id=$id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
    <link rel="stylesheet" href="css/chat.css">
    <link rel="stylesheet" href="../wholesale/boot4/bootstrap.css">
    
</head>
<body>
    
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center shadow--hover">
            <div class="col-md-10 shadow h-100">
                <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chat Messages</h3>
                        <div class="box-tools pull-right"> <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages"></span> <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button> <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"> <i class="fa fa-comments"></i></button> <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i> </button> </div>
                    </div>
                    <div class="box-body">
                        <div id="messageblock" class="direct-chat-messages">

                         <?php
                         $messages=DBHelper::get("SELECT chat.message,chat.admin,chat.date from chatroom INNER JOIN chat on chatroom.id = chat.chatroom_id WHERE chatroom.user_id = $id order by chat.id asc");
                         if($messages->num_rows > 0)
                         {
                        $chatRoom=DBHelper::get("SELECT id from chatroom WHERE user_id=$id")->fetch_assoc()["id"];
                        DBHelper::set("UPDATE chat set status=1 WHERE chatroom_id=$chatRoom && status=0;");
                          while($row=$messages->fetch_assoc()){
                          if($row["admin"] == "0")
                          {
                          ?>
                            <!-- Shopkeeper -->
                            <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix"> 
                                <span class="direct-chat-name pull-left"><?php echo $shopkeeperData["name"];?></span>
                                <span class="direct-chat-timestamp pull-right"><?php echo $row["date"];?></span>
                                </div> <img class="direct-chat-img" src="../<?php echo $shopkeeperData["image"];?>" alt="message user image">
                                <div class="direct-chat-text"> <?php echo $row["message"];?> </div>
                            </div>
                          <?php
                          }
                          else{
                          ?>
                            <!-- Admin -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">System Admin</span>
                                <span class="direct-chat-timestamp pull-left"><?php echo $row["date"];?></span>
                                </div> <img class="direct-chat-img" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="message user image">
                                <div class="direct-chat-text"> <?php echo $row["message"];?> </div>
                            </div>
                         <?php
                          }
                          }
                         }
                         ?>
                            
                        </div>
                    </div>

                    <div class="box-footer">
                        <div action="#" method="post">
                            <div class="input-group"> <input id="message" type="text" name="message" placeholder="Type Message ..." class="form-control"> <span class="input-group-btn"> 
                            <button onclick="SubmitMessage()" type="button" class="btn btn-warning btn-flat">Send</button> </span> </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

</body>
</html>

<script>
scrollBottom();
function scrollBottom(){
$("#messageblock").animate({ scrollTop: $('#messageblock').prop("scrollHeight")}, 1000);
}

function SubmitMessage(){
var image="<?php echo $shopkeeperData["image"];?>";
var input=document.querySelector("#message");
var name="<?php echo $shopkeeperData["name"];?>";
var messageblock_div=document.querySelector("#messageblock");
var date=new Date();
if(input.value != "" && input.value.length > 0){
var shopkeeper='<div class="direct-chat-msg"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-left">'+name+'</span><span class="direct-chat-timestamp pull-right"> '+date.toLocaleString()+' </span></div> <img class="direct-chat-img" src="../'+image+'"><div class="direct-chat-text"> '+input.value+' </div></div>';

$.post("model/insertMessage.php",
  {
    message: input.value
  },
  function(data, status){
    if(data=="1"){
        messageblock_div.insertAdjacentHTML("beforeend",shopkeeper);
        scrollBottom();
        input.value="";
    }
    else{
        alert("something went try again");
    }
});

}
}

document.addEventListener("keypress",function(event){
    if(event.keyCode == 13){
        SubmitMessage();
    }
})

</script>

<script>

setInterval(function(){
getResponseMessages();
},4000);

function getResponseMessages(){
var messageblock_div=document.querySelector("#messageblock");
 $.post("model/getMessagData.php",
  {
    message: 0
  },
  function(data, status){
if(data != "0" && data != "[]"){
    var obj=JSON.parse(data);
    for(var single of obj){
 var admin='<div class="direct-chat-msg right">'+
'<div class="direct-chat-info clearfix">'+
'<span class="direct-chat-name pull-right">System Admin</span>'+
'<span class="direct-chat-timestamp pull-left"> '+single.date+' </span>'+
'</div> <img class="direct-chat-img" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="message user image">'+
'<div class="direct-chat-text"> '+single.message+' </div></div>';
messageblock_div.insertAdjacentHTML("beforeend",admin);
}
scrollBottom();
  }
});

}


</script>