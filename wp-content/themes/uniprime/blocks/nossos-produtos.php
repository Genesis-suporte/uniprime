<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="nossos-produtos mw-100">
  <div class="container">
    <div class="label-block">
      <?php echo esc_html($label); ?>
    </div>
    <div class="title-block">
      <?php echo esc_html($titulo); ?>
    </div>
    <div class="description-block">
      <div class="d-flex">
        <div class="col col-left">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="arrows-nossos-produtos"></div>
      </div>
    </div>
    <div class="block-content">
      <div class="slide-nossos-produtos row">
        <?php
          global $post;
          $currentSlug = $post->post_name;
          
          $get_solucoes_id = array(
            'numberposts'      => -1,
            'post_type'   => 'solucoes'
          );
          $get_solucoes = get_posts( $get_solucoes_id );
          foreach($get_solucoes as $get_colucao) {
            //echo $get_colucao;
            $terms = get_the_terms( $get_colucao, 'tipo-solucao' ); 
            $index_nh = 0;
            foreach($terms as $term) {
              //echo $currentSlug.' - '.$term->slug;
              if($currentSlug == $term->slug || (is_front_page() && $term->slug == 'para-voce')) {
                if(!$index_nh % 3) { ?>
                  <div class="col col-4 card-nossos-produtos">
                    <a href="<?php echo $get_colucao->post_title;?>" target="_SELF" class="icon-menu <?php echo $get_colucao->post_title;?>"><?php echo $get_colucao->post_title; ?></a>
                  </div>
                <?php } else { echo 'tyara';?>
                    <div class="col col-4 card-nossos-produtos d-none">
                      
                    </div>
                  <?php 
                }
              }
              $index_nh++;
            }
            
          }
          
          //echo '<br /><br /><br /><br />';
      /*$args = array( 'post_type' => 'Vacancies');
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
        get_template_part( 'template-parts/vacancies', get_post_format() );
      endwhile;
      wp_reset_query()*/
    ?>
          
      </div>
    </div>
  </div>
</section>