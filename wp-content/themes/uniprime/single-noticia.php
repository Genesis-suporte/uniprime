<?php

/**
 * Template Name: Página de notícia
 */

get_header(); 

?>


<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
//$author_id = get_field('post_author');
global $post;
$post_id = $post->ID;
$post_author_id = get_post_field('post_author', $post_id);
$post_author = get_the_author_meta('nickname', $post_author_id);

$date_published = get_the_date();
$date_published_brazilian = date_i18n('d M Y', strtotime($date_published));

// Obtenha o conteúdo do post
$content = get_the_content();
// Conte o número de palavras no conteúdo
$word_count = str_word_count(strip_tags($content));
// Estime o tempo de leitura com base em uma velocidade média de leitura (em palavras por minuto)
$average_reading_speed = 200; // Palavras por minuto
$reading_time_minutes = ceil($word_count / $average_reading_speed);

?>
<section class="single-noticia mw-100">
  <div class="container">
    <div class="d-grid cols-noticia">
      <div class="content">
        <div class="tab-content" id="tab-content">
          <div class="">
            <div class="title-block title-28 switzerlandBold">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="post-date">
              <?php echo $date_published_brazilian . ' · ' . $reading_time_minutes . ' min de leitura'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="content">
    <?php 
      the_content();
    ?>
  </div>
</section>


<script type="text/javascript">
  (function($){
  window.addEventListener("load", ()=>{
    const btn_fique_por_dentro = document.querySelectorAll('.button-fique-por-dentro .btn')
    btn_fique_por_dentro.forEach(triggerEl => {
      triggerEl.addEventListener('click', event => {
        console.log(event);
        event.preventDefault()
        for (let j = 0; j < btn_fique_por_dentro.length; j++) {
          btn_fique_por_dentro[j].classList.remove('actived');
        }
        event.currentTarget.classList.toggle('actived');

        
      })
    })
  });
})(jQuery); 

</script>

<?php get_footer(); ?>