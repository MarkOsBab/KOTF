<?php
/*/ Header /*/
include 'templates/header.html';
/*/ Vars PHP /*/
include 'templates/includes/verify.php';

/*/If user is login /*/
if (!empty($_SESSION['id'])) {
	header("Location: /Home/");
}
/*/ If user is not login /*/
elseif (empty($_SESSION['id']))  {
	header("Location: /Login/");
}

/*/ Footer /*/
include 'templates/footer.html';
?>
