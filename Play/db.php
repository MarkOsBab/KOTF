<?php
function isChrome() {
    return preg_match('/chrome/i', $_SERVER['HTTP_USER_AGENT']);
}
if (!isChrome()) {
    echo 'This website can only be run from the web browser Google Chrome download it <a href="https://www.google.com/chrome/">here</a>';
    exit;
}
$host = 'localhost'; //usually localhost
$username = 'root'; //your username assigned to your database
$password = ''; //your password assigned to your user & database
$database = 'altrion'; //your database name
?>