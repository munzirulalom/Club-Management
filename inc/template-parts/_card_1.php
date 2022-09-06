<?php 
/* Previent Direct Access */
if ( ! defined( 'ABSPATH' ) ) exit;

 ?>
 <div class="col-md-6 col-lg-3">
 	
 	<div class="card">
 		<a href="<?php echo SITE_URL .'/event/'.$event['id'].'?club_id='.$club_id ?>">
 			<div class="card-img-top img-responsive img-responsive-21x9" style="background-image: url('<?php echo get_attachment( $event['img'] ); ?>')"></div>
 			<div class="card-body">
 				<h3 class="card-title"><?php echo $event['name'] ?></h3>
 				<p class="text-muted"><?php echo substr( $event['description'], 0, 45 ) ?></p>
 				<dl class="row">
 					<dt class="col-5">Registration Date:</dt>
 					<dd class="col-7"><?php echo date("F j, Y", strtotime($event['reg_start'])) ?></dd>
 					<dt class="col-5">Event Date:</dt>
 					<dd class="col-7"><?php echo date("F j, Y", strtotime($event['event_date'])) ?></dd>
 					<dt class="col-5">Organize Club:</dt>
 					<dd class="col-7"><?php echo get_club_name( $event['club_id'] ); ?></dd>
 				</dl>
 			</div>
 		</a>
 	</div>
 
 </div>