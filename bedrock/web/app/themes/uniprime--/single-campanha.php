<?php

/**
 * Template Name: Página interna de Campanhas
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');

$label = get_field('label');
$descricao = get_field('descricao');
?>

<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);">
      <!--<img src="<?php echo esc_url($image_banner['url']); ?>" alt="<?php echo esc_html($image_banner['alt']); ?>" >-->
    </div>
    <div class="container">
      <div class="position-absolute copy">
        <?php if($title_banner) { ?>
          <h1 class="title title-48 switzerlandLight">
            <?php echo esc_html($title_banner); ?>
          </h1>
        <?php } ?>
        <?php if($description_banner) { ?>
          <h2 class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </h2>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
?>
<section class="single-campanha mw-100">
  <div class="container">
    <div class="content">
      <div class="tab-content" id="tab-content">
        <?php //while ( have_posts() ) : the_post(); ?>
          <div class="">
            <?php if($label) { ?>
              <div class="label-campanha d-flex justify-content-start justify-content-lg-center">
                <div class="label-block">
                  <?php echo esc_html($label); ?>
                </div>
              </div>
            <?php } ?>
            <div class="title-block title-28 switzerlandBold text-left text-lg-center">
              <h1><?php the_title(); ?></h1>
            </div>        
            <?php 
            if($descricao) { ?>
              <div class="description-block text-left text-lg-center">
                <?php echo esc_html($descricao); ?>
              </div>
            <?php } ?>    
            <div class="content">
              <?php 
              if( have_rows('secoes') ) {
                $num_rows = 0;
                $titulo_secao_content = '';
                $secao_content = '';
                while ( have_rows('secoes') ) {
                  
                  the_row();
                  // Case: Paragraph layout.
                  if( get_row_layout() == 'secao' ) {
                    //print_r(get_sub_field('imagem_cta'));
                    $layout = get_sub_field('layout');
                    $titulo_secao = get_sub_field('titulo');
                    if($titulo_secao) {
                      $num_rows++;
                      // turn string on $titulo_secao to slug for anchor with hyphens instead of white spaces and remove all accents
                      $slug_anchor = sanitize_title( $titulo_secao );

                      if($layout == 'layout1') {
                        $icon_title = 'arrow right';
                      } else {
                        $icon_title = 'icon-download right';
                      }
                      $titulo_secao_content .= '<div class="title-anchor"><a href="#'.$slug_anchor.'" target="_SELF" role="button" class="" tabindex="0">'.__($titulo_secao).' <i class="icon-title-anchor '.$icon_title.'"></i></a></div>';
                    }
                    $texto = get_sub_field('texto');
                    $imagem = get_sub_field('imagem');
                    $link = get_sub_field('link');
                    /*if($link) {
                      $link_url = $link['url'];
                      //$link_title = $link['title'];
                      //$link_target = $link['target'] ? $link['target'] : '_self';
                    }*/
                    if($layout == 'layout1') {
                      if($titulo_secao) {
                        $secao_content .= '<div class="container-secao" id="'.$slug_anchor.'">';
                        $secao_content .= '<div class="secao-title"><h3 class="title-28 switzerlandBold">'.__($titulo_secao).'</h3></div>';
                      } else {
                        $secao_content .= '<div class="container-secao">';
                      }
                      if($texto) {
                        $secao_content .= '<div class="secao-content">'.__($texto).'</div>';
                      }
                      if($imagem) {
                        $secao_content .= '<div class="image-content">';
                        if($link) {
                          $secao_content .=   '<a href="'.esc_url( $link['url'] ).'" target="'.esc_url( $link['target'] ).'">';
                        }
                        $secao_content .=   '<img class="d-flex" src="'.esc_url($imagem['url']).'" alt="'.esc_html($imagem['alt']).'" >';
                        if($link) {
                          $secao_content .=   '</a>';
                        }
                        $secao_content .= '</div>';
                      }
                      $secao_content .= '</div>';
                    } else {
                      if($titulo_secao) {
                        $secao_content .= '<div class="container-secao-card" id="'.$slug_anchor.'">';
                        $secao_content .= '<div class="secao-title"><h3 class="title-36 switzerlandLight">'.__($titulo_secao).'</h3></div>';
                      } else {
                        $secao_content .= '<div class="container-secao-card">';
                      }
                      $secao_content .= '<div class="d-flex flex-column flex-lg-row">';
                      if($texto) {
                        $secao_content .= '<div class="secao-content flex-fill align-self-end">'.__($texto).'</div>';
                      }
                      if($link) {
                        $secao_content .=   '<div class="flex-fill align-self-start align-self-lg-end ms-lg-3 mb-3"><a href="'.esc_url( $link['url'] ).'" class="btn btn-download" target="'.__( $link['target'] ).'">'.esc_html( $link['title'] ).' <i class="icon-download right"></i></a></div>';
                        
                      }
                      $secao_content .= '</div></div>';
                    }
                    
                    /*?>
                      
                    </div>
                      <a class="button" href="<?php echo esc_url( $link ); ?>" target="_blank">
                        <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_attr($imagem_cta['alt']); ?>" />
                      </a>
                    <?php*/
                  }
                  
                // End loop.
                }
                if($num_rows == 1) {
                  $num_colunas = 'one';
                } else if($num_rows == 2) {
                  $num_colunas = 'two';
                } else if($num_rows == 3) {
                  $num_colunas = 'three';
                } else {
                  $num_colunas = 'four';
                } 
              // No value.
              } else {
                // Do something...
              }
              ?>
              
              <div class="menu-anchor-campanha d-grid container-grid-<?php echo $num_colunas;?>-col">
                <?php echo $titulo_secao_content; ?>
              </div>
              <div class="secoes">
                <?php echo $secao_content; ?>
              </div>
            </div>
          </div>

          <?php //endwhile; // end of the loop. ?>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>