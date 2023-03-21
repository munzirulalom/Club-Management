<?php
if (!defined('ABSPATH')) exit;

$club_id = (int)$_GET['id'];
$user_id = (int) $_SESSION['id'];

$stmt = $db->prepare("SELECT * FROM `club` WHERE id = '{$club_id}'");
$stmt->execute();
$result = $stmt->fetchAll();
$club = array_shift($result);

if (isset($_POST['update_club_submit'])) {
	$club_id = (int) $_POST['club_id'];
	$club_name = (string) $_POST['club_name'];
	$club_description = (string) $_POST['club_description'];

	$table = get_table_name('club');

	if (isset($_FILES['club_cover_img']) and $_FILES['club_cover_img']['size'] > 0) {
		remove_attachment($club['img']);
		$club_img = add_attachment("club_cover_img");

		$stmt = $db->prepare("UPDATE `{$table}` SET name = '{$club_name}', img = '{$club_img}', description = '{$club_description}' WHERE id = '{$club_id}'");
		$stmt->execute();
	} else {
		$stmt = $db->prepare("UPDATE `{$table}` SET name = '{$club_name}', description = '{$club_description}' WHERE id = '{$club_id}'");
		$stmt->execute();
	}

	echo msg_success('Club info update successfully');
}

?>

<link href="<?php echo SITE_URL ?>/dist/css/chat-style.css" rel="stylesheet" />

<div class="chat wrapper card">
	<section class="chat-area">
		<div class="chat-box"></div>
		<form action="#" class="typing-area">
			<input type="hidden" class="user_id" name="user_id" value="<?php echo $user_id; ?>">
			<input type="hidden" class="club_id" name="club_id" value="<?php echo $club_id; ?>">
			<input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
			<button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
					<path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
				</svg></button>
		</form>
	</section>
</div>

<script src="<?php echo SITE_URL ?>/dist/js/chat.js"></script>