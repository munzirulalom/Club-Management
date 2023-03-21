<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$club_id = (int) $_GET['club_id'];
$event_id = (int) $_GET['event_id'];
$table = get_table_name('event');

if ( !can_access_club( $club_id ) ) goto footer;
if ( !can_manage('vice-president', $club_id) ) goto footer;

//Get event information
$stmt = $db->prepare("SELECT * FROM `{$table}` WHERE id = '{$event_id}'");
$stmt->execute();
$result = $stmt->fetchAll();
$event = array_shift( $result );

if ( isset($_POST['update_event_submit']) ) {
	$club_id = (int) $_POST['club_id'];
	$event_id = (int) $_POST['event_id'];
	$event_name = (string) $_POST['event_name'];
	$event_venue = (string) $_POST['event_venue'];
	$reg_start = (string) $_POST['reg_start'] . " 00-00-00";
	$event_date = (string) $_POST['event_date'] . " 00-00-00";
	$event_description = (string) $_POST['event_description'];

	if (isset($_FILES['event_cover_img']) AND $_FILES['event_cover_img']['size'] > 0 ) {
		remove_attachment( $event['img'] );
		$event_img = add_attachment("event_cover_img");

		$stmt = $db->prepare("UPDATE `{$table}` SET
			name = '{$event_name}',
			description = '{$event_description}',
			img = '{$event_img}',
			reg_start = '{$reg_start}',
			event_date = '{$event_date}',
			venue = '{$event_venue}'
			WHERE id = '{$event_id}'");
		$stmt->execute();

	} else{
		$stmt = $db->prepare("UPDATE `{$table}` SET
			name = '{$event_name}',
			description = '{$event_description}',
			reg_start = '{$reg_start}',
			event_date = '{$event_date}',
			venue = '{$event_venue}'
			WHERE id = '{$event_id}'");
		$stmt->execute();
	}

	echo msg_success('Event update successfully');
}



?>
<div class="container">

	<form id="add_event" method="POST" enctype="multipart/form-data" class="col-12 col-md-8 mx-auto">
		<input type="hidden" name="club_id" value="<?php echo (string)$_GET['club_id']; ?>">
		<input type="hidden" name="event_id" value="<?php echo $event['id'] ?>">
		<div class="card-body">
			<div class="mb-3">
				<label class="form-label">Name</label>
				<input type="text" class="form-control" name="event_name" placeholder="Event name" value="<?php echo $event['name'] ?>" required="" autocomplete="off">
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Venue</label>
						<input class="form-control" type="text" name="event_venue" placeholder="Event Location..." value="<?php echo $event['venue'] ?>" required="" autocomplete="off">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<?php
						if (!empty($event['img'])) {
							echo '<img src="'. get_attachment( $event['img'] ) .'" class="img-thumbnail">';
						}
						?>
						<label class="form-label">Cover Image</label>
						<input class="form-control" type="file" name="event_cover_img" placeholder="Event Image...">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Registration start date</label>
						<input type="date" class="form-control" name="reg_start" value="<?php echo date('Y-m-d', strtotime($event['reg_start'])); ?>">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Event date</label>
						<input type="date" class="form-control" name="event_date" value="<?php echo date('Y-m-d', strtotime($event['event_date'])); ?>">
					</div>
				</div>
				<div class="col-lg-12">
					<div>
						<label class="form-label">Event Description</label>
						<textarea class="form-control" rows="3" name="event_description"><?php echo $event['description'] ?></textarea>
					</div>
				</div>
				<button type="submit" name="update_event_submit" class="btn btn-primary mt-3">Submit</button>
			</div>
		</div>
	</form>
</div>

<?php
	footer: