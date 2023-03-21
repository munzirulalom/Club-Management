<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$club_id = (int) $_GET['club_id'];

if ( !can_access_club( $club_id ) ) goto footer;
if ( !can_manage('vice-president', $club_id) ) goto footer;

if ( isset($_POST['add_event_submit']) ) {
	$club_id = (int) $_POST['club_id'];
	$event_name = (string) $_POST['event_name'];
	$event_venue = (string) $_POST['event_venue'];
	$reg_start = (string) $_POST['reg_start'] . " 00-00-00";
	$event_date = (string) $_POST['event_date'] . " 00-00-00";
	$event_description = (string) $_POST['event_description'];
	$created_by = (int) $_SESSION['id'];

	$table = get_table_name('event');

	$event_img = add_attachment("event_cover_img");


	//Inster Data Into Event Table
	$stmt = $db->prepare("INSERT INTO `{$table}` (name, description, img, reg_start, event_date, venue, club_id, created_by ) VALUES('{$event_name}', '{$event_description}', '{$event_img}', '{$reg_start}', '{$event_date}', '{$event_venue}', '{$club_id}', '{$created_by}')");
	$stmt->execute();
	$event_id = $db->lastInsertId();

	echo msg_success('Event added successfully');
}

?>
<div class="container-xl">

	<form id="add_event" method="POST" enctype="multipart/form-data" class="col-12 col-md-8 mx-auto">
		<input type="hidden" name="club_id" value="<?php echo (string)$_GET['club_id']; ?>">
		<div class="card-body">
			<div class="mb-3">
				<label class="form-label">Name</label>
				<input type="text" class="form-control" name="event_name" placeholder="Event name" required="" autocomplete="off">
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Venue</label>
						<input class="form-control" type="text" name="event_venue" placeholder="Event Location..." required="" autocomplete="off">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Cover Image</label>
						<input class="form-control" type="file" name="event_cover_img" placeholder="Event Image..." required="" autocomplete="off">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Registration start date</label>
						<input type="date" class="form-control" name="reg_start">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<label class="form-label">Event date</label>
						<input type="date" class="form-control" name="event_date">
					</div>
				</div>
				<div class="col-lg-12">
					<div>
						<label class="form-label">Event Description</label>
						<textarea class="form-control" rows="3" name="event_description"></textarea>
					</div>
				</div>
				<button type="submit" name="add_event_submit" class="btn btn-primary mt-3">Submit</button>
			</div>
		</div>
	</form>
</div>

<?php
	footer: