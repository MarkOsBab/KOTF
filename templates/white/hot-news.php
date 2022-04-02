<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<?php
//Preparamos la consulta
$db = getDB();
$consulta = "SELECT * FROM meh_hot_news ORDER BY id DESC";
//Ejecutamos la consulta y guardamos el resultado
$resultado = $db->query($consulta);

//Ahora resultado es como una tabla virtual con el resultado de la consulta

while($news = $resultado->fetch()) {
/*/ Get news images /*/
$url=BASE_URL.'assets/images/news/'.$news["Image"];'';
echo '
<!-- News -->

<section class="hero-area container">
    <div class="hero-post-slides owl-carousel">
        <!-- Single Hero Post -->
        <div class="single-hero-post d-flex flex-wrap">
            <!-- Post Thumbnail -->
            <img class="img-fluid no-select hot_news_img m-t-100"  src="'.$url.'">
            <!-- Post Content -->
            <div class="slide-post-content d-flex align-items-center";">
                <div class="slide-post-text">

                    <p class="post-excerpt text-dark" data-animation="fadeIn" data-delay="500ms">'.$news['Content'].'</p>

                </div>
                <!-- Page Count -->
                <div class="page-count"></div>
            </div>
        </div>
    </div>
</section>
<hr>
<!-- News End -->


';
}

?>

</div>
</div>