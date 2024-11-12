<?php
/**
 * Template Name: Página onde estamos
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');
$image_banner_mobile = get_field('image_banner_mobile');

$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');
//AIzaSyDksl0bKghCnaXqIwDOxoJOhpQW_lEEuGY
//Uniprime => AIzaSyBgPGzPo39FpUbpJ2nrQYbpRj2WkJ9YB9M
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDksl0bKghCnaXqIwDOxoJOhpQW_lEEuGY&token=103284"></script>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image <?php echo $image_banner_mobile ? 'd-none d-sm-block' : ''; ?>" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);"></div>
    <?php if($image_banner_mobile) { ?>
      <div class="image d-block d-sm-none" style="background-image: url(<?php echo esc_url($image_banner_mobile['url']); ?>);"></div>
    <?php } ?>
    <div class="container">
      <div class="position-absolute copy">
        <?php if($title_banner) { ?>
          <h1 class="title title-48 switzerlandLight">
            <?php echo esc_html($title_banner); ?>
          </h1>
        <?php } ?>
        <?php if($description_banner) { ?>
          <h2 class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </h2>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
?>
<section class="onde-estamos mw-100">
  <div class="container">
    <div class="content">
      <div class="">
        <div class="d-flex justify-content-start justify-content-lg-center">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
        </div>
        <div class="title-block title-28 switzerlandBold text-left text-lg-center">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description-block text-left text-lg-center">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="div-input-address div-search">
          <input type="text" name="input-address" id="input-address" value="" aria-invalid="false" placeholder="Informe o cep ou nome da cidade">
          <button class="btn-consultar" id="btn-consultar"><i class="icon-menu icon-search-white"></i>Consultar</button>
        </div>
        <div class="d-flex flex-column-reverse flex-lg-row gap-4">
          <div class="sidebar-map" id="sidebar-map">
          </div>
          <div class="map-onde-estamos">
            <div id="map" style="width: 100%; height: 861px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content" style="padding-top: 126px">
    <?php the_content(); ?>
  </div>
</section>
<script type="text/javascript">
  (function ($) {
    let map, infoWindow;
    let allMarkers = [];

    $(document).ready(function() {
      fetch('<?php echo get_template_directory_uri();?>/api/agencias.json')
        .then(response => response.json())
        .then(data => {
          initMap();
          displayAgencies(data.singulares);
        })
        .catch(error => console.error('Erro ao carregar o arquivo JSON:', error));

      $('#btn-consultar').on('click', function() {
        const address = $('#input-address').val();
        if (address) {
          geocodeAddress(address);
        }
      });
      
      // Adicionar evento de tecla ao campo de entrada
      $('#input-address').on('keydown', function(event) {
        if (event.keyCode === 13) {
          event.preventDefault(); // Prevenir comportamento padrão de submit de formulário
          const address = $(this).val();
          if (address) {
            geocodeAddress(address);
          }
        }
      });
    });

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: { lat: -24.726437, lng: -53.74293 } // Coordenadas centrais do Brasil
      });

      infoWindow = new google.maps.InfoWindow();
    }

    function displayAgencies(singulares) {
      const listaAgencias = $('#sidebar-map');
      listaAgencias.empty();
      const customIcon = {
        url: '<?php echo get_template_directory_uri();?>/assets/images/icons/pin-uniprime.png', // URL do seu pin personalizado
        scaledSize: new google.maps.Size(38, 48), // Tamanho do pin personalizado
      };
      singulares.forEach(singular => {
        singular.agencies.forEach(agencia => {
          
          whatsapp1 = '';
          whatsapp2 = '';
          if(agencia.agency_whatsapp) {
            whatsapp1 = `<div class="phone d-flex flex-column">
                          <div>WhatsApp: </div>
                          <div class="title-block title-16 switzerlandBold">${agencia.agency_whatsapp}</div>
                        </div>`;
            whatsapp2 = `<div class="col-12 col-lg-6">
                           <a href="whatsapp://send?phone=55${agencia.agency_whatsapp}" class="btn-primary btn icon-menu icon-message-white">Conversar</a>
                         </div>`;
          }
          agency_email1 = '';
          agency_email2 = '';
          if(agencia.agency_email) {
            agency_email1 = `<div class="contact-email d-flex flex-column">
                  <div>E-mail: </div>
                  <div class="title-block title-16 switzerlandBold">${agencia.agency_email}</div>      
                </div>`;
            agency_email2 = `<div class="col-12 col-lg-6">
                          <a href="mailto:${agencia.agency_email}" class="btn-primary btn icon-menu icon-chat-white">Enviar mensagem</a>
                        </div>`;
          }
          
          const agencyHtml = `
            <div class="content-agency" data-lat="${agencia.agency_address_lat}" data-lng="${agencia.agency_address_lon}" data-city="${agencia.agency_address_city.toLowerCase()}" data-title="${agencia.agency_title}" data-content="${agencia.agency_content}">
              <div class="label-block">AGÊNCIA ${agencia.agency_number}</div>
              <div class="title-block title-agency title-28 switzerlandBold">${agencia.agency_title}</div>
              <div class="address">
                <p>${agencia.agency_address_city} - ${agencia.agency_address_state}. ${agencia.agency_address_cep}</p>
                <p>${agencia.agency_address_street}, ${agencia.agency_address_number} - ${agencia.agency_address_neighborhood}</p>
                  ${agencia.agency_content}
                <div class="block-contacts">
                  <div class="contact d-flex flex-column flex-lg-row justify-content-between">
                    <div class="phone d-flex flex-column">
                      <div>Telefone: </div>
                      <div class="title-block title-16 switzerlandBold">${agencia.agency_phone}</div>
                    </div>
                    ${whatsapp1}
                  </div>
                  ${agency_email1}
                </div>
                <div class="d-flex gap-4 pb-3 flex-column flex-lg-row">
                  <div class="col-12 col-lg-6">
                    <a href="tel:${agencia.agency_phone}" class="btn-primary btn icon-menu icon-phone-white">Ligar</a>
                  </div>
                  ${whatsapp2}
                </div>
                <div class="d-flex gap-4 flex-column flex-lg-row">
                  ${agency_email2}
                </div>
              </div>
            </div>`;
              listaAgencias.append(agencyHtml);

              const marker = new google.maps.Marker({
                position: { lat: parseFloat(agencia.agency_address_lat), lng: parseFloat(agencia.agency_address_lon) },
                map: map,
                title: agencia.agency_title,
                icon: customIcon
              });

              marker.addListener('click', () => {
                infoWindow.setContent(`<div class="d-flex flex-column"><div class="title-block title-agency title-28 switzerlandBold">${agencia.agency_title}</div><p>${agencia.agency_content}</p></div>`);
                infoWindow.open(map, marker);
              });

              allMarkers.push(marker);
          });
      });

      $('.content-agency').on('click', function() {
        const lat = parseFloat($(this).data('lat'));
        const lng = parseFloat($(this).data('lng'));
        const position = { lat: lat, lng: lng };
        map.setCenter(position);
        map.setZoom(15);
        allMarkers.forEach(marker => {
          if (marker.position.lat() === lat && marker.position.lng() === lng) {
            infoWindow.setContent(`<h3>${marker.getTitle()}</h3>`);
            infoWindow.open(map, marker);
          }
        });
      });
    }

    function geocodeAddress(address) {
      const geocoder = new google.maps.Geocoder();
      geocoder.geocode({ 'address': address }, function(results, status) {
        if (status === 'OK') {
          const location = results[0].geometry.location;
          map.setCenter(location);
          map.setZoom(12);
          reorderAgencies(address.toLowerCase());
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }

    function reorderAgencies(city) {
      const listaAgencias = $('#sidebar-map');
      const agencies = listaAgencias.find('.content-agency').get();

      agencies.sort((a, b) => {
        const cityA = $(a).data('city');
        const cityB = $(b).data('city');

        if (cityA === city && cityB !== city) {
          return -1;
        } else if (cityA !== city && cityB === city) {
          return 1;
        } else {
          return 0;
        }
      });

      listaAgencias.empty();
      agencies.forEach(agency => {
        listaAgencias.append(agency);
      });
    }

    function getQueryParameter(param) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(param);
    }

    // Preencher o input com o valor da cidade e chamar a função geocodeAddress
    document.addEventListener('DOMContentLoaded', function() {
      const city = getQueryParameter('city');
      if (city) {
        document.getElementById('input-address').value = city;
        geocodeAddress(city);
      }
    });
  })(jQuery);
</script>


<?php get_footer(); ?>