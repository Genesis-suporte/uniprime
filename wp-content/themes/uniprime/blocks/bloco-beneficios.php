<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>

<section class="beneficios-institucional mw-100">
  <div class="">
    <div class="row d-flex flex-column flex-lg-row">
      <div class="col-12 d-flex">
        <div class="col-12 col-md-10">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="title-block">
            <?php echo esc_html($titulo); ?>
          </div>
          <div class="description-block">
            <?php echo esc_html($descricao); ?>
          </div>
        </div>
        <div class="col-md-2 d-none d-md-flex">
          <div class="arrows-beneficios-desktop d-none d-lg-flex"></div>
        </div>
      </div>
      <div class="col-12">
        <div class="d-flex justify-content-between slide-beneficios">
          <?php 
          if( have_rows('beneficios') ){
            while ( have_rows('beneficios') ) : the_row();
              // Case: Paragraph layout.
              if( get_row_layout() == 'cards' ) {
                $titulo_card = get_sub_field('titulo_card');
                $descricao_card = get_sub_field('descricao_card');
                $imagem_card = get_sub_field('imagem_card');
                //->filename url alt
                //print_r( $destaque);?>
                <div class="card-beneficios">
                  <div class="content-card">
                    <div class="title-block">
                      <?php echo esc_html($titulo_card); ?>
                    </div>
                    <div class="description-block">
                      <?php echo esc_html($descricao_card); ?>
                    </div>
                    <div class="image">
                      <img src="<?php echo esc_url($imagem_card['url']); ?>" alt="<?php echo esc_html($imagem_card['alt']); ?>" >
                    </div>
                  </div>
                </div>
                <?php
              }
              
            // End loop.
            endwhile;
          // No value.
          } else {
            // Do something...
          }
          ?>
        </div>
      </div>
      <div class="arrows-beneficios-mobile d-flex d-lg-none justify-content-center">
    </div>
  </div>
</section>
<?php 
  if( have_rows('bloco-mvv') ) {
    while ( have_rows('bloco-mvv') ) : the_row();
      if( get_row_layout() == 'cards' ) {
        $classe = get_sub_field('classe');
        $titulo = get_sub_field('titulo');
        $descricao = get_sub_field('descricao');?>
        <div class="card-mvv">
          <div class="content-card">
            <div class="icon-menu icon-<?php echo esc_html($classe); ?>"></div>
            <div class="title">
              <?php echo esc_html($titulo); ?>
            </div>
            <div class="description">
              <?php echo esc_html($descricao); ?>
            </div>
          </div>
        </div>
        <?php
      }
      
    endwhile;
  } else {
    // Do something...
  }
  ?>