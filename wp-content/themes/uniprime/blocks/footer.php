<?php
  $logo_footer = get_field('logo_footer', $block['id']);
  $label_bloco_central = get_field('label_bloco_central', $block['id']);
  $telefone = get_field('telefone', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $label_bloco_direita = get_field('label_bloco_direita', $block['id']);
  $telefone_1_direita = get_field('telefone_1_direita', $block['id']);
  $descricao_1_direita = get_field('descricao_1_direita', $block['id']);
  $telefone_2_direita = get_field('telefone_2_direita', $block['id']);
  $descricao_2_direita = get_field('descricao_2_direita', $block['id']);
  $telefone_3_direita = get_field('telefone_3_direita', $block['id']);
  $descricao_3_direita = get_field('descricao_3_direita', $block['id']);
  $texto_solucoes = get_field('texto_solucoes', $block['id']);
?>
<footer class="footer mw-100">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-4">
          <img src="<?php echo esc_url($logo_footer['url']); ?>" alt="<?php echo esc_attr($logo_footer['alt']); ?>" />
        </div>
        <div class="col-3">
          <div class="label-footer bloco-central icon-phone icon-menu">
            <?php echo esc_html($label_bloco_central); ?>
          </div>
          <div class="telefone-footer">
            <?php echo esc_html($telefone); ?>
          </div>
          <div class="description">
            <?php echo esc_html($descricao); ?>
          </div>
        </div>
        <div class="col-5">
          <div class="label-footer icon-central icon-menu">
            <?php echo esc_html($label_bloco_direita); ?>
          </div>
          <div class="d-flex justify-content-between">
            <div class="col">
              <div class="telefone-footer">
                <?php echo esc_html($telefone_1_direita); ?>
              </div>
              <div class="description">
                <?php echo esc_html($descricao_1_direita); ?>
              </div>
            </div>
            <div class="col">
              <div class="telefone-footer">
                <?php echo esc_html($telefone_2_direita); ?>
              </div>
              <div class="description">
                <?php echo esc_html($descricao_2_direita); ?>
              </div>
            </div>
            <div class="col">
              <div>
                <div class="telefone-footer">
                  <?php echo esc_html($telefone_3_direita); ?>
                </div>
                <div class="description">
                  <?php echo ($descricao_3_direita); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-menu mw-100 d-flex">
    <div class="col-solucoes">
      <div class="solucoes">
        <div class="label-footer-menu">
          <?php echo esc_html('Soluções'); ?>
        </div>
        <div class="description-menu">
          <?php echo esc_html($texto_solucoes); ?>
        </div>
      </div>
      <nav class="menu-footer-solucoes">
        <div class="menu-item">
          <a href="#" class="menu-dropdown">
            <div class="container-solucoes icon-menu icon-logo"><?php echo esc_html('Para você');?><i class="arrow right"></i></div>
          </a>
          <div class="dropdown-content">
            <div class="container">
              <div class="row">
                <?php 
                  $menu_lists_voce = setMenuThreeLevels('solucoes-para-voce');
                  $menu_solucoes_voce = "";
                  foreach ($menu_lists_voce as $item) { 
                    $class = '';
                    if(isset( $item[ 'class' ])) {
                      $class = esc_attr( implode( ' ', $item['class']));
                    }
                    $menu_solucoes_voce .= '<div class="col-4 menu-subitem '.$class.'">'."\n";
                    $menu_solucoes_voce .= '<a href="#" class="icon-menu icon-'.$class.'-white">'. esc_html($item['title']) ."\n";
                    $menu_solucoes_voce .= '<i class="arrow right"></i></a>'."\n";
                    $menu_solucoes_voce .= '</div>'."\n";
                  }
                  echo $menu_solucoes_voce;
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="menu-item">
          <a href="#" class="menu-dropdown">
            <div class="container-solucoes icon-menu icon-logo"><?php echo esc_html('Para seu negócio');?><i class="arrow right"></i></div>
          </a>
          <div class="dropdown-content">
            <div class="container">
              <div class="row">
                <?php 
                  $menu_lists_empresa = setMenuThreeLevels('solucoes-para-empresa');
                  $menu_solucoes_empresa = "";
                  foreach ($menu_lists_empresa as $item) { 
                    $class = '';
                    if(isset( $item[ 'class' ])) {
                      $class = esc_attr( implode( ' ', $item['class']));
                    }
                    $menu_solucoes_empresa .= '<div class="col-4 menu-subitem '.$class.'">'."\n";
                    $menu_solucoes_empresa .= '<a href="#" class="icon-menu icon-'.$class.'-white">'. esc_html($item['title']) ."\n";
                    $menu_solucoes_empresa .= '<i class="arrow right"></i></a>'."\n";
                    $menu_solucoes_empresa .= '</div>'."\n";
                  }
                  echo $menu_solucoes_empresa;
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="menu-item">
          <a href="#" class="menu-dropdown">
            <div class="container-solucoes icon-menu icon-logo"><?php echo esc_html('Para sua cooperativa');?><i class="arrow right"></i></div>
          </a>
          <div class="dropdown-content">
            <div class="container">
              <div class="row">
                <?php 
                  $menu_lists_cooperativa = setMenuThreeLevels('solucoes-para-cooperativa');
                  $menu_solucoes_cooperativa = "";
                  foreach ($menu_lists_cooperativa as $item) { 
                    $class = '';
                    if(isset( $item[ 'class' ])) {
                      $class = esc_attr( implode( ' ', $item['class']));
                    }
                    $menu_solucoes_cooperativa .= '<div class="col-4 menu-subitem '.$class.'">'."\n";
                    $menu_solucoes_cooperativa .= '<a href="#" class="icon-menu icon-'.$class.'-white">'. esc_html($item['title']) ."\n";
                    $menu_solucoes_cooperativa .= '<i class="arrow right"></i></a>'."\n";
                    $menu_solucoes_cooperativa .= '</div>'."\n";
                  }
                  echo $menu_solucoes_cooperativa;
                ?>
              </div>
            </div>
          </div>
        </div>
        
      </nav>
    </div>
    <div class="col-right d-flex">
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('Atendimento'); ?>
        </div>
        <nav class="menu-footer">
          <ul>
            <?php 
              $menu_lists = setMenuThreeLevels('menu-atendimento');
              $menu_atendimento = "";
              foreach ($menu_lists as $item) { 
                $class = '';
                if(isset( $item[ 'class' ])) {
                  $class = esc_attr( implode( ' ', $item['class']));
                }
                // if (in_array("search", $item['class'])) {
                //   $class_search = true;
                // }
                //print_r($item['class']).'<br />';
                //echo $class_search.'<br />';
                $menu_atendimento .= '<li class="menu-item '.$class.'">'."\n";
                $menu_atendimento .= '<a href="#">'. esc_html($item['title']) .'</a>'."\n";              
                $menu_atendimento .= '</li>'."\n";
              }
              echo $menu_atendimento;
            ?>
          </ul>
        </nav>
      </div>
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('A Uniprime'); ?>
        </div>
        <nav class="menu-footer">
          <ul>
            <?php 
              $menu_lists = setMenuThreeLevels('menu-a-uniprime-footer');
              $menu_a_uniprime = "";
              foreach ($menu_lists as $item) { 
                $class = '';
                if(isset( $item[ 'class' ])) {
                  $class = esc_attr( implode( ' ', $item['class']));
                }
                $menu_a_uniprime .= '<li class="menu-item '.$class.'">'."\n";
                $menu_a_uniprime .= '<a href="#">'. esc_html($item['title']) .'</a>'."\n";              
                $menu_a_uniprime .= '</li>'."\n";
              }
              echo $menu_a_uniprime;
            ?>
          </ul>
        </nav>
      </div>
      
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('Governança'); ?>
        </div>
        <nav class="menu-footer">
          <ul>
            <?php 
              $menu_lists = setMenuThreeLevels('menu-governanca');
              $menu_governanca = "";
              foreach ($menu_lists as $item) { 
                $class = '';
                if(isset( $item[ 'class' ])) {
                  $class = esc_attr( implode( ' ', $item['class']));
                }
                $menu_governanca .= '<li class="menu-item '.$class.'">'."\n";
                $menu_governanca .= '<a href="#">'. esc_html($item['title']) .'</a>'."\n";              
                $menu_governanca .= '</li>'."\n";
              }
              echo $menu_governanca;
            ?>
          </ul>
        </nav>
      </div>
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('Fique por dentro'); ?>
        </div>
        <nav class="menu-footer">
          <ul>
            <?php 
              $menu_lists = setMenuThreeLevels('menu-fique-por-dentro');
              $menu_fique_por_dentro = "";
              foreach ($menu_lists as $item) { 
                $class = '';
                if(isset( $item[ 'class' ])) {
                  $class = esc_attr( implode( ' ', $item['class']));
                }
                $menu_fique_por_dentro .= '<li class="menu-item '.$class.'">'."\n";
                $menu_fique_por_dentro .= '<a href="#">'. esc_html($item['title']) .'</a>'."\n";              
                $menu_fique_por_dentro .= '</li>'."\n";
              }
              echo $menu_fique_por_dentro;
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</footer>
<div id="site-modal">
    <!-- Adicione aqui o conteúdo do modal -->
</div>

<div id="modal-menu"></div>

<script>
// No arquivo footer.php, antes de </body>
jQuery(document).ready(function($) {
    // Abra o modal ao carregar a página
    $('#site-modal').show();

    // Adicione eventos para fechar o modal e selecionar o site
    $('#site-modal').on('click', function() {
        // Lógica para fechar o modal e redirecionar para o site escolhido
    });
});
</script>