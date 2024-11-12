<?php

/**
 * Template Name: Página de políticas
 */
$tipo_homepage = '';
get_header(); 
$array_politica = array(
  'post_type'   => 'politica'
);

$get_politicas = get_posts( $array_politica );
$upload_dir = wp_upload_dir();
$upload_url = $upload_dir['baseurl']; 
?>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image d-none d-sm-block" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/Politicas.jpg');"></div>
    <div class="image d-block d-sm-none" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/Politicas-mobile.jpg');"></div>
    <div class="container">
      <div class="position-absolute copy">
        <div class="title title-48 switzerlandLight">
          Políticas
        </div>
        <div class="description title-24 switzerlandBold">
          Confira todas as políticas Uniprime
        </div>
      </div>
    </div>
  </div>
</div>
<div class="politicas-mobile d-flex d-lg-none flex-column">
  <div class="select-politica" id="select-politica">
    <?php echo the_title().'<i class="arrow down"></i>'; ?>
  </div>
  <div class="nav-politicas-mobile" id="nav-politicas-mobile">
    <div class="container-menu-politicas-mobile d-flex flex-column">
      <div>
        <div class="header-content-mobile d-flex flex-column">
          <button class="slick-next slick-arrow voltar" aria-label="Next" type="button" style="" aria-disabled="false"></button>
          <div class="title-menu-mobile">Nossas Políticas</div>
        </div>
        <div class="content-menu-mobile">
          <div class="option-politicas" id="option-politicas">
            <?php 
              //print_r($get_politicas); guid post_name
              foreach($get_politicas as $key=>$get_politica) {
                //echo get_post_permalink($get_politica->ID);
                //echo get_permalink();
                ?>
                <div class="nav-item  <?php echo (get_permalink()===get_post_permalink($get_politica->ID)) ? 'active': '';?>">
                  <a href="<?php echo get_post_permalink($get_politica->ID);?>"class="nav-link d-flex align-items-center" id="tab-<?php echo $key;?>"><?php echo $get_politica->post_title; ?><i class="arrow right"></i></a>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
?>
<section class="single-politica mw-100">
  <div class="container">
    <div class="d-grid cols-politica">
      <div class="col-nav d-none d-lg-block">
        <ul class="nav nav-pills" id="tabs-politicas">
          <?php
          foreach($get_politicas as $key=>$get_politica) {
            ?>
            <li class="nav-item">
              <a href="<?php echo get_post_permalink($get_politica->ID);?>"class="nav-link <?php echo (get_permalink()===get_post_permalink($get_politica->ID)) ? 'active': '';?>" id="tab-<?php echo $key;?>"><?php echo $get_politica->post_title; ?><i class="arrow right"></i></a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="content copy-politica">
        <div class="tab-content" id="tab-content">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="">
              <div class="label-block">
                POLÍTICAS UNIPRIME
              </div>
              <div class="title-block title-28 switzerlandBold">
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