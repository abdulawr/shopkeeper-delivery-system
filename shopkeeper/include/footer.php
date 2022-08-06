<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
               
              </div>
              <div class="col-md-3 col-sm-6">
               
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> <?php echo $info["address"];?></p>
                      <p><span class="fa fa-phone"></span><?php echo $info["mobile"];?></p>
                      <p><span class="fa fa-envelope"></span><?php echo $info["email"];?></p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
   
  </footer>



<script>
setInterval(()=>{
checkStatus();
},5000);
</script>

<script>
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
    var notification = new Notification("Admin responed to your message",{icon:"https://i.pinimg.com/originals/de/d5/60/ded5601878f03e14a38fa86009a9a78c.jpg",body:"Check chat section for more details",timestamp:dts});
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
        var notification = new Notification("Admin responed to your message",{icon:"https://i.pinimg.com/originals/de/d5/60/ded5601878f03e14a38fa86009a9a78c.jpg",body:"Check chat section for more details",timestamp:dts});
        notification.onclick=function(event){
            event.preventDefault();
            location.href="chat.php";
        }
      }
    });
  }
}
</script>