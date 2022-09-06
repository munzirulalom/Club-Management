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

$table = get_table_name('club');

$stmt = $db->prepare("SELECT * FROM `{$table}` WHERE id = '{$club_id}'");
$stmt->execute();
$result = $stmt->fetchAll();
$club = array_shift($result);

remove_attachment( $club['img'] );

//Delete From Club Table
$stmt = $db->prepare("DELETE FROM `{$table}` WHERE id = '{$club_id}'");
$stmt->execute();

//Delete all club event
$stmt = $db->prepare("DELETE FROM `event` WHERE club_id = '{$club_id}'");
$stmt->execute();

exit;