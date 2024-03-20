<?php
/**
 * Template Name: Página de relatórios
 */
get_header(); 
$array_politicas = array(
  'post_type'   => 'relatorio'
);


//relatorios-transparencia
//balanco-uniprime
//gerenciamento-risco
//categoria-1
//categoria-2

$get_politicas = get_posts( $array_politicas );
?>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image">
      <img src="http://uniprime.local/wp-content/uploads/2024/03/relatorios-sistema.jpg" alt="Foto de capa de políticas" >
    </div>
    <div class="container">
      <div class="position-absolute copy">
        <div class="title">
          Relatórios do sistema
        </div>
        <div class="description">
          Esteja sempre informado sobre nossos resultados e siga de perto o progresso da Uniprime
        </div>
      </div>
    </div>
  </div>
</div>
<section class="mw-100">
  <div class="container">
    <div class="d-grid cols-politica">
      <div class="col-nav ">
        <ul class="nav nav-pills" id="tabs-politicas">
          <?php
          //print_r($get_politicas); guid post_name
          foreach($array_politicas as $key=>$array_politica) {
            //echo get_post_permalink($get_politica->ID);
            //echo get_permalink();
            
            
            ?>
            <li class="nav-item">
              <a href="<?php echo get_post_permalink($array_politica->ID);?>"class="nav-link <?php echo (get_permalink()===get_post_permalink($array_politica->ID)) ? 'active': '';?>" id="tab-<?php echo $key;?>"><?php echo $array_politica->post_title; ?><i class="arrow right"></i></a>
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