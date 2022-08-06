<?php
$con=new mysqli("localhost","root","","shopkeeper_delivery_system");
if($con->connect_errno)
{
    die("Error occured while connecting with database");
}
?>