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
$user_id = $userDetails->id;
$access = $userDetails->Access;

$dark = $userDetails->Dark;

/*/ If user is not login /*/
if (empty($_SESSION['id']))  {
  header("Location: /Login/");
}





if ($dark == 1) {
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
	include '../templates/dark/about-us.html';
} elseif ($dark == 0) {
	include '../templates/white/about-us.html';
}

/*/ Hot News PHP /*/
if ($dark == 1) {
	echo "<span class='news-title p-b-40 p-t-40 no-select text-white'>HOT NEWS <hr /></span>";
	include '../templates/dark/hot-news.php';
} elseif ($dark == 0) {
	echo "<span class='news-title p-b-40 p-t-40 no-select'>HOT NEWS <hr /></span>";
	include '../templates/white/hot-news.php';
}

/*/ News PHP /*/
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

$db = getDB();
$expiredate=$db->prepare("SELECT * from meh_users WHERE id=$session_id");
$expiredate->execute();
$result = $expiredate->fetchAll();
foreach ($result as $resultado) {
        $resultado['UpgradeExpire'];
}

$fechaexpira=strtotime($resultado['UpgradeExpire']);
$hoy=strtotime(date("Y-m-d H:i:s"));
$hoy2=date("Y-m-d H:i:s");
$diff=$fechaexpira-$hoy;
if($diff<0){
	$actualizar=$db->prepare("UPDATE meh_users SET UpgradeDays = -1, Access = 1 WHERE Access = 10 AND id = $session_id");
	$actualizar->execute();
}
?>