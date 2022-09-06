<?php 
  session_start();

  if(isset($_SESSION['id'])){
    header("location: users.php");
  } else{
    header("location: ". SITE_URL);
  }
?>