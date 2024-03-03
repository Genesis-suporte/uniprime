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
?>
<div class="footer mw-100">
  <div class="container">
    <div class="row">
      <div class="col-4">
        <img src="<?php echo esc_url($logo_footer['url']); ?>" alt="<?php echo esc_attr($logo_footer['alt']); ?>" />
      </div>
      <div class="col-2">
        <div class="label-footer bloco-central">
          <?php echo esc_html($label_bloco_central); ?>
        </div>
        <div class="telefone-footer">
          <?php echo esc_html($telefone); ?>
        </div>
        <div class="description">
          <?php echo esc_html($descricao); ?>
        </div>
      </div>
      <div class="col-6">
        <div>
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
            <div class="telefone-footer">
              <?php echo esc_html($telefone_3_direita); ?>
            </div>
            <div class="description">
              <?php echo esc_html($descricao_3_direita); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer-menu mw-100">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="solucoes">
          <div class="label-footer-menu">
            <?php echo esc_html('Soluções'); ?>
          </div>
          <div class="description-menu">
            <?php echo esc_html($descricao); ?>
          </div>
        </div>
        <nav class="menu-footer-solucoes">
          <?php 
            $menu_lists = setMenuThreeLevels('Menu Inicial');
            $menu_two_levels = "";
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
              $menu_two_levels .= '<div class="menu-item '.$class.'">'."\n";
              $menu_two_levels .= '<a href="#" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";
              
              //print_r(@$item['childs']).'<br />';
              if(isset( $item[ 'childs' ])) {
                
                //echo $item['id'].' - '.count($item['childs']).'<br />';
                $menu_two_levels .= '<div class="dropdown-content">' ."\n";
                
                foreach ($item[ 'childs' ] as $submenu) { 
                  $class_child = '';
                  if(isset( $submenu[ 'class' ])) {
                    $class_child = esc_attr( implode( ' ', $submenu['class']));
                    //print_r($class_child);
                  }
                  //print_r($submenu).'<br />';
                  
                  $menu_two_levels .= '<a href="'.esc_url($submenu['link']).'" class="'.$class_child.'">'.esc_html($submenu['title']).'</a>' ."\n";
                  
                }
                $menu_two_levels .= '</div>' ."\n";
              }
              $menu_two_levels .= '</div>'."\n";
            }
            echo $menu_two_levels;
          ?>
        </nav>
      </div>
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('Atendimento'); ?>
        </div>
        <nav class="menu-footer">
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
              $menu_atendimento .= '<div class="menu-item '.$class.'">'."\n";
              $menu_atendimento .= '<a href="#" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";              
              $menu_atendimento .= '</div>'."\n";
            }
            echo $menu_atendimento;
          ?>
        </nav>
      </div>
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('A Uniprime'); ?>
        </div>
        <nav class="menu-footer">
          <?php 
            $menu_lists = setMenuThreeLevels('menu-a-uniprime');
            $menu_a_uniprime = "";
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
              $menu_a_uniprime .= '<div class="menu-item '.$class.'">'."\n";
              $menu_a_uniprime .= '<a href="#" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";              
              $menu_a_uniprime .= '</div>'."\n";
            }
            echo $menu_a_uniprime;
          ?>
        </nav>
      </div>
      
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('Governança'); ?>
        </div>
        <nav class="menu-footer">
          <?php 
            $menu_lists = setMenuThreeLevels('menu-governanca');
            $menu_governanca = "";
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
              $menu_governanca .= '<div class="menu-item '.$class.'">'."\n";
              $menu_governanca .= '<a href="#" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";              
              $menu_governanca .= '</div>'."\n";
            }
            echo $menu_governanca;
          ?>
        </nav>
      </div>
      <div class="col">
        <div class="label-footer-menu">
          <?php echo esc_html('Fique por dentro'); ?>
        </div>
        <nav class="menu-footer">
          <?php 
            $menu_lists = setMenuThreeLevels('menu-fique-por-dentro');
            $menu_fique_por_dentro = "";
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
              $menu_fique_por_dentro .= '<div class="menu-item '.$class.'">'."\n";
              $menu_fique_por_dentro .= '<a href="#" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";              
              $menu_fique_por_dentro .= '</div>'."\n";
            }
            echo $menu_fique_por_dentro;
          ?>
        </nav>
      </div>
    </div>
  </div>
</div>

<div id="site-modal">
    <!-- Adicione aqui o conteúdo do modal -->
</div>

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