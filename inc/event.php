<?php
/* Previent Direct Access */
if ( ! defined( 'ABSPATH' ) ) exit;
if ( $_GET['page'] != "event" ) exit;
$club_id = (int) $_GET['club_id'];
if ( !can_access_club($club_id) ) return;

get_header();

if ( isset($_GET['id']) ) {
	include("template-parts/_event_view.php");
}elseif( isset($_GET['action']) AND $_GET['action'] === "add_new" ){
	include("template-parts/_event_add.php");
}elseif( isset($_GET['action']) AND $_GET['action'] === "edit" ){
	include("template-parts/_event_edit.php");
}elseif( isset($_GET['action']) AND $_GET['action'] === "delete" AND isset($_GET['event_id']) ){
	include("template-parts/_event_delete.php");
}elseif( isset($_GET['action']) AND $_GET['action'] === "join" AND isset($_GET['event_id']) ){
	include("template-parts/_event_join.php");
}elseif( isset($_GET['action']) AND $_GET['action'] === "join-list" AND isset($_GET['event_id']) ){
	include("template-parts/_event_join_list.php");
}


?>

<?php
	get_footer();