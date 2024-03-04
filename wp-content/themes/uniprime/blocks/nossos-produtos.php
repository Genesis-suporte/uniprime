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
    <div class="d-flex justify-content-between">
      <div class="description-block">
        <?php echo esc_html($descricao); ?>
      </div>
      <div class="arrows">
        <div class="d-flex justify-content-start">
          <div class="left"><</div>
          <div class="right">></div>
        </div>
      </div>
    </div>
    <div class="block-content">
    <?php
  /*$args = array( 'post_type' => 'Vacancies');
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    get_template_part( 'template-parts/vacancies', get_post_format() );
  endwhile;
  wp_reset_query()*/
?>
    </div>
  </div>
</section>