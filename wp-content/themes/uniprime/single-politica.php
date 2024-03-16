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
<section class="single-politica mw-100">
  <div class="container">
    <div class="d-grid cols-politica">
      <div class="col-nav ">
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
      <div class="content">
        <div class="tab-content" id="tab-content">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="">
              <div class="label-block">
                POLÍTICAS UNIPRIME
              </div>
              <div class="title-block">
                <h1><?php the_title(); ?></h1>
              </div>
              <div class="content">
                <?php the_content(); ?>
              </div>
            </div>

            <?php endwhile; // end of the loop. ?>
        </div>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>