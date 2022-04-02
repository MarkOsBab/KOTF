<?php
function isChrome() {
    return preg_match('/chrome/i', $_SERVER['HTTP_USER_AGENT']);
}
if (!isChrome()) {
    echo 'This website can only be run from the web browser Google Chrome download it <a href="https://www.google.com/chrome/">here</a>';
    exit;
}
/*/ Header /*/
include '../templates/white/header.html';
/*/ Vars PHP /*/
include '../templates/includes/verify.php';
/*/ Session /*/
/*/ If is login redirect to Home /*/
if (!empty($_SESSION['id'])) {
	header("Location: ../Home");
}
/*/ Login /*/
include '../templates/login.html';
/*/ NavBar /*/
include '../templates/navbar.html';
/*/ Maps /*/
include '../templates/white/maps.php';
/*/ Ranking /*/
include '../templates/white/ranking.php';
/*/ Footer /*/
include '../templates/footer.html';

?>