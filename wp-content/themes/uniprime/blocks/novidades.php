<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="novidades mw-100">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description-block">
          <div class="d-flex">
            <div class="description-block flex-grow-1">
              <?php echo esc_html($descricao); ?>
            </div>
            <div class="arrows-novidades-desktop d-none d-md-flex"></div>
          </div>
        </div>
        <div class="artigos">
          <div class="slide-novidades d-flex justify-content-between">
            <?php 
            $get_campanhas_id = array(
              'fields'      => 'ids',
              'numberposts' => 5,
              'post_type'   => 'campanha'
            );
            $get_campanhas = get_posts( $get_campanhas_id );
            $get_posts_fixed = array(
              'fields'      => 'ids',
              'numberposts' => 5,
              'post_type'   => 'post',
              'post__in'    => get_option( 'sticky_posts' ),            
              'category'    => array(
                'noticias',
                'sala-de-imprensa'
              )
            );
            $get_post_fixed = get_posts( $get_posts_fixed );
            
            $merged_post_ids = array_merge( $get_campanhas, $get_post_fixed);
            /*$wp_query = new WP_Query( array(
              'post_type' => 'any', // any post type
              'post__in'  => $first_post_ids, // our merged queries
            ));
            */
            $merged_array = array(
              'post_type' => 'any', // any post type
              'post__in'  => $merged_post_ids, // our merged queries
            );
            
            
            //
            $get_post_home = get_posts( $merged_array );
            //var_dump($get_post_home);
            if ( $get_post_home ) {
              foreach ( $get_post_home as $post ) : 
                
              
                if($post->post_type == 'campanha') {
                  $text_label = "Campanha";
                  $link_cat = "/campanhas/";
                } else {
                  $cats = get_the_category($post->ID);
                  $text_label = $cats[0]->cat_name;
                  $link_cat = "/".$cats[0]->slug."/";
                  
                }
                
              ?>
                <div class="card-post">
                  <div class="img-post">
                    <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                      <?php echo get_the_post_thumbnail( $post->ID);?>
                    </a>
                  </div>
                  <div class="container-post">
                    <div class="content-post">
                      <div class="category">
                        <a href="<?php echo esc_url($link_cat); ?>" target="_SELF" class="icon-menu icon-logo">
                          <?php echo esc_html($text_label); ?>
                        </a>
                      </div>
                      <div class="title-block">
                        <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                          <?php echo esc_html($post->post_title); ?>
                        </a>
                      </div>
                      <div class="cta">
                        <a href="<?php echo esc_url($post->guid); ?>" target="_SELF" class="leia_mais">Leia mais <i class="arrow right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
              endforeach;
              wp_reset_postdata();
            }
            ?>
          </div>
        </div>
        <div class="arrows-novidades-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
  </div>
</section>