<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                       
                    
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../images/admin/<?php echo $userData["image"];?>">
                  </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?php echo $userData["name"];?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="profile.php" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a href="model/logout.php" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<!-- <script>
function checkStatus(){
var obj=new XMLHttpRequest();
obj.open("GET","model/checkchatstatus.php",true);
obj.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
      if(this.responseText == "1"){
        notifyMe();
      }
    }
  };
obj.send();
}

function notifyMe() {
  // Let's check if the browser supports notifications
  var dts = Math.floor(Date.now());
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }
  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    var notification = new Notification("You have new messages",{icon:"https://i.pinimg.com/originals/de/d5/60/ded5601878f03e14a38fa86009a9a78c.jpg",body:"Check chat section for more details",timestamp:dts});
        notification.onclick=function(event){
            event.preventDefault();
            location.href="chat.php";
           
        }
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        var notification = new Notification("You have new messages",{icon:"https://i.pinimg.com/originals/de/d5/60/ded5601878f03e14a38fa86009a9a78c.jpg",body:"Check chat section for more details",timestamp:dts});
        notification.onclick=function(event){
            event.preventDefault();
            location.href="chat.php";
        }
      }
    });
  }
}
</script> -->