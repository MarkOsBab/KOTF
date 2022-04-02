<?php
function isChrome() {
    return preg_match('/chrome/i', $_SERVER['HTTP_USER_AGENT']);
}
if (!isChrome()) {
    echo 'This website can only be run from the web browser Google Chrome download it <a href="https://www.google.com/chrome/">here</a>';
    exit;
}
include('../templates/includes/config.php');
$session_uid='';
$_SESSION['id']=''; 
if(empty($session_uid) && empty($_SESSION['id']))
{
$url=BASE_URL.'/Login/';
header("Location: $url");
//echo "";
}
?>