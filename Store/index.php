<?php
function isChrome() {
    return preg_match('/chrome/i', $_SERVER['HTTP_USER_AGENT']);
}
if (!isChrome()) {
    echo 'This website can only be run from the web browser Google Chrome download it <a href="https://www.google.com/chrome/">here</a>';
    exit;
}
/*/ Config /*/ 
include('../templates/includes/config.php');
/*/ Session Info /*/
include('../templates/includes/session.php');

$userDetails=$userClass->userDetails($session_id);

$username = $userDetails->Username;

$dark = $userDetails->Dark;

$access = $userDetails->Access;

/*/ If user is not login /*/
if (empty($_SESSION['id']))  {
  header("Location: /Login/");
}


if ($dark == 1) {
	/*/ Header /*/
	include '../templates/dark/header.html';
} elseif ($dark == 0) {
	include '../templates/white/header.html';
}
/*/ NavBar /*/
include '../templates/navbar.html';
/*/ User Navbar /*/
include '../templates/user-navbar.html';
if ($access > 39) {
	echo '<a  class="btn btn-lg btn-block nikki-btn m-t-20" target="_blank" href="../access/config/panel">Panel</a>';
}
if ($dark == 1) {
	/*/ Header /*/
	include '../templates/dark/store.html';
} elseif ($dark == 0) {
	include '../templates/white/store.html';
}
/*/ Maps /*/
if ($dark == 1) {
	include '../templates/dark/maps.php';
} elseif ($dark == 0) {
	include '../templates/white/maps.php';
}
/*/ Ranking /*/
if ($dark == 1) {
	include '../templates/dark/ranking.php';
} elseif ($dark == 0) {
	include '../templates/white/ranking.php';
}
/*/ Footer /*/
include '../templates/footer.html';

?>