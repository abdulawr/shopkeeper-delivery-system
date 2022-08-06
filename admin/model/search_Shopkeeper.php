<?php
$shopkeeper=null;
if(isset($_POST["submit"]) && isset($_POST["query"]))
{
    $query=$_POST["query"];
    $option=$_POST["option"];
    if($option == "0")
    {
     $shopkeeper=DBHelper::get("SELECT * from shopkeeper WHERE name LIKE '%".$query."%';");
    }
    elseif($option == "1")
    {
        $shopkeeper=DBHelper::get("SELECT * from shopkeeper WHERE mobile='{$query}'");
    }
    elseif($option == "2")
    {
        $shopkeeper=DBHelper::get("SELECT * from shopkeeper WHERE cnic='{$query}'");  
    }
    elseif($option == "3")
    {
        $shopkeeper=DBHelper::get("SELECT * from shopkeeper WHERE email='{$query}'");
    }
}
?>