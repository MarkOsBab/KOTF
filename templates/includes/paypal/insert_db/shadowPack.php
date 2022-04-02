<?php 
/*/ Config /*/ 
include('../../../templates/includes/config.php');
/*/ Session Info /*/
include('../../../templates/includes/userClass.php');
/* Vip 1 Month */
function shadowPack() {
try{
$db = getDB();

$user_data = $db->prepare('SELECT * FROM meh_users WHERE id='.$_SESSION['id'].' LIMIT 1');
$user_data->execute();
$resultado = $user_data->fetchAll();

foreach ($resultado as $row) {
        $user_id = $row['id'];
        $name = $row['Username'];
        $old_donations = $row['Donations'];
}
$id=$db->lastInsertId(); // Last inserted row id


$betaNormal = $db->prepare("INSERT INTO meh_users_payments (user_id,Username,Purchase,Purchase_id,Fecha) VALUES ($user_id, '$name','Shadow Special Pack', 15, CURRENT_TIMESTAMP)");
$betaNormal->execute();

$add_donation = $old_donations + 10;

$betaNormal = $db->prepare("INSERT INTO meh_users_items  (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, dPurchase) VALUES ($user_id, 845, 0, 'None', 1, 1, 0, 0, CURRENT_TIMESTAMP)");
$betaNormal->execute();

$vip1Month = $db->prepare("UPDATE meh_users SET Purchase='Shadow Special Packge', Purchase_id=15, Donations='$add_donation' WHERE id=$user_id");
$vip1Month->execute();
$db = null;

return true;
} catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';  

} 
}


?>