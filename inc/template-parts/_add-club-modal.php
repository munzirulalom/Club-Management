<?php 
/* Previent Direct Access */
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="modal modal-blur fade" id="modal-add-club" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form id="add-club" action="ajax/add-club.php" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Club</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Club Name</label>
						<input type="text" class="form-control" id="club_name" name="club_name" placeholder="Your club name" required autocomplete="off">
					</div>
					<div class="mb-3">
						<label class="form-label">Club Description</label>
						<textarea class="form-control" id="club_description" name="club_description" placeholder="Enter club description" required></textarea>
					</div>

					<div class="row">
						<div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
							<div class="user-search-list" ></div>
						</div>							
					</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
						Cancel
					</a>
					<button type="submit" class="btn btn-primary ms-auto" name="add-club-submit">
						<!-- Download SVG icon from http://tabler-icons.io/i/plus -->
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
						Create club
					</button>
				</div>
			</div>
		</form>
		<div id="message"></div>
	</div>
</div>