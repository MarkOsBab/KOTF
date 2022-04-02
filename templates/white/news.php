<?php
//Preparamos la consulta
$db = getDB();
$consulta = "SELECT * FROM meh_news ORDER BY id DESC LIMIT 3";
//Ejecutamos la consulta y guardamos el resultado
$resultado = $db->query($consulta);

//Ahora resultado es como una tabla virtual con el resultado de la consulta

while($news = $resultado->fetch()) {
/*/ Get news images /*/
$url=BASE_URL.'assets/images/news/'.$news["Image"];'';
echo '
<!-- News -->

<div class="aniview" data-av-animation="slideInLeft">
<div class="w3-row-padding w3-padding-64 w3-container w3-text-dark no-select">
  <div class="w3-content no-select">
    <div class="w3-twothird no-select">
      <h1 class=w3-text-dark no-select">'.$news['Title'].'</h1>
      <h5 class="w3-padding-32 w3-text-dark no-select">'.$news['Content'].'</h5>
      <small class="w3-row-padding w3-text-dark no-select">Date: '.$news['Date'].'</small>
    </div>

    <div class="w3-third w3-center">
      <img class="responsive1 no-select" src="'.$url.'">
    </div>
  </div>
</div>
</div>
<!-- News End -->

';
}
?>

