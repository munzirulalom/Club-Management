<?php 
var_dump($_POST);

require_once("conn.php");

if(isset($_SESSION['id'])){
    $user_id = (int) $_SESSION['id'];
    $club_id = (int) $_POST['club_id'];
    $message = (string) $_POST['message'];

    if(!empty($message)){
        $sql = $db->prepare("INSERT INTO `messages` (user_id, club_id, msg)
            VALUES('{$user_id}', '{$club_id}', '{$message}')");
        $sql->execute();
    }
}else{
    header("location: ". SITE_URL);
}