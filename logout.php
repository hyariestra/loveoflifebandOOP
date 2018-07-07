<?php 
session_start();

unset($_SESSION['user']);
echo "<script>alert('anda telah logout');</script>";
  
 echo "<script>window.location='index.php';</script>";

 ?>