<?php
session_start();
include_once("../include/conn.php");
include_once("../include/DBHelper.php");
include_once("../include/Encryption.php");
$userid=Encryption::Decrypt($_SESSION["admin"]);
$userData=DBHelper::get("select * from admin where id={$userid}")->fetch_assoc();
$shopkeeper=DBHelper::get("SELECT shopkeeper.name,shopkeeper.image,chatroom.id,chatroom.status,chatroom.user_id,chatroom.user_role from chatroom INNER join shopkeeper on chatroom.user_id=shopkeeper.id WHERE user_role = 'shopkeeper' order by status asc;");
$wholesale=DBHelper::get("SELECT wholesale.name,wholesale.image,chatroom.id,chatroom.status,chatroom.user_id,chatroom.user_role from chatroom INNER join wholesale on chatroom.user_id=wholesale.id WHERE user_role = 'wholesale' order by status asc;");
?>
<!DOCTYPE html><html class=''>
<head>
  <title>Chat Room</title>
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link rel="stylesheet" href="assets/css/chat.css">
<a href="dashboard.php" style=" text-decoration: none;background-color: white; padding:10px 30px; text-align:center;">Home</a>
<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" src="../images/admin/<?php echo $userData["image"];?>" class="online" alt="" />
				<p><?php echo $userData["name"];?></p>
			</div>
		</div>

		<div id="contacts">
			<ul>

			<?php
			if($shopkeeper->num_rows >0)
			{
			while($row=$shopkeeper->fetch_assoc()){
			if($row["status"] == "0"){
             ?>
             <li class="contact">
					<div class="wrap">
						<span class="contact-status online"></span>
						<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>"><img width="1000" src="../<?php echo $row["image"];?>" alt="probljdf" /></a>
						<div class="meta">
							<p class="name"><?php echo $row["name"];?></p>
							<p class="preview">You have new messages.</p>
							<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>" style="color:white;">View</a>
						</div>
					</div>
				</li>
			 <?php
			}
			else{
				?>
               <li class="contact">
					<div class="wrap">
						<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>"><img src="../<?php echo $row["image"];?>" alt="" /></a>
						<div class="meta">
							<p class="name"><?php echo $row["name"];?></p>
							<p class="preview"></p>
							<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>" style="color:white;">View</a>
						</div>
					</div>
				</li>
				<?php
			}	
			}
			}


			if($wholesale->num_rows >0)
			{
			while($row=$wholesale->fetch_assoc()){
			if($row["status"] == "0"){
             ?>
             <li class="contact">
					<div class="wrap">
						<span class="contact-status online"></span>
						<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>"><img width="1000" src="../<?php echo $row["image"];?>" alt="probljdf" /></a>
						<div class="meta">
							<p class="name"><?php echo $row["name"];?></p>
							<p class="preview">You have new messages.</p>
							<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>" style="color:white;">View</a>
						</div>
					</div>
				</li>
			 <?php
			}
			else{
				?>
               <li class="contact">
					<div class="wrap">
						
						<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>"><img src="../<?php echo $row["image"];?>" alt="" /></a>
						<div class="meta">
							<p class="name"><?php echo $row["name"];?></p>
							<p class="preview"></p>
							<a href="chat.php?user_id=<?php echo $row["user_id"]?>&chatroom_id=<?php echo $row["id"]?>&role=<?php echo $row["user_role"]?>" style="color:white;">View</a>
						</div>
					</div>
				</li>
				<?php
			}	
			}
			}


			?>

			</ul>

		</div>


	</div>

	<div class="content">
 
	<?php if(isset($_GET["user_id"]))
	   {
		$userDatas;
		$messageData=DBHelper::get("SELECT * from chat where chatroom_id={$_GET["chatroom_id"]}");
		DBHelper::set("UPDATE chat set admin_status=1 where chatroom_id={$_GET["chatroom_id"]}");
		if($_GET["role"] == "shopkeeper"){
        $userDatas=DBHelper::get("SELECT image,name from shopkeeper WHERE id={$_GET["user_id"]}")->fetch_assoc();
		}
		else{
			$userDatas=DBHelper::get("SELECT image,name from wholesale WHERE id={$_GET["user_id"]}")->fetch_assoc();
		}
		?>
		<div class="contact-profile">
			<img src="../<?php echo $userDatas["image"];?>" alt="" />
			<p><?php echo $userDatas["name"];?></p>
			
		</div>

		<div class="messages">
			<ul id="message_box_menu">
                <?php
				if($messageData->num_rows > 0)
				{
				while($row=$messageData->fetch_assoc()){
				if($row["admin"] == "0"){
                ?>
				<!-- user -->
				<li class="replies">
					<img src="../<?php echo $userDatas["image"];?>" alt="" />
					<p><?php echo $row["message"]; ?></p>
				</li>
				<?php
				}
				else{
				?>
				 <!-- admin -->
				 <li class="sent">
					<img src="../images/admin/<?php echo $userData["image"];?>" alt="" />
					<p><?php echo $row["message"]; ?></p>
				</li>
				<?php
				}
				}
				}
				?>	

			</ul>
		</div>

		<div class="message-input">
			<div class="wrap">
			<input id="inputfield" type="text" placeholder="Write your message..." />
			<button onclick="SubmitMessage()" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>

		<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

       <script>

         function SubmitMessage(){
          var input=$("#inputfield");
		  var messagebody=document.querySelector("#message_box_menu");
		  var image="<?php echo $userData["image"];?>";
		  var chatroomId="<?php echo $_GET["chatroom_id"] ;?>";
		  var admin='<li class="sent">'+
					'<img src="../images/admin/'+image+'" alt="" />'+
					'<p>'+input.val()+'</p></li>';

		  if(input.val() != "" && input.val().length > 0)
		  {

			$.post("model/insertMessage.php",
			{
				chatroom: chatroomId,
				message:input.val()
			},
			function(data, status){
				if(data=="1"){
				messagebody.insertAdjacentHTML("beforeend",admin);
			     input.val("");
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

setInterval(function(){
getResponseMessages();
},4000); 
    
	function getResponseMessages(){
	var messagebody=document.querySelector("#message_box_menu");
	var chatroomId="<?php echo $_GET["chatroom_id"] ;?>";
	var image="<?php echo $userDatas["image"];?>";
	$.post("model/getMessagData.php",
	{
		chatroomId: chatroomId
	},
	function(data, status){
		
	if(data != "0" && data != "[]"){
		var obj=JSON.parse(data);
		for(var single of obj){
	    var user='<li class="replies">'+
					'<img src="../'+image+'" alt="" />'+
					'<p>'+single.message+'</p></li>';
					messagebody.insertAdjacentHTML("beforeend",user);
	}
	
	}
	});

	}

    </script>
		<?php
	   }	   
	  ?>

	</div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});


/* //////////////////////////////////////////////////////////////// */

function scrollBottom(){
$("#message_box_menu").animate({ scrollTop: $('#message_box_menu').prop("scrollHeight")}, 1000);
}

