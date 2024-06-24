<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="nossos-produtos mw-100 z-13">
  <div class="container">
    <div class="label-block">
      <?php echo esc_html($label); ?>
    </div>
    <div class="title-block title-28 switzerlandBold">
      <?php echo esc_html($titulo); ?>
    </div>
    <div class="description-block">
      <div class="d-flex">
        <div class="col col-left">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="arrows-nossos-produtos-desktop d-none d-lg-flex"></div>
      </div>
    </div>
    <div class="block-content">
      <div class="slide-nossos-produtos row">
        <?php
          global $post;
          $currentSlug = $post->post_name;
          
          $get_solucoes_id = array(
            'numberposts'      => -1,
            'post_type'   => 'solucoes',
            'orderby'          => 'date',
            'order'            => 'DESC'
          );
          $get_solucoes = get_posts( $get_solucoes_id );
         
          foreach($get_solucoes as $get_solucao) {
           
            $terms = get_the_terms( $get_solucao, 'tipo-solucao' ); 
            //$index_nh = 0;
            foreach($terms as $term) {
              //echo 'tyara '.$post->post_name.'<br />';
              if($currentSlug == $term->slug || (is_front_page() && $term->slug == 'para-voce') || (is_admin() && $term->slug == 'para-voce') ) { 
                //var_dump( $term->slug );
                ?>
                
                <div class="col col-4 card-nossos-produtos">
                  <a href="<?php echo $get_solucao->guid;?>" target="_SELF" role="button" class="icon-menu icon-<?php echo $get_solucao->post_name;?>-gold">
                    <?php echo $get_solucao->post_title; ?>
                    <i class="arrow right"></i>
                  </a>
                </div>
              <?php 
              }
            }
          }
        ?>
          
      </div>
    </div>
    
    <div class="arrows-nossos-produtos-mobile arrows-mobile d-flex d-lg-none justify-content-center"></div>
  </div>
</section>