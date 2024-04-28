<?php

/**
 * Template Name: Página de notícia
 */

get_header(); 
/*$post_types = array( 'noticia', 'campanha', 'sala-imprensa' );
$array_noticia = array(
  'post_type'   => $post_types
);

$get_noticia = get_posts( $array_noticia );
$upload_dir = wp_upload_dir();
$upload_url = $upload_dir['baseurl']; */
/*
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
*/
?>
<!-- <div class="noticia-mobile d-flex d-lg-none flex-column">
  <div class="select-noticia" id="select-noticia">
    <?php echo the_title().'<i class="arrow down"></i>'; ?>
  </div>
  <div class="nav-noticia-mobile" id="nav-noticia-mobile">
    <div class="container-menu-noticia-mobile d-flex flex-column">
      <div>
        <div class="header-content-mobile d-flex flex-column">
          <button class="slick-next slick-arrow voltar" aria-label="Next" type="button" style="" aria-disabled="false"></button>
          <div class="title-menu-mobile">Nossas noticias</div>
        </div>
        <div class="content-menu-mobile">
          <div class="option-noticia" id="option-noticia">
            <?php 
              //print_r($get_noticia); guid post_name
              foreach($get_noticia as $key=>$get_noticia) {
                //echo get_post_permalink($get_noticia->ID);
                //echo get_permalink();
                ?>
                <div class="nav-item  <?php echo (get_permalink()===get_post_permalink($get_noticia->ID)) ? 'active': '';?>">
                  <a href="<?php echo get_post_permalink($get_noticia->ID);?>"class="nav-link d-flex align-items-center" id="tab-<?php echo $key;?>"><?php echo $get_noticia->post_title; ?><i class="arrow right"></i></a>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

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
$date_published_brazilian = date_i18n('d/m/Y', strtotime($date_published));

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
          <?php //while ( have_posts() ) : the_post(); ?>
            <div class="">
              <div class="title-block title-28 switzerlandBold">
                <h1><?php the_title(); ?></h1>
              </div>
              <div class="post-date">
                <?php echo $date_published_brazilian . ' · ' . $reading_time_minutes . ' min de leitura'; ?>
              </div>
              
              <div class="content">
                <?php the_content(); ?>
              </div>
            </div>

            <?php //endwhile; // end of the loop. ?>
        </div>
      </div>
    </div>
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