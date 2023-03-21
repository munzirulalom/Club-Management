<?php
/* Previent Direct Access */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$table = get_table_name('club');
$user_id = (int) $_SESSION['id'];

$stmt = $db->prepare("SELECT * FROM `{$table}`");
$stmt->execute();
?>

<div class="container-xl">
	<div class="row row-cards">

		<?php while ($club = $stmt->fetch(PDO::FETCH_ASSOC) ) { ?>

		
		<div class="col-4">
			
			<div class="card card-sm">
				<div class="card-body">
					<a href="<?php echo SITE_URL; ?>/club/<?php echo $club['id']; ?>" class="text-reset">
						<h3 class="card-title"><?php echo $club['name']; ?></h3>
						<div class="ratio ratio-16x9">
							<img src="<?php echo get_attachment( $club['img'] ); ?>" class="rounded object-cover" alt="Club Image">
						</div>
					</a>
					<div class="mt-4">
						<div class="row">
							<div class="col-6">
							</div>
							<div class="col-6 text-muted">
								<span class="switch-icon-a text-muted">
									<?php
									if (!can_access_club( $club['id'] )) {?>
										<button class="btn btn-primary w-100" onclick="joinClub(<?php echo $club['id']; ?>)">Join Club</button>
									<?php }else{?>
										<button class="btn btn-danger w-100" onclick="leaveClub(<?php echo $club['id']; ?>)">Leave Club</button>
									<?php }
									?>
									
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	

	<?php } ?>

	</div>
</div>

<?php get_footer() ?>