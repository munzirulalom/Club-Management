<?php
require_once("conn.php");

if ( empty($_POST['club_id']) OR empty($_POST['status']) ) {
	exit;
}

$club_id = (int) $_POST['club_id'];
$status = filter_var( (string)$_POST['status'], FILTER_VALIDATE_BOOLEAN);

if ( $status != true){
	return;
}

$table = get_table_name('user_club');
$user_id = (int) $_SESSION['id'];

//Delete From Club Table
$stmt = $db->prepare("DELETE FROM `{$table}` WHERE user_id = '{$user_id}' AND club_id = '{$club_id}'");
$stmt->execute();

exit;