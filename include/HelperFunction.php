<?php 
 function validateInput($value)
 {
   $data = trim($value);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = $GLOBALS["con"]-> real_escape_string($data);
  return $data;
 }
?>