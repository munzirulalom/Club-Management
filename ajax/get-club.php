<?php
require_once("conn.php");

$outputPersonal = '';
$outputProject = '';

$table = get_table_name('club');
$user_id = (int) $_SESSION['id'];

$stmt = $db->prepare("SELECT * FROM `{$table}`");
$stmt->execute();

while ($club = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	$outputPersonal .= '<a href="'.SITE_URL.'/club/'. $club['id'] .'" class="dropdown-item">
	<span class="nav-link-icon d-md-none d-lg-inline-block">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="5" rx="2" /><rect x="4" y="13" width="6" height="7" rx="2" /><rect x="14" y="4" width="6" height="7" rx="2" /><rect x="14" y="15" width="6" height="5" rx="2" />
	</svg>
	</span>'. $club['name'] .'</a>';
}

echo '<h6 class="dropdown-header">Club List</h6>';
echo $outputPersonal;