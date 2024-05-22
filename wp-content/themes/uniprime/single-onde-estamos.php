<?php
/**
 * Template Name: Página onde estamos
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');

$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

$titulo_consultar_protocolo = get_field('titulo_consultar_protocolo');
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDksl0bKghCnaXqIwDOxoJOhpQW_lEEuGY"></script>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);">
      <!--<img src="<?php echo esc_url($image_banner['url']); ?>" alt="<?php echo esc_html($image_banner['alt']); ?>" >-->
    </div>
    <div class="container">
      <div class="position-absolute copy">
        <?php if($title_banner) { ?>
          <h1 class="title title-48 switzerlandLight">
            <?php echo esc_html($title_banner); ?>
          </h1>
        <?php } ?>
        <?php if($description_banner) { ?>
          <h1 class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </h1>
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
<section class="ouvidoria mw-100">
  <div class="container">
    <div class="content">
    <div class="d-flex flex-column flex-lg-row">
        <div class="container-fale-conosco col-12 col-lg-6 d-flex flex-column">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="title-block title-28 switzerlandBold">
            <?php echo esc_html($titulo); ?>
          </div>
          <div class="description-block">
            <?php echo esc_html($descricao); ?>
          </div>
          <div class="div-input-address">
            <input type="text" name="input-address" id="input-address" value="" aria-invalid="false" placeholder="Informe o cep ou nome da cidade">
            <button class="btn-consultar"><i class="icon-menu icon-search-white"></i>Consultar</button>
          </div>
        </div>
        <div class="side-onde-estamos col-12 col-lg-6">
          <div id="map" style="width: 100%; height: 500px;"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  (function ($) {
    $(document ).ready(function() {
      // Função para inicializar o mapa
      function initMap() {
        // Posição inicial do mapa (exemplo: coordenadas do Brasil)
        var initialPosition = {lat: -14.235004, lng: -51.92528};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: initialPosition
        });

        // Requisição AJAX para obter os dados do JSON
        $.ajax({
            url: '<?php echo get_template_directory_uri(); ?>/api/agencias.json',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var singulares = response.singulares;

                // Percorre cada singular para adicionar marcadores no mapa
                singulares.forEach(function(item) {
                    var agency = item.agencies;
                    var position = {
                        lat: parseFloat(agency.agency_address_lat),
                        lng: parseFloat(agency.agency_address_lon)
                    };

                    var marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: agency.agency_title
                    });

                    var infoWindow = new google.maps.InfoWindow({
                        content: '<h3>' + agency.agency_title + '</h3>' +
                                 '<p>' + agency.agency_address_street + ', ' +
                                 agency.agency_address_number + '<br>' +
                                 agency.agency_address_neighborhood + ', ' +
                                 agency.agency_address_city + ' - ' +
                                 agency.agency_address_state + '</p>' +
                                 '<p>Telefone: ' + agency.agency_phone + '</p>'
                    });

                    marker.addListener('click', function() {
                        infoWindow.open(map, marker);
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
      }

      // Verifica se o Google Maps API está carregado e inicializa o mapa
      if (typeof google !== 'undefined' && google.maps) {
        initMap();
      } else {
        // Carrega o script do Google Maps e inicializa o mapa
        var script = document.createElement('script');
        //https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyBgPGzPo39FpUbpJ2nrQYbpRj2WkJ9YB9M&callback=window.easyLocatorMethods.loadMap
        script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBgPGzPo39FpUbpJ2nrQYbpRj2WkJ9YB9M&callback=window.easyLocatorMethods.loadMap";
        script.async = true;
        document.head.appendChild(script);
      }
    });
  })(jQuery);
</script>

<?php get_footer(); ?>