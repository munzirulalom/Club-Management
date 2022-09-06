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

//Join Club Table
$stmt = $db->prepare("INSERT INTO `{$table}` (user_id, club_id, role) VALUES('{$user_id}', '{$club_id}', 0)");
$stmt->execute();

exit;