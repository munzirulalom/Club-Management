<?php 
session_start();
define('ABSPATH', TRUE);

include(dirname(__DIR__,1). "/db/connection.php");
include(dirname(__DIR__,1). "/inc/function.php");

$query = $db->prepare("UPDATE `user` SET status = 'Offline now' WHERE user_id = '{$_SESSION['id']}'");
$query->execute();

session_destroy();

if (($_SERVER['HTTP_HOST']) == 'localhost') {
	echo("<script>location.href = '../';</script>");
	die();
}else{
	echo("<script>location.href = '/';</script>");
	die();
}
 ?>
