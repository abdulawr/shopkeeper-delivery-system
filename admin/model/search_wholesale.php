<?php
$wholesale=null;
if(isset($_POST["submit"]) && isset($_POST["query"]))
{
    $query=$_POST["query"];
    $option=$_POST["option"];
    if($option == "0")
    {
     $wholesale=DBHelper::get("SELECT * from wholesale WHERE name LIKE '%".$query."%';");
    }
    elseif($option == "1")
    {
        $wholesale=DBHelper::get("SELECT * from wholesale WHERE mobile='{$query}'");
    }
    elseif($option == "2")
    {
        $wholesale=DBHelper::get("SELECT * from wholesale WHERE cnic='{$query}'");  
    }
    elseif($option == "3")
    {
        $wholesale=DBHelper::get("SELECT * from wholesale WHERE email='{$query}'");
    }
}
?>
