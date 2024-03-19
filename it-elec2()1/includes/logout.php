<?php
session_start();
session_unset();
session_destroy();
session_write_close();
echo "<script>alert('Successfuly Logout');window.location.href = '../login.php';</script>";
// header('Location:../login.php');
die;
?>
