<?php

$errors = [];
$data = [];

if (empty($_POST['club_name']) or empty($_POST['club_description'])) {
    $errors['log'] = 'Form not submit.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;

    echo json_encode($data);
    die();
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
    echo json_encode($data);
}

require_once("conn.php");

$table = get_table_name('club');
$table2 = get_table_name('user_club');
$name = (string) $_POST['club_name'];
$description = (string) $_POST['club_description'];
$created_by = (int) $_SESSION['id'];

//Inster Data Into Club Table
$stmt = $db->prepare("INSERT INTO `{$table}` (name, description, created_by) VALUES('{$name}', '{$description}', '{$created_by}')");
$stmt->execute();
$club_id = $db->lastInsertId();

$stmt = $db->prepare("INSERT INTO `{$table2}` (user_id, club_id, role) VALUES('{$created_by}', '{$club_id}', 1)");
$stmt->execute();

exit;