<div class="p-b-100">
<?php

$db = getDB();
$id_user = $_GET['id'];
if ($id_user != ""){
    $objRS_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$id_user."'");
    $objRS1_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$id_user."'");
    $objRS_query->execute();
    $objRS1_query->execute();
    $objRS1 = $objRS1_query->fetch(PDO::FETCH_ASSOC);
    $i = 0;
    while ($objRS = $objRS_query->fetchAll()){
        $i = $i + 1;
    }
    if ($i != ""){
  $id = $objRS1['id'];
  $iAccess = $objRS1['Access'];
  $iGold = $objRS1['Gold'];
  $iCoins = $objRS1['Coins'];
  $iName = $objRS1['Username'];
    }
}
?>

<?php
$userid2 = $_GET['id'];
if ($userid2 != ""){
    $objRS_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$userid2."'");
    $objRS1_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$userid2."'");
    $objRS_query->execute();
    $objRS1_query->execute();
    $objRS1 = $objRS1_query->fetch(PDO::FETCH_ASSOC);
    $i = 0;
    while ($objRS = $objRS_query->fetchAll()){
        $i = $i + 1;        
    }
    if ($i != ""){
    $id = $objRS1['id'];
        $strUsername = $objRS1['Username'];
        $iLvl  = $objRS1['Level'];
        $bgindex  = $objRS1['ColorSkin'];
        $facecolors = $objRS1['ColorEye'];
        $armorcolors = $objRS1['ColorBase'];
    $bHelm = 1;
    $bPet = 1;
    $bCloak = 1;
    $regip = 1;
    } else {
  die('
<center><p>The user does not exist in our database!</p></center>
</td>
</tr>
</table></td>
</tr>
<tr>
<td colspan="2" class="cellScrollBottom">&nbsp;</td>
</tr>
</table>
      ');
    }
}
//CURRENT ARMOR
$current_arm = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ar' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_arm->execute();

$carm = $current_arm->fetch(PDO::FETCH_ASSOC);
$current_a = $db->prepare("SELECT * FROM meh_items WHERE id = '".$carm['itemid']."'");
$current_a->execute();
$ca = $current_a->fetch(PDO::FETCH_ASSOC);


//CURRENT WEAPON
$current_wep = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'Weapon' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_wep->execute();
$cwep = $current_wep->fetch(PDO::FETCH_ASSOC);
$current_w = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cwep['itemid']."'");
$current_w->execute();
$cw = $current_w->fetch(PDO::FETCH_ASSOC);



//CURRENT BACK ITEM
if($bCloak >= 1){
$current_ba = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ba' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_ba->execute();
$cba = $current_ba->fetch(PDO::FETCH_ASSOC);
$current_b = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cba['itemid']."'");
$current_b->execute();
$cb = $current_b->fetch(PDO::FETCH_ASSOC);

}


//CURRENT PET
if($bPet >= 1){
$current_pe = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'pe' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_pe->execute();
$cpe = $current_pe->fetch(PDO::FETCH_ASSOC);
$current_p = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cpe['itemid']."'");
$current_p->execute();
$cp = $current_p->fetch(PDO::FETCH_ASSOC);

}

//CURRENT HELM
if($bHelm >= 1){
$current_he = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'he' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_he->execute();
$che = $current_he->fetch(PDO::FETCH_ASSOC);
$current_h = $db->prepare("SELECT * FROM meh_items WHERE id = '".$che['itemid']."'");
$current_h->execute();
$ch = $current_h->fetch(PDO::FETCH_ASSOC);
$helmhair = $ch['File'];
$helmhairl = $ch['Link'];

//Checks if there is not an Equipped Helm
//IF THERE IS NONE EQUIPPED WILL LOAD HAIR INSTEAD
$checkh = $current_h->fetchColumn();;
if ($checkh == 0) {
  $helmhair = 'none';
  $helmhairl = 'none';
}
  }

if($bHelm <= 0){
  $helmhair = 'none';
  $helmhairl = 'none';
}

//CURRENT OUTFIT
$current_ou = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'co' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_ou->execute();
$cur_ou = $current_ou->fetch(PDO::FETCH_ASSOC);
$current_o = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cur_ou['itemid']."'");
$current_o->execute();
$cou = $current_o->fetch(PDO::FETCH_ASSOC);
$armco = $ca['File'];
$armcol = $ca['Link'];

//Checks if there is not an Equipped Outfit
//IF THERE IS NONE EQUIPPED WILL LOAD CURRENT CLASS INSTEAD
$checko = $current_o->fetchColumn();
if ($checko == 0) {
  $armco = $cou['File'];
  $armcol = $cou['Link'];
}
?>


<center>
<div class="embed-responsive embed-responsive-4by3 mt-5" style="width: 50%;>
     <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="640" height="430">
          <param name="movie" value="../gamefiles/KOTF_CharpageV4.swf" />
          <param name="quality" value="high" />
          <param name="flashvars" value="
&intColorHair=<?php echo $objRS1['ColorHair']; ?>&intColorSkin=<?php echo $objRS1['ColorSkin']; ?>&intColorEye=<?php echo $objRS1['ColorEyes']; ?>&intColorTrim=<?php echo $objRS1['ColorTrim']; ?>&intColorBase=<?php echo $objRS1['ColorBase']; ?>&intColorAccessory=<?php echo $objRS1['ColorAccessory']; ?>&ia1=4768&strGender=<?php echo $objRS1['Gender']; ?>&strHairFile=<?php echo $objRS1['HairFile']; ?>&strHairName=<?php echo $objRS1['HairName']; ?>&strName=<?php echo $id_user ?>&intLevel=<?php echo $iLvl; ?>&strClassName=<?php echo $ca['Name']?>&strClassFile=<?php echo $armco ?>&strClassLink=<?php echo $armcol ?>&strArmorName=<?php echo $cou['Name']; ?>&strWeaponFile=<?php echo $cw['File'] ?>&strWeaponLink=<?php echo $cw['Link'] ?>&strWeaponType=<?php echo $cw['Type']; ?>&strWeaponName=<?php echo $cw['Name']; ?>&strCapeFile=<?php echo $cb['File']; ?>&strCapeLink=<?php echo $cb['Link']; ?>&strCapeName=<?php echo $cb['Name']; ?>&strHelmFile=<?php echo $helmhair; ?>&strHelmLink=<?php echo $helmhairl; ?>&strHelmName=<?php echo $ch['Name']; ?>&strPetFile=<?php echo $cp['File']; ?>&strPetLink=<?php echo $cp['Link']; ?>&strPetName=<?php echo $cp['Name']; ?>&bgindex=<?php echo $bgindex; ?> &strFaction=<?php echo $objRS1['Faction']; ?>">
          <embed src="../gamefiles/KOTF_CharpageV4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" flashvars="
&intColorHair=<?php echo $objRS1['ColorHair']; ?>&intColorSkin=<?php echo $objRS1['ColorSkin']; ?>&intColorEye=<?php echo $objRS1['ColorEyes']; ?>&intColorTrim=<?php echo $objRS1['ColorTrim']; ?>&intColorBase=<?php echo $objRS1['ColorBase']; ?>&intColorAccessory=<?php echo $objRS1['ColorAccessory']; ?>&ia1=4768&strGender=<?php echo $objRS1['Gender']; ?>&strHairFile=<?php echo $objRS1['HairFile']; ?>&strHairName=<?php echo $objRS1['HairName']; ?>&strName=<?php echo $id_user ?>&intLevel=<?php echo $iLvl; ?>&strClassName=<?php echo $ca['Name']?>&strClassFile=<?php echo $armco ?>&strClassLink=<?php echo $armcol ?>&strArmorName=<?php echo $cou['Name']; ?>&strWeaponFile=<?php echo $cw['File'] ?>&strWeaponLink=<?php echo $cw['Link'] ?>&strWeaponType=<?php echo $cw['Type']; ?>&strWeaponName=<?php echo $cw['Name']; ?>&strCapeFile=<?php echo $cb['File']; ?>&strCapeLink=<?php echo $cb['Link']; ?>&strCapeName=<?php echo $cb['Name']; ?>&strHelmFile=<?php echo $helmhair; ?>&strHelmLink=<?php echo $helmhairl; ?>&strHelmName=<?php echo $ch['Name']; ?>&strPetFile=<?php echo $cp['File']; ?>&strPetLink=<?php echo $cp['Link']; ?>&strPetName=<?php echo $cp['Name']; ?>&bgindex=<?php echo $bgindex; ?> &strFaction=<?php echo $objRS1['Faction']; ?>"></embed></object>
</div>
</center>
<center>
  <div class="pl-5">
<?php
//Connexion
$ach_query = $db->prepare("SELECT * FROM meh_users_badges WHERE UserID = '".$objRS1['id']."' ORDER BY BadgerID ASC");
$ach_query->execute();
foreach ($ach_query as $ach) {
$achieve_query = $db->prepare("SELECT * FROM meh_achievements WHERE id= '{$ach['BadgerID']}'");
$achieve_query->execute();

foreach ($achieve_query as $achieve) {
  $url=BASE_URL.'assets/images/badges/'.$achieve["Badge"];'';
//Funcion
echo '
<img alt="" draggable="false" class="p-t-30"  width="" height="" src="'.$url.'" />';
?>

<?php } }?>

<div class="pt-5">
<table width="500" cellspacing="0" cellpadding="0">
<tr valign="top"> 
<td width="">
<table width="100" cellpadding="3">
<tr>


<strong class="text-dark">Items</strong>
</tr>
</center>
<br>
<br>
<!---Início de Item Bags-->




<!---Final de Item Bags-->

<!---Início de Item Capas-->


<?php
$armors_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ba' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armors_query->execute();
foreach ($armors_query as $armors) {
                    
$inform1_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armors['itemid']."'");
$inform1_query->execute();
$inform1 = $inform1_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="left" valign="top" class="pl-4">  
<td>
<?php echo '<img src="../../assets/images/inven/cape.png">'; ?>

<span class="text-dark">
<?php echo $inform1['Name']; ?>
</span>
</td>
</tr>
                
<?php } ?>

<!---Fim de Item Capas-->

<!---Início de Item Capacete-->


<?php
$armors_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'he' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armors_query->execute();
  foreach ($armors_query as $armors) {

                    
$inform1_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armors['itemid']."'");
$inform1_query->execute();
$inform1 = $inform1_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="left" valign="top" class="pl-4"> 
<td width="99%">
  <?php echo '<img src="../../assets/images/inven/helm.png">'; ?>
<span class="text-dark">
<?php echo $inform1['Name']; ?>
</span>
</td>
</tr>
                
<?php } ?>

<!---Fim de Item Capacete-->

<!---Início de Item Pet-->


<?php
$pet_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'pe' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$pet_query->execute();
foreach ($pet_query as $pet) {
                    
$inform1pe_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$pet['itemid']."'");
$inform1pe_query->execute();
$inform1pe = $inform1pe_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="left" valign="top" class="pl-4"> 
<td width="99%">
  <?php echo '<img class="bg-dark" src="../../assets/images/inven/pet.png">'; ?>
<span class="text-dark">
<?php echo $inform1pe['Name']; ?>
</span>
</td>
</tr>
                
<?php } ?>  

<!---Fim de Item Pet-->

<!---Início de Item Weapon-->


<?php
$weapons_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment='weapon' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$weapons_query->execute();
foreach ($weapons_query as $weapons) {
$itemid = $weapons['itemid'];               
$inform_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$itemid."'");
$inform_query->execute();
$resultado = $inform_query->fetchAll();
foreach ($resultado as $inform) {
$It_Name = $inform['Name'];
}
?>

<tr align="left" valign="top" class="pl-4">
<td>
  <?php echo '<img src="../../assets/images/inven/sword.png">'; ?>
<span class="text-dark">
<?php echo $It_Name; ?>
</span>
</td>
</tr>

<?php  } ?>

<!---Fim de Item Weapon-->

</table>
</td>

<td>
<table width="300" cellpadding="3" align="right"> 
<tr>
<strong class="pl-5 ml-4 text-dark">Classes & armors</strong>
</tr>
<br>
<br>    
<?php
$armorsar_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ar' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armorsar_query->execute();

foreach ($armorsar_query as $armorsar) {
$inform1ar_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armorsar['itemid']."'");
$inform1ar_query->execute();
$inform1ar = $inform1ar_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="" valign="top" class="pl-4"> 
<td>
  <?php echo '<img src="../../assets/images/inven/class.png">'; ?>
<span class="text-dark">
<?php echo $inform1ar['Name']; ?>
</span>
</td>
</tr>

<?php } ?>  



<?php
$armorsco_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'co' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armorsco_query->execute();
foreach ($armorsco_query as $armorsco) {
$inform1co_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armorsco['itemid']."'");
$inform1co_query->execute();
$inform1co = $inform1co_query->fetch(PDO::FETCH_ASSOC);
?>

<tr align="left" valign="top"> 

<td>
  <?php echo '<img src="../../assets/images/inven/armor.png">'; ?>
<span class="text-dark">
<?php echo $inform1co['Name']; ?>
</span>
</td>
</tr>
         
<?php } ?>
</article>
</table>
</td>
</tr>

</table>



</table>
</div>
</center>
      </div>

        </section>

        </div>
      </center>
    </div>



