<?php
/**
 * Plugin Name: Site Cloner
 * Description: Plugin para clonar sites no WordPress Multisite.
 * Version: 1.0
 * Author: GENESiS - Agência Digital Porto Alegre
 * Author URI: https://marketingdigitalportoalegre.genesis.digital
 * Text Domain: site-cloner
 */

// FUNCTION PRA CLONAR SINGULARES
function clone_files( $source_blog_id, $target_blog_id ) {
	$upload_dir = wp_upload_dir();

	$source_dir = $upload_dir['basedir'] . "/sites/$source_blog_id";
	$target_dir = $upload_dir['basedir'] . "/sites/$target_blog_id";

	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0755, true);
	}

	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($source_dir, RecursiveDirectoryIterator::SKIP_DOTS),
		RecursiveIteratorIterator::SELF_FIRST
	);

	foreach ($files as $fileinfo) {
		$target_path = $target_dir . DIRECTORY_SEPARATOR . $files->getSubPathName();
		if ($fileinfo->isDir()) {
			mkdir($target_path, 0755, true);
		} else {
			copy($fileinfo->getRealPath(), $target_path);
		}
	}
}

function clone_wp_options($source_blog_id, $target_blog_id) {
	global $wpdb;

	$source_table = $wpdb->get_blog_prefix($source_blog_id) . 'options';
	$target_table = $wpdb->get_blog_prefix($target_blog_id) . 'options';

	// Limpar a tabela wp_options do site clonado
	$wpdb->query("DELETE FROM {$target_table}");

	// Clonar todos os registros da tabela wp_options do site original
	$wpdb->query("INSERT INTO {$target_table} SELECT * FROM {$source_table}");
	
	// Garantir que o campo rewrite_rules seja clonado corretamente
	$rewrite_rules_option = $wpdb->get_var("SELECT option_value FROM $source_table WHERE option_name = 'rewrite_rules'");
	if ($rewrite_rules_option) {
		$wpdb->query(
			$wpdb->prepare(
				"INSERT INTO $target_table (option_name, option_value, autoload) VALUES (%s, %s, 'yes')
				ON DUPLICATE KEY UPDATE option_value = VALUES(option_value)",
				'rewrite_rules',
				$rewrite_rules_option
			)
		);
	}
	// Ajustar as regras de reescrita após a clonagem
	switch_to_blog($target_blog_id);
	global $wp_rewrite;
	$rules = $wp_rewrite->rewrite_rules();

	foreach ($rules as $key => $value) {
		if (strpos($key, 'singular/') !== false) {
			$new_key = str_replace('singular/', '', $key);
			unset($rules[$key]);
			$rules[$new_key] = $value;
		}
	}

	update_option('rewrite_rules', $rules);
	$wp_rewrite->flush_rules();
	restore_current_blog();
}


function clone_posts_and_postmeta($source_blog_id, $target_blog_id) {
	global $wpdb;

	$source_prefix = $wpdb->get_blog_prefix($source_blog_id);
	$target_prefix = $wpdb->get_blog_prefix($target_blog_id);

	// Limpar as tabelas wp_posts e wp_postmeta do site clonado
	$wpdb->query("DELETE FROM {$target_prefix}posts");
	$wpdb->query("DELETE FROM {$target_prefix}postmeta");

	// Clonar a tabela wp_posts
	$wpdb->query("INSERT INTO {$target_prefix}posts SELECT * FROM {$source_prefix}posts");

	// Clonar a tabela wp_postmeta
	$wpdb->query("INSERT INTO {$target_prefix}postmeta SELECT * FROM {$source_prefix}postmeta");
}

function clone_terms_and_taxonomies($source_blog_id, $target_blog_id) {
	global $wpdb;

	$source_prefix = $wpdb->get_blog_prefix($source_blog_id);
	$target_prefix = $wpdb->get_blog_prefix($target_blog_id);

	// Limpar as tabelas wp_terms, wp_term_taxonomy e wp_term_relationships do site clonado
	$wpdb->query("DELETE FROM {$target_prefix}terms");
	$wpdb->query("DELETE FROM {$target_prefix}term_taxonomy");
	$wpdb->query("DELETE FROM {$target_prefix}term_relationships");

	// Clonar wp_terms
	$wpdb->query("INSERT INTO {$target_prefix}terms SELECT * FROM {$source_prefix}terms");

	// Clonar wp_term_taxonomy
	$wpdb->query("INSERT INTO {$target_prefix}term_taxonomy SELECT * FROM {$source_prefix}term_taxonomy");

	// Clonar wp_term_relationships
	$wpdb->query("INSERT INTO {$target_prefix}term_relationships SELECT * FROM {$source_prefix}term_relationships");
}
function clone_other_tables($source_blog_id, $target_blog_id) {
	global $wpdb;

	$source_prefix = $wpdb->get_blog_prefix($source_blog_id);
	$target_prefix = $wpdb->get_blog_prefix($target_blog_id);

	// Obter todas as tabelas que começam com o prefixo do site original
	$tables = $wpdb->get_results("SHOW TABLES LIKE '{$source_prefix}%'", ARRAY_N);

	foreach ($tables as $table) {
		$table_name = $table[0];
		$target_table = str_replace($source_prefix, $target_prefix, $table_name);

		// Ignorar a tabela wp_options pois já foi clonada separadamente
		if ($table_name === "{$source_prefix}options") {
			continue;
		}

		// Limpar a tabela de destino
		$wpdb->query("DROP TABLE IF EXISTS {$target_table}");

		// Clonar a estrutura da tabela
		$wpdb->query("CREATE TABLE {$target_table} LIKE {$table_name}");

		// Clonar os dados da tabela
		$wpdb->query("INSERT INTO {$target_table} SELECT * FROM {$table_name}");
	}
}
function update_urls_and_permalinks($source_blog_id, $target_blog_id, $new_domain, $new_path) {
	global $wpdb;

	$source_blog_details = get_blog_details($source_blog_id);
	$target_blog_details = get_blog_details($target_blog_id);

	$source_url = trailingslashit($source_blog_details->siteurl);
	$target_url = trailingslashit('http://' . $new_domain . $new_path);

	switch_to_blog($target_blog_id);

	// Atualizar URLs nos posts
	$wpdb->query(
		$wpdb->prepare(
			"UPDATE {$wpdb->posts} SET guid = REPLACE(guid, %s, %s) WHERE post_type IN ('post', 'page', 'attachment')",
			$source_url,
			$target_url
		)
	);

	// Atualizar URLs nos metadados dos posts
	$wpdb->query(
		$wpdb->prepare(
			"UPDATE {$wpdb->postmeta} SET meta_value = REPLACE(meta_value, %s, %s) WHERE meta_key = '_wp_attached_file' OR meta_key = '_wp_attachment_metadata'",
			$source_url,
			$target_url
		)
	);

	// Atualizar opções 'home' e 'siteurl'
	update_option('home', $target_url);
	update_option('siteurl', $target_url);

	// Atualizar as regras de reescrita
	flush_rewrite_rules();

	restore_current_blog();
}


function clone_site($site_id_to_clone, $new_site_name, $new_site_slug) {
	global $wpdb;

	$site_to_clone = get_blog_details($site_id_to_clone);
	if (!$site_to_clone) {
		return false;
	}

	// Configurar o novo caminho do site
	$new_domain = $site_to_clone->domain;
	$new_path = '/' . trailingslashit('singular/' . $new_site_slug);
	//$new_path = '/' . trailingslashit($new_site_slug);

	// Criar novo site
	$new_blog_id = wpmu_create_blog($new_domain, $new_path, $new_site_name, get_current_user_id(), array(), $site_to_clone->site_id);
	if (is_wp_error($new_blog_id)) {
		return false;
	}

	// Clonar tabelas importantes
	clone_wp_options($site_id_to_clone, $new_blog_id);
	clone_posts_and_postmeta($site_id_to_clone, $new_blog_id);
	clone_terms_and_taxonomies($site_id_to_clone, $new_blog_id);

	// Clonar outras tabelas
	clone_other_tables($site_id_to_clone, $new_blog_id);
	// Clonar arquivos
	clone_files($site_id_to_clone, $new_blog_id);

	// Atualizar URLs e permalinks
	update_urls_and_permalinks($site_id_to_clone, $new_blog_id, $new_domain, $new_path);

	return $new_blog_id;
}

function add_clone_site_column($links, $blog_id) {
	
	$clone_link = 'admin.php?' . http_build_query(
		array(
			'action' => 'clone_site',
			'site_id' => $blog_id
		)
	);
	//var_dump($blog_id);
	if($blog_id != 1) {
		$link_enable_principal = '<a href="#" class="clone-site-button" data-site-id="' . $blog_id . '">Clonar site</a>';
	} else {
		$link_enable_principal = '<a href="#" class="" data-site-id="' . $blog_id . '"></a>';
	}
	$links['clone'] = '
		<div class="clone-site-container">
			<span class="clone">
				'. $link_enable_principal .'
			</span>
			<div class="clone-site-fields" style="display:none;">
				<form id="cloneSiteForm-' . $blog_id . '" action="' . network_admin_url($clone_link) . '" method="get">
					<input type="hidden" name="action" value="clone_site">
					<input type="hidden" name="site_id" value="' . $blog_id . '">
					<label for="new_site_name_' . $blog_id . '">Nome do novo site:</label>
					<input type="text" id="new_site_name_' . $blog_id . '" name="new_site_name" required>
					<label for="new_site_slug_' . $blog_id . '">Slug do novo site:</label>
					<input type="text" id="new_site_slug_' . $blog_id . '" name="new_site_slug" required>
					<button type="submit">Clonar site</button>
				</form>
			</div>
		</div>';
		
	return $links;
}
add_action('manage_sites_action_links', 'add_clone_site_column', 10, 2);

add_action('admin_footer', 'add_clone_site_script');

function add_clone_site_script() {
	?>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function () {
			const cloneButtons = document.querySelectorAll('.clone-site-button');
			cloneButtons.forEach(button => {
				button.addEventListener('click', function (event) {
					event.preventDefault();
					const siteId = this.getAttribute('data-site-id');
					console.log(siteId);
					
					const cloneFields = document.querySelector('#cloneSiteForm-' + siteId).parentElement;
					if (cloneFields.style.display === 'none') {
						cloneFields.style.display = 'block';
					} else {
						cloneFields.style.display = 'none';
					}
					
				});
			});
		});
	</script>
	<?php
}

add_action('admin_init', 'handle_clone_site_action');

function handle_clone_site_action() {
	if (isset($_GET['action']) && $_GET['action'] == 'clone_site' && isset($_GET['site_id']) && isset($_GET['new_site_name']) && isset($_GET['new_site_slug'])) {
		if (!current_user_can('manage_network')) {
			wp_die('Você não tem permissão para clonar sites.');
		}

		$site_id_to_clone = intval($_GET['site_id']);
		$new_site_name = sanitize_text_field($_GET['new_site_name']);
		$new_site_slug = sanitize_title($_GET['new_site_slug']);

		$new_site_id = clone_site($site_id_to_clone, $new_site_name, $new_site_slug);

		if ($new_site_id) {
			wp_redirect(network_admin_url('site-info.php?id=' . $new_site_id));
			exit;
		} else {
			wp_die('Erro ao clonar o site.');
		}
	}
}
?>
