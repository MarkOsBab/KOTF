<?php 
/*/ Config /*/ 
include('../../../templates/includes/config.php');
/*/ Session Info /*/
include('../../../templates/includes/userClass.php');
/* Vip 1 Month */
function Founder() {
try{
$db = getDB();

$user_data = $db->prepare('SELECT * FROM meh_users WHERE id='.$_SESSION['id'].' LIMIT 1');
$user_data->execute();
$resultado = $user_data->fetchAll();

foreach ($resultado as $row) {
        $user_id = $row['id'];
        $name = $row['Username'];
        $old_gold = $row['Gold'];
        $old_coin = $row['Coins'];
        $old_donations = $row['Donations'];
}
$id=$db->lastInsertId(); // Last inserted row id


$vip1Month = $db->prepare("INSERT INTO meh_users_payments (user_id,Username,Purchase,Purchase_id,Fecha) VALUES ($user_id, '$name','Founder', 8, CURRENT_TIMESTAMP)");
$vip1Month->execute();

$expira = date("Y-m-d H:i:s", strtotime("+9999 month"));
$add_gold = $old_gold + 700000;
$add_coins = $old_coin + 700000;
$add_donation = $old_donations + 23;

$vip1Month = $db->prepare("UPDATE meh_users SET Purchase='Founder', Purchase_id=8, UpgradeExpire='$expira',UpgradeDays=1, Gold='$add_gold', Coins='$add_coins', Founder=1, Access=3, Donations='$add_donation' WHERE id=$user_id");
$vip1Month->execute();

$sql = "SELECT count(*) FROM `meh_users_badges` WHERE BadgerID= 4 AND UserID=$user_id"; 
$result = $db->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 


if ($number_of_rows == 0) {
	$vipBadge = $db->prepare("INSERT INTO meh_users_badges (BadgerID, UserID) VALUES ('4', ".$user_id.")");
	$vipBadge->execute();
	echo "Done";
} elseif ($number_of_rows == 1) {
	echo "Fail";
}
$db = null;

return true;
} catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';  

} 
}



?>