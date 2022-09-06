<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$club_id = (int) $_GET['club_id'];
$event_id = (int) $_GET['event_id'];
$table = get_table_name('event');

if ( !can_access_club( $club_id ) ) goto footer;
if ( !can_manage('vice-president', $club_id) ) goto footer;

$stmt = $db->prepare("SELECT * FROM `{$table}` WHERE id = '{$event_id}'");
$stmt->execute();
$result = $stmt->fetchAll();
$event = array_shift( $result );

remove_attachment( $event['img'] );

//Delete From Event Table
$stmt = $db->prepare("DELETE FROM `{$table}` WHERE id = '{$event_id}'");
$stmt->execute();

echo msg_success('Event delete successfully');

footer: