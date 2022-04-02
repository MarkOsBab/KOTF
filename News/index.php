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
if ($access > 39) {
	echo '<a  class="btn btn-lg btn-block nikki-btn m-t-20" target="_blank" href="../access/config/panel">Panel</a>';
}
/*/ News PHP /*/

?>
<center>
  <img class="no-select p-t-150 img-fluid" draggable="false" src="../assets/images/KOTF_Logo.png" alt="Logo" width="450">
</center>
<?php

if ($dark == 1) {
	echo "<span class='news-title p-b-40 p-t-40 no-select text-white'>LAST NEWS <hr /></span>";
	include '../templates/dark/news.php';
} elseif ($dark == 0) {
	echo "<span class='news-title p-b-40 p-t-40 no-select'>LAST NEWS <hr /></span>";
	include '../templates/white/news.php';
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