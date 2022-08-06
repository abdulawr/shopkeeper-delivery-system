<?php include("include/header.php");
$result=DBHelper::get("select * from items where id={$_GET["id"]}")->fetch_assoc();
?>
<body>
    
<div class="container">
<div class="row">

<form method="post" style="margin: 30px auto; padding-left:30px">

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Name</label>
<input required type="text" name="name" class="form-control" value="<?php echo $result["name"];?>">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">Company Name</label>
<input required type="text" name="company_name" class="form-control" value="<?php echo $result["company_name"];?>">
</div>
</div>

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Price</label>
<input required type="number" name="price" class="form-control" value="<?php echo $result["price"];?>">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">Quantity</label>
<input required type="number" name="quantity" class="form-control" value="<?php echo $result["quantity"];?>"> 
</div>
</div>

<div class="row">
<div class="form-group col-lg-5">
<label style="font-size:small;">Mobile</label>
<input required type="number" name="mobile" class="form-control" value="<?php echo $result["mobile"]; ?>">
</div>

<div class="form-group col-lg-5">
<label style="font-size:small;">Quality</label>
<input required name="quality" type="text" class="form-control" value="<?php echo $result["quality"];?>">
</div>
</div>

<div class="row">
<div class="form-group col-lg-10">
<label style="font-size:small;">Description</label>
<textarea name="des" type="text" class="form-control" rows="5"><?php echo $result["des"];?></textarea>
</div>
</div>

<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

<button name="submit" type="submit" class="btn btn-info">Update</button>

</form>

</div>
</div>

</body>
</html>

<?php
if(isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["mobile"])){
 $name=$_POST["name"];
 $company_name=$_POST["company_name"];
 $price=$_POST["price"];
 $quantity=$_POST["quantity"];
 $mobile=$_POST["mobile"];
 $des=$_POST["des"];
 $quality=$_POST["quality"];
 $id=$_POST["id"];
 if(DBHelper::set("UPDATE items SET name='{$name}', company_name='{$company_name}', price='{$price}', mobile='{$mobile}', des='{$des}', quality='{$quality}', quantity={$quantity} WHERE id={$id}")){
  ?>
  <script>
  alert("Successfully update");
  location.href="products.php";
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