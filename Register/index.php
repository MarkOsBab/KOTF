<?php
function isChrome() {
    return preg_match('/chrome/i', $_SERVER['HTTP_USER_AGENT']);
}
if (!isChrome()) {
    echo 'This website can only be run from the web browser Google Chrome download it <a href="https://www.google.com/chrome/">here</a>';
    exit;
}
/*/ Singup vars /*/
include '../templates/includes/verify.php';
/*/ Header /*/
include '../templates/white/header.html';
/*/ NavBar /*/
include '../templates/navbar.html';
/*/ Register /*/
include '../templates/register.html';
/*/ Maps /*/
include '../templates/white/maps.php';
/*/ Ranking /*/
include '../templates/white/ranking.php';
/*/Footer /*/
include '../templates/white/footer.html';
?>