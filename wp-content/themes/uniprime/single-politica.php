<?php

/**
 * Template Name: Página de políticas
 */

get_header(); 
$array_politica = array(
  'post_type'   => 'politica'
);

$get_politicas = get_posts( $array_politica );
?>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image">
      <img src="http://uniprime.local/wp-content/uploads/2024/03/img-politicas.jpg" alt="Foto de capa de políticas" >
    </div>
    <div class="container">
      <div class="position-absolute copy">
        <div class="title">
          Políticas
        </div>
        <div class="description">
          Confira todas as políticas Uniprime
        </div>
      </div>
    </div>
  </div>
</div>
<section class="nossos-produtos mw-100">
  <div class="container">
    <div class="d-flex">
      <div class="col-3">
        <ul class="nav nav-pills" id="tabs-politicas">
          <?php
          //print_r($get_politicas); guid post_name
          foreach($get_politicas as $key=>$get_politica) {
            //echo get_post_permalink($get_politica->ID);
            //echo get_permalink();
            ?>
            <li class="nav-item">
              <a href="<?php echo get_post_permalink($get_politica->ID);?>"class="nav-link <?php echo (get_permalink()===get_post_permalink($get_politica->ID)) ? 'active': '';?>" id="tab-<?php echo $key;?>"><?php echo $get_politica->post_title; ?><i class="arrow right"></i></a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="content col-9">
        <div class="tab-content" id="myTabContent">
          <?php while ( have_posts() ) : the_post(); ?>

            <h1><?php the_field('custom_title'); ?></h1>

            <p><?php the_content(); ?></p>

            <?php endwhile; // end of the loop. ?>
        </div>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>