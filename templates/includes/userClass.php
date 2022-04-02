<?php 
class userClass
{
/* User Login */
public function userLogin($usernameEmail,$password)
{
try{
$db = getDB();
$hash_password= hash('sha256', $password); //Password encryption 
$stmt = $db->prepare("SELECT id FROM meh_users WHERE (username=:usernameEmail or email=:usernameEmail) AND password=:hash_password"); 
$stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetch(PDO::FETCH_OBJ);
$db = null;
if($count)
{
$_SESSION['id']=$data->id; // Storing user session value
return true;
}
else
{
return false;
} 
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}

/* Human Male Registration */
public function HumanMaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceHuman,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/M/Default.swf','Default',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 2, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

} 
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* Human Female Registration */
public function HumanFemaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceHuman,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/F/Pig1Bangs1.swf','Pig1Bangs1',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 2, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* Undead Male Registration */
public function UndeadMaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceUndead,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/M/Default.swf','Default',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 3, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

} 
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* Undead Female Registration */
public function UndeadFemaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceUndead,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/F/Pig1Bangs1.swf','Pig1Bangs1',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 3, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* Elf Male Registration */
public function ElfMaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceElf,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/M/Default.swf','Default',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 4, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

} 
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* Elf Female Registration */
public function ElfFemaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceElf,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/F/Pig1Bangs1.swf','Pig1Bangs1',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 4, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* Beast Male Registration */
public function BeastMaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceBeast,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/M/Default.swf','Default',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 5, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

} 
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* Beast Female Registration */
public function BeastFemaleRegistration($username,$password,$email,$name,$gender,$race)
{
try{
$db = getDB();
$st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
$st->bindParam("username", $username,PDO::PARAM_STR);
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $db->prepare("INSERT INTO meh_users
	(username,password,email,Race,RaceBeast,name,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder)
	VALUES (:username,:hash_password,:email,:race,1,:name,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/F/Pig1Bangs1.swf','Pig1Bangs1',-1)");

$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $password); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
$stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
$stmt->bindParam("race", $race,PDO::PARAM_STR) ;
$stmt->execute();
$id=$db->lastInsertId(); // Last inserted row id
$db = null;
$_SESSION['id']=$id;

$db = getDB();
$st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
$st1->execute();
$st1->bindParam("id", $id,PDO::PARAM_STR);

$Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
$Weapon->execute();

$Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 5, 1, 'ar', 1, 1, 0, 1957, 1)");
$Armor->execute();

return true;
}
else
{
$db = null;
return false;
}

}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

/* User Details */
public function userDetails($id)
{
try{
$db = getDB();
$stmt = $db->prepare("SELECT * FROM meh_users WHERE id=:id"); 
$stmt->bindParam("id", $id,PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
$user_id=$data->id; // Storing user session value

return $data;
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}
}
?>