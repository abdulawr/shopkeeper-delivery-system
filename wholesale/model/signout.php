<?php
session_start();
session_unset();
session_destroy();
?>
<script>
    location.href="../login.php";
</script>
<?php
?>