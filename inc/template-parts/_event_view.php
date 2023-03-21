<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$event_id = (int)$_GET['id'];
$club_id = (int)$_GET['club_id'];
$stmt = $db->prepare("SELECT * FROM event WHERE id = '{$event_id}'");
$stmt->execute();
$event = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">

	<h2 class="page-title my-3"><?php echo $event['name'] ?></h2>
	<div class="row row-deck row-cards">
		<div class="col-12 col-lg-12">
			<img class="img-fluid d-block w-80 mx-auto" alt="" src="<?php echo get_attachment( $event['img'] ); ?>">			
		</div>
	</div>

	
	<div class="row row-deck row-cards mt-3">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<div class="markdown">
						<?php echo $event['description'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<dl class="row">
						<dt class="col-5">Registration Start:</dt>
						<dd class="col-7"><?php echo date("F j, Y", strtotime($event['reg_start'])) ?></dd>
						<dt class="col-5">Registration End:</dt>
						<dd class="col-7"><?php echo date("F j, Y", strtotime($event['event_date'])-1) ?></dd>
						<dt class="col-5">Event Date:</dt>
						<dd class="col-7"><?php echo date("F j, Y", strtotime($event['event_date'])) ?></dd>
						<dt class="col-5">Organize by:</dt>
						<dd class="col-7"><?php echo get_club_name( $event['club_id'] ); ?></dd>
					</dl>
					<a href="<?php echo SITE_URL ?>/event/?action=join&event_id=<?php echo $event_id ?>&club_id=<?php echo $club_id ?>" class="btn w-100 <?php echo is_event_join() ? 'btn-success disabled' : 'btn-outline-success' ?>">Join Now</a>
					<?php

					if ( can_manage('vice-president', $club_id) ){

					?>
					<a href="<?php echo SITE_URL ?>/event/?action=join-list&event_id=<?php echo $event_id ?>&club_id=<?php echo $club_id ?>" class="btn btn-outline-primary w-100 mt-3">Joining List</a>

					<a href="<?php echo SITE_URL ?>/event/?action=edit&event_id=<?php echo $event_id ?>&club_id=<?php echo $club_id ?>" class="btn btn-outline-primary w-100 mt-3">Edit Event</a>

					<a href="<?php echo SITE_URL ?>/event/?action=delete&event_id=<?php echo $event_id ?>&club_id=<?php echo $club_id ?>" class="btn btn-outline-danger w-100 mt-3">Delete Event</a>
				<?php } ?>
				</div>
			</div>

		</div>

	</div>
</div>