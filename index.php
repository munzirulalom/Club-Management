<?php
session_start();
/* Define ABSPATH */
define('ABSPATH', TRUE);


/* Define SITE HOME url */
if (($_SERVER['HTTP_HOST']) == 'localhost') {
	define('SITE_URL', 'http://localhost/cse318');
}else{
	define('SITE_URL', 'https://cse318.inovoex.com');
}

require_once("db/connection.php");
require_once('inc/function.php');

if ( isset($_SESSION['id']) == 1 AND isset( $_GET['page'] ) ) {

	switch ( $_GET['page'] ) {
		case 'dashboard' :
		require_once('inc/home.php');
		break;
		
		case 'club' :
		require_once('inc/club.php');
		break;
		
		case 'event' :
		require_once('inc/event.php');
		break;
		
		case 'chat' :
		require_once('chat/index.php');
		break;
		
		case 'profile' :
		require_once('inc/profile.php');
		break;

		default:
		require_once('inc/home.php');
		break;
	}
	
} else {
	get_header('login');

	if ( isset($_GET['action']) ) {

		switch ( $_GET['action'] ) {
			case 'register' :
			require_once("inc/register.php");
			break;
			case 'forgot-password' :
			require_once("inc/forgot-password.php");
			break;
			case 'forgot-password-next' :
			require_once("inc/forgot-password-next.php");
			break;
			case 'new-password' :
			require_once("inc/new-password.php");
			break;

			default:
			require_once("inc/login.php");
			break;
		}
		
	}else {
		require_once("inc/login.php");
	}

	get_footer('login');
}