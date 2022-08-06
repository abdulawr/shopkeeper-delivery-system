 <!-- FOOTER -->
 <div id="footer">
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>


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
      console.log(this.responseText )
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