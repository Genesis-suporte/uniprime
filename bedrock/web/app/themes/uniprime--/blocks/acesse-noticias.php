<?php 
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $link = get_field('link', $block['id']);
  ?>
<section class="bloco-acesse-noticias mw-100">
  <div class="container">
    <div class="row">
      <div class="col" >
        <div class="title-block title-36 switzerlandLight">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="content d-flex flex-column flex-xl-row justify-content-start justify-content-xl-between align-items-start align-items-xl-end">
          <div class="description-block align-self-start align-self-xl-end">
            <?php echo esc_html($descricao); ?>
          </div>
          <div class="d-flex flex-wrap flex-md-nowrap pt-4 pt-xl-0 ">
            <a href="<?php echo esc_url( $link['url'] ); ?>" class="button btn-primary-color btn" target="<?php echo esc_html( $link['target'] ); ?>">
              <?php echo esc_html( $link['title'] ); ?>
              <i class="icon-cta-blue right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="linha-bloco-acesse-noticias"></div>