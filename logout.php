<?php
session_start();
unset($_SESSION['sess_user']);
unset($_SESSION['sess_name']);
unset($_SESSION['type']);
session_destroy();
header("location:index.php");

?>
