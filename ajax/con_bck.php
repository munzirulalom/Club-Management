<?php 
session_start();
define('ABSPATH', TRUE);

/* Define SITE HOME url */
if (($_SERVER['HTTP_HOST']) == 'localhost') {
	define('SITE_URL', 'http://localhost/cse318');
}else{
	define('SITE_URL', 'https://cse318.inovoex.com');
}

//Connect Database
require_once(dirname(__DIR__)."/db/connection.php");
require_once(dirname(__DIR__).'/inc/function.php');