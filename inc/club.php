<?php
/* Previent Direct Access */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

if ( !can_access_club() ) goto footer;
if ( !can_manage('general') ) goto footer;
$club_id = (int)$_GET['id'];

if ( !is_club() ) goto footer;


if ( isset($_GET['clubPage']) AND $_GET['clubPage'] === "members" ) {
	include "template-parts/_club_members_list.php";
	goto footer;
}elseif ( isset($_GET['clubPage']) AND $_GET['clubPage'] === "setting" ) {
	include "template-parts/_club_setting.php";
	goto footer;
}

$stmt = $db->prepare("SELECT * FROM `club` WHERE id = '{$club_id}'");
$stmt->execute();
$result = $stmt->fetchAll();
$club = array_shift($result);

?>


<div class="container-xl">

	<?php if (can_manage('excutive')) {?>
	<div class="row g-2 align-items-center">
		<div class="col-6 col-sm-4 col-md-2 col-xl py-3">
			<a href="<?php echo SITE_URL ?>/event/?action=add_new&club_id=<?php echo $_GET['id'] ?>" class="btn btn-outline-primary w-100">Create New Event</a>
		</div>
		<div class="col-6 col-sm-4 col-md-2 col-xl py-3">
			<a href="?clubPage=members" class="btn btn-outline-primary w-100">Club Members</a>
		</div>
		<?php if (can_manage('vice-president')) {?>
		<div class="col-6 col-sm-4 col-md-2 col-xl py-3">
			<a href="?clubPage=setting" class="btn btn-outline-primary w-100">Club Setting</a>
		</div>
	<?php } ?>
	</div>
<?php } ?>

	<div class="row row-deck row-cards">
		<div class="col-12 col-lg-12">
			<div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active"><img class="img-fluid d-block w-100" alt="" src="<?php echo get_attachment($club['img']) ?>"></div>
				</div>
				<a class="carousel-control-prev" href="#carousel-controls" role="button" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-controls" role="button" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</a>
			</div>
		</div>
	</div>

	<h2 class="page-title my-3">Event List</h2>
	<div class="row row-deck row-cards">

		<?php
		$stmt = $db->prepare("SELECT * FROM event WHERE club_id = '{$club_id}'");
		$stmt->execute();

		while( $event = $stmt->fetch(PDO::FETCH_ASSOC) ){
			include('template-parts/_card_1.php');
		}

		
		 ?>

	</div>
</div>

<?php
footer:
get_footer();