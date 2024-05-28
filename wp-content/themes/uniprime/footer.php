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
          <div class="solucoes">
            <div class="label-footer-menu">
              Soluções
            </div>
            <div class="description-menu">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna ex, vulputate sed cursus ac, bibendum aliquet tortor. 
            </div>
          </div>
          <nav class="menu-footer-solucoes">
            <div class="menu-item">
              <a href="#" class="menu-dropdown">
                <div class="container-solucoes icon-menu icon-logo"><?php echo esc_html('Para você');?><i class="arrow right"></i></div>
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
              <a href="#" class="menu-dropdown">
                <div class="container-solucoes icon-menu icon-logo"><?php echo esc_html('Para seu negócio');?><i class="arrow right"></i></div>
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
              <a href="#" class="menu-dropdown">
                <div class="container-solucoes icon-menu icon-logo"><?php echo esc_html('Para sua cooperativa');?><i class="arrow right"></i></div>
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
        <div class="col-right d-flex flex-column flex-lg-row">
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
      <div class="footer-copyrigth">
        <div class="container">
            ©Copyright <?php echo date("Y"); ?> Uniprime Cooperativa de Crédito. Todos os Direitos Reservados.
        </div>
      </div>
    </footer>

    <div id="modal-menu"></div>
    <!-- Modal -->
    <!-- Modal -->
<div id="singularesModal" class="singularesModal">
  <div class="modal-content">
    <a href="#" class="close" id="closeSingularesModal">
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

<script type="text/javascript">
  (function ($) {
    $(document ).ready(function() {
      // Abra o modal ao carregar a página
      // MODAL SINGULARES
      var singularesModal = document.getElementById("singularesModal");
      var btnOpenModalSingulares = document.getElementById("openModalSingulares");
      var span = document.getElementById("closeSingularesModal");
      const singularesList = $('#singularesList');
      const conveniadasList = $('#conveniadasList');
      
      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }

      function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }

      function checkCookie() {
        var user = getCookie("selectedSingular");
        if (user != "") {
          //console.log("Singular já escolhida: " + user);
        } else {
          //console.log("Nenhuma singular escolhida.");
          openModalSingulares();
        }
      }
      checkCookie();
      function openModalSingulares() {
        fetch('<?php echo get_template_directory_uri();?>/api/agencias.json')
          .then(response => response.json())
          .then(data => {
            singularesList.empty();
            //singularesList.innerHTML = ''; // Limpar a lista antes de adicionar itens
            data.singulares.forEach(singular => {
              let actived = '';
              let textActived = '';
              let target = '';
              if(singular.url === '/') {
                actived = 'actived';
                let textActived = 'Continuar na<br/>';

              }
              if(singular.type === 'principal' || singular.type === 'singular' || singular.type === 'prestadora') {
                target = '_SELF'
              } else {
                target = '_blank';
              }
              const agencyHtml = `
              <div class="card-singulares ${actived}">
                <a href="${singular.url}" target="${target}" role="button" class="${classSing}" data-singular="${singular.id}" tabindex="0">${textActived} ${singular.singular}<i class="arrow right"></i>
                </a>
              </div>`;
              if(singular.type === 'principal' || singular.type === 'singular' || singular.type === 'prestadora') {
                singularesList.append(agencyHtml);
              } else {
                conveniadasList.append(agencyHtml);
              }
              /*let item = document.createElement('div');
              item.className = 'agency-item';
              item.innerHTML = `<a href="${singular.url}">${singular.name}</a>`;
              singularesList.appendChild(item);*/
            });

            /*data.conveniadas.forEach(conveniada => {
              let item = document.createElement('div');
              item.className = 'agency-item';
              item.innerHTML = `<a href="${conveniada.url}" target="_blank">${conveniada.name}</a>`;
              singularesList.appendChild(item);
            });*/
          });

        singularesModal.style.display = "block";
      }
      btnOpenModalSingulares.onclick = function() {
        openModalSingulares();
      }

      span.onclick = function() {
        singularesModal.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == singularesModal) {
          singularesModal.style.display = "none";
        }
      }
    });
  })(jQuery);
</script>
	<?php wp_footer(); ?>
</body>
</html>