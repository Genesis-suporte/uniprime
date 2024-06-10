    </div><!-- #main -->
    <?php 
    $upload_dir = wp_upload_dir();
    $upload_url = $upload_dir['baseurl'];
    ?>
    <footer class="footer mw-100">
      <div class="footer-top">
        <div class="container">
          <div class="row d-flex flex-column flex-md-row">
            <div class="col-12 col-lg-4 logo-footer">
              <img src="<?php echo $upload_url;?>/2024/02/UniPrime-logo-footer.png" alt="logo UniPrime footer" />
            </div>
            <div class="col-12 col-lg-3 ouvidoria">
              <div class="label-footer bloco-central icon-phone icon-menu">
                Ouvidoria
              </div>
              <div class="telefone-footer">
                0800 400 9066
              </div>
              <div class="description">
                Dias úteis, das 8h às 12h e das 13h30 às 17h30
              </div>
            </div>
            <div class="col-12 col-lg-5">
              <div class="label-footer icon-central icon-menu">
                Central de Cartões de Crédito ・ Atendimento 24 horas
              </div>
              <div class="d-flex justify-content-between flex-column flex-xxl-row col-telefone">
                <div class="col">
                  <div class="telefone-footer">
                    0800 702 0756
                  </div>
                  <div class="description">
                    Ligações de telefone fixo
                  </div>
                </div>
                <div class="col">
                  <div class="telefone-footer">
                    4007 1256
                  </div>
                  <div class="description">
                    Ligações de telefone celular
                  </div>
                </div>
                <div class="col">
                  <div>
                    <div class="telefone-footer">
                      4007 1256
                    </div>
                    <div class="description">
                      Exclusivo <strong>Cartões Black</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-menu mw-100 d-flex">
        <div class="col-solucoes d-none d-lg-flex flex-column">
          <div class="solucoes fix-padding-left">
            <div class="label-footer-menu">
              Soluções
            </div>
            <div class="description-menu">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna ex, vulputate sed cursus ac, bibendum aliquet tortor. 
            </div>
          </div>
          <nav class="menu-footer-solucoes">
            <div class="menu-item">
              <a href="javascript:void(0)" class="menu-dropdown">
                <div class="container-solucoes fix-padding-left-menu icon-logo"><?php echo esc_html('Para você');?><i class="arrow right"></i></div>
              </a>
              <div class="dropdown-content dc-footer">
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
                        $menu_solucoes_voce .= '<a href="'. esc_attr($item['link']).'" class="icon-menu icon-'.$class.'-white">'. esc_html($item['title']) ."\n";
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
              <a href="javascript:void(0)" class="menu-dropdown">
                <div class="container-solucoes fix-padding-left-menu icon-logo"><?php echo esc_html('Para seu negócio');?><i class="arrow right"></i></div>
              </a>
              <div class="dropdown-content dc-footer">
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
                        $menu_solucoes_empresa .= '<a href="'. esc_attr($item['link']).'" class="icon-menu icon-'.$class.'-white">'. esc_html($item['title']) ."\n";
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
              <a href="javascript:void(0)" class="menu-dropdown">
                <div class="container-solucoes fix-padding-left-menu icon-logo"><?php echo esc_html('Para sua cooperativa');?><i class="arrow right"></i></div>
              </a>
              <div class="dropdown-content dc-footer cooperativa">
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
                        $menu_solucoes_cooperativa .= '<a href="'. esc_attr($item['link']).'" class="icon-menu icon-'.$class.'-white">'. esc_html($item['title']) ."\n";
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
        <div class="col-right fix-padding-right d-flex flex-column flex-lg-row">
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
                    $menu_atendimento .= '<a href="'. esc_attr($item['link']).'">'. esc_html($item['title']) .'</a>'."\n";              
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
                    $menu_a_uniprime .= '<a href="'. esc_attr($item['link']).'">'. esc_html($item['title']) .'</a>'."\n";              
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
                    $menu_governanca .= '<a href="'. esc_attr($item['link']).'">'. esc_html($item['title']) .'</a>'."\n";              
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
                    $menu_fique_por_dentro .= '<a href="'. esc_attr($item['link']).'">'. esc_html($item['title']) .'</a>'."\n";              
                    $menu_fique_por_dentro .= '</li>'."\n";
                  }
                  echo $menu_fique_por_dentro;
                ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="footer-copyrigth">
        <div class="container">
          <div class="copyrigth d-flex justify-content-between">
            <div>
              ©Copyright <?php echo date("Y"); ?> Uniprime Cooperativa de Crédito. Todos os Direitos Reservados.
            </div>
            <div>
              <a href="https://www.genesis.digital" target="_blank">GENESiS</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div id="modal-menu"></div>
    <!-- Modal -->
    <div id="singularesModal" class="defaultModal">
      <div class="modal-content">
        <a href="javascript:void(0)" class="close-modal" id="closeSingularesModal">
          <div class="bars">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
          </div>
        </a>
        <div class="content-singulares">
          <div class="label-block">
            <?php echo esc_html('COOPERATIVAS UNIPRIME'); ?>
          </div>
          <div class="title-block title-36 switzerlandBold pb-4">
            <?php echo esc_html('Qual cooperativa você gostaria de visitar?'); ?>
          </div>
          <div id="singularesList" class="d-flex flex-wrap"></div>
        </div>
        <div class="content-conveniadas">
          <div id="conveniadasList" class="d-flex flex-wrap"></div>
        </div>
      </div>
    </div>

    
    <div id="modalTenhoInteresse" class="defaultModal">
      <div class="modal-content">
        <a href="javascript:void(0)" class="close-modal" id="closemodalTenhoInteresse">
          <div class="bars">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
          </div>
        </a>
        <div class="content-interesse" id="content-interesse-1">
          <div class="label-block" id="label-block-interesse"></div>
          <div class="title-block title-28 switzerlandBold" id="title-block-interesse"></div>
          <div class="description-block" id="description-block-interesse"></div>
          <div class="buttons-contato d-flex flex-row justify-content-between">
            <div id="btn-telefone" style="display: none">
              <a class="button btn-primary btn icon-menu icon-phone-white" onclick="abreContentModalContato(2)" href="javascript:void(0)">Telefone</a>
            </div>
            <div id="btn-whatsapp" style="display: none">
              <a class="button btn-primary btn icon-menu icon-whatsapp-white" target="_blank" href="javascript:void(0)" id="number-whatsapp">Whatsapp</a>
            </div>
            <div id="btn-email" style="display: none">
              <a class="button btn-primary btn icon-menu icon-email-white" onclick="abreContentModalContato(4)" href="javascript:void(0)">E-mail</a>
            </div>
          </div>
        </div>
        <div class="content-interesse" id="content-interesse-2">
          <div class="label-block">ATENDIMENTO</div>
          <div class="title-block title-28 switzerlandBold pb-4">Fale conosco</div>
          <div class="description-block" id="content-telefone"></div>
        </div>
        
        <div class="content-interesse" id="content-interesse-4">
          <div class="label-block">ATENDIMENTO</div>
          <div class="title-block title-28 switzerlandBold pb-4">Fale conosco</div>
          <div class="description-block">Preencha o formulário abaixo para dar continuidade a sua solicitação:</div>
          <div id="content-form-interesse">
            <?php if (function_exists('do_shortcode')) {
                  // Exibe o formulário usando do_shortcode()
                  echo do_shortcode('[gravityform id="8" title="false" ajax="true" description="false"]');
              } ?>
          </div>
        </div>
      </div>
    </div>
    <div id="fixed-footer">
      <div id="fixed-footer-content">
        <div id="fixed-footer-text">
          Precisando de ajuda?<br />Fale com a gente a qualquer momento
        </div>
        <button id="fixed-footer-button">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/button-whatsapp.png" alt="Botão whatsapp" />
        </button>
      </div>
      <div id="fixed-footer-form" style="display:none;">
        <a href="#" class="close-modal" id="closeFooterForm">
          <div class="bars">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
          </div>
        </a>
          <?php if (function_exists('do_shortcode')) {
            echo do_shortcode('[gravityform id="9" title="false" ajax="true" description="false"]');
          } ?>
      </div>
    </div>
	<?php wp_footer(); ?>
</body>
</html>