<?php
require_once("conn.php");
if (isset($_SESSION['id'])) {

    $user_id = $_SESSION['id'];
    $club_id = (string) $_POST['club_id'];
    $output = "";

    $sql = "SELECT * FROM `messages` WHERE club_id = '{$club_id}'  ORDER BY msg_id";
    $query = $db->query($sql);
    $query->execute();
    $rowCount = $query->rowCount();

    if ($rowCount > 0) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            if ($row['user_id'] == $user_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
function get_user_img_id( $id = false ) {
                                <img src="' . get_user_image( get_user_img_id($row['user_id']) ) . '" alt="">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available in this club. Once you send message they will appear here.</div>';
    }
    echo $output;
} else {
    echo '<div class="text">Invalid Request. User login details not found</div>';
}
