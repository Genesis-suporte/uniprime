
<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="bloco-saiba-mais z-12">
  <div class="container">
    <div class="label-block">
      <?php echo esc_html($label); ?>
    </div>
    <div class="title-block title-48 switzerlandLight">
      <h2><?php echo esc_html($titulo); ?></h2>
    </div>
    <div class="description-block">
      <?php echo esc_html($descricao); ?>
    </div>
    <div class="accordion" id="accordionDuvidas">      
      <?php 
        if( have_rows('duvidas') ) {
          $count = 0;
          while ( have_rows('duvidas') ) : the_row();
            $count++;
            $formatted_count = sprintf('%02d', $count); // Adiciona um zero à frente se for menor que 10
            
            if( get_row_layout() == 'cards' ) {
              $titulo = get_sub_field('titulo');
              $descricao = get_sub_field('descricao');?>
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button title-duvida" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count;?>" aria-expanded="false" aria-controls="collapse<?php echo $count;?>">
                    <?php echo esc_html($titulo); ?>
                  </button>
                </h3>
                <div id="collapse<?php echo $count;?>" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                  <div class="accordion-body">
                      <?php echo __($descricao); ?>
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
    </div>
  </div>
</section>