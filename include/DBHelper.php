<?php
class DBHelper{
    public static function set($query)
    {
      $con=$GLOBALS["con"];
      if($con->query($query))
      {
       return true;
      }
      else{
          return false;
      }
    }

    public static function get($query)
    {
        $con=$GLOBALS["con"];
        return $con->query($query);
    }
}

?>