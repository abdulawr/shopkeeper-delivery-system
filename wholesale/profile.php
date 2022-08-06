<?php include("include/header.php");?>
<body>

<div class="container">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h2 class="display-4">Update Profile</h2>
   

<form method="post">

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $userData["name"]; ?>">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">E-mail</label>
<input type="email" name="email" class="form-control" value="<?php echo $userData["email"]; ?>">
</div>
</div>

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Mobile</label>
<input type="number" name="mobile" class="form-control" value="<?php echo $userData["mobile"]; ?>">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">CNIC</label>
<input type="number" name="cnic" class="form-control" value="<?php echo $userData["cnic"]; ?>"> 
</div>
</div>

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Address</label>
<input type="text" name="address" class="form-control" value="<?php echo $userData["address"]; ?>">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">Password</label>
<input name="password" type="password" class="form-control" value="<?php echo Encryption::Decrypt($userData["pass"]); ?>">
</div>
</div>

<button name="submit" type="submit" class="btn btn-info">Update</button>

</form>
  </div>
</div>
</div>
</body>
</html>

<?php
if(isset($_POST["submit"]) && isset($_POST["name"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $cnic=$_POST["cnic"];
    $address=$_POST["address"];
    $password=Encryption::Encrypt($_POST["password"]);
    $id=Encryption::Decrypt($_SESSION["wholeseller"]);
    $result=DBHelper::set("UPDATE wholesale SET name='{$name}', email='{$email}', cnic='{$cnic}', mobile='{$mobile}', address='{$address}', pass='{$password}' WHERE id={$id}");
    if($result)
    {
        ?>
        <script>
            alert('Successfully Update');
            location.href="index.php";
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Something went wrong try again');
        </script>
        <?php
    }
}
?>