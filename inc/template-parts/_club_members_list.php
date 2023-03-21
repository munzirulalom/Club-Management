<?php
/* Previent Direct Access */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( !can_access_club() ) goto footer;
if ( !can_manage('excutive') ) goto footer;

$table = get_table_name('user_club');
$user_id = (int) $_SESSION['id'];

$stmt = $db->prepare("SELECT * FROM `{$table}` WHERE club_id = '{$club_id}'");
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
							<th>Role</th>
							<th class="w-1"></th>
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
								<div>--</div>
								<div class="text-muted">--</div>
							</td>
							<td class="text-muted" data-label="Role">
								<?php

								if ( $club['role'] == 0 ) {
									echo "Peinding Request";
								}elseif ( $club['role'] == 1 ) {
									echo "Admin";
								}elseif ( $club['role'] == 2 ) {
									echo "President";
								}elseif ( $club['role'] == 3 ) {
									echo "Vice-President";
								}elseif ( $club['role'] == 4 ) {
									echo "Executive Member";
								}elseif ( $club['role'] == 5 ) {
									echo "General Member";
								}else{
									echo "No Role";
								}

								?>
							</td>
							<?php if ( can_manage('vice-president') ){ ?>
							<td>
								<div class="btn-list flex-nowrap">
									<div class="dropdown">
										<button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</button>
										<div class="dropdown-menu dropdown-menu-end" style="">
											<span class="dropdown-item" onclick="updateUserRole(0, <?php echo $club['user_id'] . ', ' . $club['club_id'] ?>)">Peinding Request</span>
											<span class="dropdown-item" onclick="updateUserRole(1, <?php echo $club['user_id'] . ', ' . $club['club_id'] ?>)">Make Admin</span>
											<span class="dropdown-item" onclick="updateUserRole(2, <?php echo $club['user_id'] . ', ' . $club['club_id'] ?>)">Make President</span>
											<span class="dropdown-item" onclick="updateUserRole(3, <?php echo $club['user_id'] . ', ' . $club['club_id'] ?>)">Make Vice-President</span>
											<span class="dropdown-item" onclick="updateUserRole(4, <?php echo $club['user_id'] . ', ' . $club['club_id'] ?>)">Make Executive Member</span>
											<span class="dropdown-item" onclick="updateUserRole(5, <?php echo $club['user_id'] . ', ' . $club['club_id'] ?>)">Make General Member</span>
										</div>
									</div>
								</div>
							</td>
						<?php } ?>
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