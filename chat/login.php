<?php 
  session_start();
  include_once "php/config.php";
  if(isset($_SESSION['id'])){
    header("location: users.php");
  }else{
    header("location: ". SITE_URL);
  }