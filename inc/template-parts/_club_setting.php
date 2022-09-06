<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$club_id = (int)$_GET['id'];

$stmt = $db->prepare("SELECT * FROM `club` WHERE id = '{$club_id}'");
$stmt->execute();
$result = $stmt->fetchAll();
$club = array_shift($result);

if ( isset($_POST['update_club_submit']) ) {
	$club_id = (int) $_POST['club_id'];
	$club_name = (string) $_POST['club_name'];
	$club_description = (string) $_POST['club_description'];

	$table = get_table_name('club');

	if (isset($_FILES['club_cover_img']) AND $_FILES['club_cover_img']['size'] > 0) {
		remove_attachment($club['img']);
		$club_img = add_attachment("club_cover_img");

		$stmt = $db->prepare("UPDATE `{$table}` SET name = '{$club_name}', img = '{$club_img}', description = '{$club_description}' WHERE id = '{$club_id}'");
		$stmt->execute();
	} else{
		$stmt = $db->prepare("UPDATE `{$table}` SET name = '{$club_name}', description = '{$club_description}' WHERE id = '{$club_id}'");
		$stmt->execute();
	}

	echo msg_success('Club info update successfully');
}

?>
<div class="container-xl">

	<form id="add_event" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="club_id" value="<?php echo $club['id']; ?>">
		<div class="card-body">
			<div class="mb-3">
				<label class="form-label">Name</label>
				<input type="text" class="form-control" name="club_name" placeholder="Club name" value="<?php echo $club['name']; ?>" required="" autocomplete="off">
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="mb-3">
						<label class="form-label">Cover Image</label>
						<?php
						if (!empty($club['img'])) {
							echo '<img src="'. get_attachment( $club['img'] ) .'">';
						}
						?>
						<input class="form-control" type="file" name="club_cover_img" placeholder="Club Image..." autocomplete="off">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div>
						<label class="form-label">Club Description</label>
						<textarea class="form-control" rows="3" name="club_description"><?php echo $club['description']; ?></textarea>
					</div>
				</div>
				<button type="submit" name="update_club_submit" class="btn btn-primary mt-3">Update</button>
			</div>
		</div>
	</form>
</div>