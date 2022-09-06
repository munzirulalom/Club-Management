<?php
/* Previent Direct Access */
if ( ! defined( 'ABSPATH' ) ) exit;

$event_id = (int) $_GET['event_id'];
$club_id = (int) $_GET['club_id'];

if ( !can_access_club( $club_id ) ) goto footer;
if ( !can_manage('vice-president', $club_id) ) goto footer;

$table = get_table_name('event_join');
$user_id = (int) $_SESSION['id'];

$stmt = $db->prepare("SELECT * FROM `{$table}` WHERE event_id = '{$event_id}'");
$stmt->execute();

?>
<div class="container-xl">
	<div class="row rowcard">
		<div class="card">
			<div class="table-responsive">
				<table class="table table-vcenter table-mobile-md card-table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Title</th>
						</tr>
					</thead>
					<tbody>

						<?php while ($club = $stmt->fetch(PDO::FETCH_ASSOC) ) {
							$user = get_user_meta( $club['user_id'] );

						?>

						<tr>
							<td data-label="Name">
								<div class="d-flex py-1 align-items-center">
									<span class="avatar me-2" style="background-image: url('<?php echo get_attachment( $user['img'] ); ?>')"></span>
									<div class="flex-fill">
										<div class="font-weight-medium"><?php echo $user['user_name'] ?></div>
										<div class="text-muted"><?php echo $user['user_email'] ?></div>
									</div>
								</div>
							</td>
							<td data-label="Title">
								<div>Mechanical Systems Engineer</div>
								<div class="text-muted">Sub Text</div>
							</td>
						</tr>

					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
	footer: