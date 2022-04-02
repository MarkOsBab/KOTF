<?php 
/*/ Config /*/ 
include('../../../templates/includes/config.php');
/*/ Session Info /*/
include('../../../templates/includes/userClass.php');
/* Vip 1 Month */
function cincoMCoins() {
try{
$db = getDB();

$user_data = $db->prepare('SELECT * FROM meh_users WHERE id='.$_SESSION['id'].' LIMIT 1');
$user_data->execute();
$resultado = $user_data->fetchAll();

foreach ($resultado as $row) {
        $user_id = $row['id'];
        $name = $row['Username'];
        $old_coin = $row['Coins'];
        $old_donations = $row['Donations'];
}
$id=$db->lastInsertId(); // Last inserted row id


$vip1Month = $db->prepare("INSERT INTO meh_users_payments (user_id,Username,Purchase,Purchase_id,Fecha) VALUES ($user_id, '$name','5 M Coins', 12, CURRENT_TIMESTAMP)");
$vip1Month->execute();

$add_coins = $old_coin + 5000000;
$add_donation = $old_donations + 9.99;

$vip1Month = $db->prepare("UPDATE meh_users SET Purchase='5 M Coins', Purchase_id=12, Coins='$add_coins', Donations='$add_donation' WHERE id=$user_id");
$vip1Month->execute();
$db = null;

return true;
} catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';  

} 
}



?>