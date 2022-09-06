<?php
require_once("con.php");

$role_id = (int) $_POST['role_id'];
$user_id = (int) $_POST['user_id'];
$club_id = (int) $_POST['club_id'];

$table = get_table_name('user_club');

$stmt = $db->prepare("UPDATE `{$table}` SET role = '{$role_id}' WHERE user_id = '{$user_id}' AND club_id = '{$club_id}'");
$stmt->execute();

exit;