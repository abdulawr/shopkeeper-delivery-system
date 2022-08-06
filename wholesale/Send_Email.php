<?php
include("include/header.php");
?>

<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">
    <?php $pageName="SendEmail"; include("include/nav.php");?>
        <!--PAGE CONTENT -->
        <div id="content" style="width: 80%;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12 " >
                     <h3>Send Email</h3>

                    </div>
                </div>

                <hr />

<form method="post" style="margin: 30px auto; padding-left:30px" enctype="multipart/form-data">

<input required type="hidden" name="name" class="form-control" value="<?php echo $userData["name"];?>">

<input required type="hidden" name="email" class="form-control" value="<?php echo $userData["email"];?>">

<input required type="hidden" name="mobile" class="form-control" value="<?php echo $userData["mobile"];?>" >


<div class="row">
<div class="form-group col-lg-10">
<label style="font-size:small;">Subject</label>
<input required type="text" name="subject" class="form-control">
</div>
</div>

<div class="row">
<div class="form-group col-lg-10">
<label style="font-size:small;">Message</label>
<textarea name="message" type="text" class="form-control" rows="5"></textarea>
</div>
</div>

<input type="hidden" name="id" value="<?php echo $userData["id"]; ?>">

<button name="submit" type="submit" class="btn btn-info">Send</button>

</form>


            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>

<?php
if(isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["id"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $subject=$_POST["subject"];
    $message=$_POST["message"];
    $id=$_POST["id"];
    $result=DBHelper::set("INSERT into contact(name,email,mobile,subject,message,wholeId) VALUES('{$name}','{$email}','{$mobile}','{$subject}','{$message}',{$id});");
    if($result)
    {
    ?>
     <script>
     alert("Successfully submitted");
     </script>
    <?php
    }
    else{
        ?>
       <script>alert("Something went wrong try again");</script>
        <?php
    }
}
?>
