<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if ( !isset($_SESSION['id']) ) exit;

$event_id = (int)$_GET['event_id'];
$user_id = (int)$_SESSION['id'];

$table = get_table_name('event_join');

$stmt = $db->prepare("INSERT INTO `{$table}` ( event_id, user_id ) VALUES('{$event_id}', '{$user_id}')");
$stmt->execute();

$table = get_table_name('activity');
$event_name = "Join on ". get_event_name( $event_id ) . " Event";
$stmt = $db->prepare("INSERT INTO `{$table}` ( title, user_id ) VALUES('{$event_name}', '{$user_id}')");
$stmt->execute();

echo msg_success("Event Join Successful");