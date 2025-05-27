<?php
// integração sales force
require_once(__DIR__ . '/sales-force/integration.php');

// option page
function create_acf_option_pages(): void
{

	if (function_exists('acf_add_options_page')) {

		acf_add_options_page([

			'page_title'    => 'Configurações Gerais',

			'menu_title'    => 'Configurações Gerais',

			'menu_slug'     => 'configuracoes-gerais',

		]);
	}
}
add_action('init', 'create_acf_option_pages');

function create_acf_section_popup(): void
{

	if (function_exists('acf_add_options_page')) {

		acf_add_options_page([

			'page_title'    => 'Pop-up Home',

			'menu_title'    => 'Pop-up Home',

			'menu_slug'     => 'popup-home',

		]);
	}
}
add_action('init', 'create_acf_section_popup');


function THEME_SLUG_posts_add_rewrite_rules($wp_rewrite) {
    $new_rules = array(
        'blog/page/([0-9]{1,})/?$' => 'index.php?post_type=post&paged=' . $wp_rewrite->preg_index(1),
        'blog/([^/]+)/?$' => 'index.php?post_type=post&name=' . $wp_rewrite->preg_index(1),
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'THEME_SLUG_posts_add_rewrite_rules');

function THEME_SLUG_posts_change_blog_links($post_link, $post) {
    if ( 'post' === $post->post_type ) {
        return home_url('/blog/' . $post->post_name . '/');
    }
    return $post_link;
}
add_filter('post_link', 'THEME_SLUG_posts_change_blog_links', 10, 2);

function hoist_object()
{
	global $wp;

	// URLS
	$theme_url = get_bloginfo('template_url');
	$admin_url = admin_url('admin-ajax.php');
	$home_url = home_url('/');
	$current_url = home_url($wp->request);
	$is_front_page = is_front_page();
	$page_obj = get_queried_object();

	$hoist = [
		'theme_url'       => $theme_url,
		'admin_url'       => $admin_url,
		'home_url'        => $home_url,
		'current_url'     => $current_url,
		'is_single'       => is_single(),
		'is_front_page'   => $is_front_page,
		'page'            => $page_obj,
		'currentObjectID' => get_queried_object_id()
	];

	$hoist = json_encode($hoist);

	if ($hoist) {
		wp_localize_script('app-js', 'hoist', $hoist);
	}
}
add_action('wp_enqueue_scripts', 'hoist_object');

// MENU
function setup_menus()
{
	register_nav_menus(array(
		'header'   => 'Header',
		'header-mobile'   => 'Header Mobile',
		'footer-1'   => 'Footer 1',
		'footer-2'   => 'Footer 2',
		'footer-3'   => 'Footer 3',
		'footer-4'   => 'Footer 4',
		'footer-5'   => 'Footer 5'
	));
}
add_action('after_setup_theme', 'setup_menus');

function buildTree(array $elements, $parentId = 0)
{
	$branch = array();
	foreach ($elements as $x) {
		$element = json_decode(json_encode($x), True);
		if ($element['menu_item_parent'] == $parentId) {
			$children = buildTree($elements, $element['ID']);
			if ($children) {
				$element['children'] = $children;
			}
			$branch[] = $element;
		}
	}
	return $branch;
}
// FIM MENU

// suport thumb
function ed_support_thumbnails()
{
	add_theme_support('post-thumbnails'); // thumbnails
}
add_action('after_setup_theme', 'ed_support_thumbnails');


//registrando visitas
function ed_set_post_views($postID)
{
	$count_key = 'ed_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}



// Formata número para whatsapp ou fixo
function formatNumber($number)
{
	return preg_replace('/[^0-9]/', '', $number);
}

/**
 * Enqueue scripts and styles.
 */
add_action('init', 'register_custom_styles_scripts');
function register_custom_styles_scripts()
{

	// Carregar arquivos JS e CSS aqui

	wp_register_style('bootstrap-css', get_template_directory_uri() . '/dist/build/css/bootstrap.min.css');
	wp_register_style('main-css', get_template_directory_uri() . '/dist/css/main.css', array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-home', get_template_directory_uri() . '/dist/css/pages/home.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-sobre-nos', get_template_directory_uri() . '/dist/css/pages/sobre-nos.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-fale-conosco', get_template_directory_uri() . '/dist/css/pages/fale-conosco.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-veiculos', get_template_directory_uri() . '/dist/css/pages/veiculos.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-padrao-corrido', get_template_directory_uri() . '/dist/css/pages/padrao-corrido.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-unidades', get_template_directory_uri() . '/dist/css/pages/unidades.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-servicos', get_template_directory_uri() . '/dist/css/pages/servicos.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-ofertas-0km', get_template_directory_uri() . '/dist/css/pages/ofertas-0k.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-single-ofertas', get_template_directory_uri() . '/dist/css/pages/single-novo.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-single-novo', get_template_directory_uri() . '/dist/css/pages/single-novo.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-agendamento', get_template_directory_uri() . '/dist/css/pages/agendamento.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-consulte-seu-direito', get_template_directory_uri() . '/dist/css/pages/consulte-seu-direito.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-avaliacao-gratis', get_template_directory_uri() . '/dist/css/pages/avaliacao-gratis.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-renovacao-isencao', get_template_directory_uri() . '/dist/css/pages/renovacao-isencao.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-blog', get_template_directory_uri() . '/dist/css/pages/blog.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-single-blog', get_template_directory_uri() . '/dist/css/pages/single-blog.css',  array('bootstrap-css'), '1.0', 'all');


	wp_register_style('page-obrigado-quiz', get_template_directory_uri() . '/dist/css/pages/obrigado-quiz.css',  array('bootstrap-css'), '1.0', 'all');


	wp_register_style('splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/splide.min.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('font-awesome', get_template_directory_uri() . '/dist/css/font-awesome.min.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('light-box-css', get_template_directory_uri() . '/dist/css/lightbox.min.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('jquery-ui-css', get_template_directory_uri() . '/dist/css/jquery-ui.css',  array('bootstrap-css'), '1.0', 'all');

	wp_register_script('popper', get_template_directory_uri() . '/dist/js/popper.min.js', '', null, true);
	wp_register_script('app-js', get_template_directory_uri() . '/dist/js/app.min.js', '', null, true);

	wp_register_script('bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.min.js', '', null, true);
	wp_register_script('polyfill', 'https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver', '', null, true);
	wp_register_script('light-box-js', get_template_directory_uri() . '/dist/js/lightbox-plus-jquery.js', '', null, true);
	wp_register_script('countdown-js', get_template_directory_uri() . '/dist/js/countdown.js', '', null, false);

	wp_register_script('swall-alert', 'https://cdn.jsdelivr.net/npm/sweetalert2@9', '', null, true);
	wp_register_script('vanilla-js', 'https://cdn.rawgit.com/lagden/vanilla-masker/lagden/build/vanilla-masker.min.js', '', null, true);
	wp_register_script('splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js', '', null, false);
	wp_register_script('jquery-js',   'https://code.jquery.com/jquery-3.6.0.js', '', null, false);
	wp_register_script('jquery-ui-js',   get_template_directory_uri() . '/dist/js/jquery-ui.js', '', null, false);
}

function theme_scripts()
{
	// css global
	wp_enqueue_style('bootstrap-css');
	wp_enqueue_style('main-css');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('splide-css');
	wp_enqueue_style('light-box-css');

	// css page 
	$styles = 	array(
		'page-home',
		'page-sobre-nos',
		'page-veiculos',
		'page-fale-conosco',
		'page-padrao-corrido',
		'page-servicos',
		'page-unidades',
		'page-ofertas-0km',
		'page-single-ofertas',
		'page-single-novo',
		'page-agendamento',
		'page-consulte-seu-direito',
		'page-obrigado-quiz',
		'page-avaliacao-gratis',
		'page-renovacao-isencao'
	);

	foreach ($styles as $style) {
		if (is_page_template($style . '.php')) {
			wp_enqueue_style($style);
		}
	}

	if (is_category() || is_home()) {
		wp_enqueue_style('page-blog');
	}

	if (is_404()) {
		wp_enqueue_style('404');
	}

	if (is_single() &&  get_post_type() == 'veiculos') {
		wp_enqueue_style('page-single-novo');
		wp_enqueue_script('light-box-js');
	}

	if (is_single() &&  get_post_type() == 'ofertas') {
		wp_enqueue_style('page-single-ofertas');
	}

	if (is_single() &&  get_post_type() == 'promocao-de-servico') {
		wp_enqueue_style('page-single-promocao-oficina');
	}

	if (is_single() &&  get_post_type() == 'unidades') {
		wp_enqueue_style('page-unidades');
	}

	if (is_single() &&  get_post_type() == 'semi-novos') {
		wp_enqueue_style('page-single-seminovos');
		wp_enqueue_style('jquery-ui-css');
		wp_enqueue_script('jquery-js');
		wp_enqueue_script('jquery-ui-js');
	}

	if (is_page('seminovos')) {
		wp_enqueue_style('jquery-ui-css');
		wp_enqueue_script('jquery-js');
		wp_enqueue_script('jquery-ui-js');
	}

	if (is_single() && 'post' == get_post_type()) {
		wp_enqueue_style('page-single-blog');
	}


	// js global
	wp_enqueue_script('popper');

	wp_enqueue_script('bootstrap-js');
	wp_enqueue_script('app-js');

	wp_enqueue_script('countdown-js');

	// wp_enqueue_script('polyfill');
	// wp_enqueue_script('swall-alert');
	wp_enqueue_script('vanilla-js');
	wp_enqueue_script('splide-js');
}
add_action('wp_enqueue_scripts', 'theme_scripts');


// generics


function valida_oferta($dataIni, $dataFim = null)
{
	try {
		// Configuração do fuso horário para o Brasil/São_Paulo
		date_default_timezone_set('America/Sao_Paulo');
		// Convertendo as strings para objetos DateTime
		$dataInicial = new DateTime($dataIni);

		// Se a data final não for fornecida, considera como nula (sem limite superior)
		$dataFinal = $dataFim ? new DateTime($dataFim) : null;

		$dataAtual = new DateTime();

		// Formatando as datas para ignorar os microssegundos
		$dataInicialFormatada = $dataInicial->format('Y-m-d H:i:s');
		$dataFinalFormatada = $dataFinal ? $dataFinal->format('Y-m-d H:i:s') : null;
		$dataAtualFormatada = $dataAtual->format('Y-m-d H:i:s');


		// Se a data final for nula, apenas verifica se a data atual é posterior à data inicial
		if ($dataFinalFormatada === null && $dataAtualFormatada >= $dataInicialFormatada) {
			return true;
		}

		// Comparando as datas se a data final estiver definida
		if ($dataFinalFormatada !== null && $dataAtualFormatada >= $dataInicialFormatada && $dataAtualFormatada <= $dataFinalFormatada) {
			return true;
		} else {
			return false;
		}
	} catch (Exception $e) {
		// Tratamento de erro, se necessário
		return false;
	}
}

// limit words
function limit_words($texto, $limite, $quebra = false)
{
	$tamanho = strlen($texto);
	if ($tamanho <= $limite) { //Verifica se o tamanho do texto é menor ou igual ao limite
		$novo_texto = $texto;
	} else { // Se o tamanho do texto for maior que o limite
		if ($quebra == true) { // Verifica a opção de quebrar o texto
			$novo_texto = trim(substr($texto, 0, $limite)) . "...";
		} else { // Se não, corta $texto na última palavra antes do limite
			$ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
			$novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "..."; // Corta o $texto até a posição localizada
		}
	}
	return $novo_texto; // Retorna o valor formatado
}

// theme ajax requisition 
function load_info_car()
{
	// Valide e sanitize a entrada
	$post_id = isset($_POST['post-id']) ? sanitize_text_field($_POST['post-id']) : '';

	if (empty($post_id)) {
		wp_die('ID do post inválido ou ausente.');
	}

	$posts = new WP_Query(array(
		'post_type'      => 'veiculos',
		'posts_per_page' => 1,
		'post_status'    => 'publish',
		'post__in'       => array($post_id),
	));

	if ($posts->have_posts()) {
		while ($posts->have_posts()) {
			$posts->the_post();

			$data = get_field('versoes');
			$cont = 0;

			foreach ($data['versao'] as $items) {
				$cont++;

				// Valide e sanitize a entrada
				$requested_name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';

				if ($requested_name == $items['nome']) {
					$tabelas =  $items['tabelas'];
					$cont2 = 0;

					foreach ($tabelas as $tabela) {
						$cont2++;
?>
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne">
								<button class="accordion-button <?= ($cont2 != 1) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $cont2; ?>" aria-controls="collapse<?= $cont2; ?>">
									<?= $tabela['nome_tabela']; ?> <i class="fa fa-chevron-down"></i>
								</button>
							</h2>
							<div id="collapse<?= $cont2; ?>" class="accordion-collapse collapse <?= ($cont2 == 1) ? 'show' : ''; ?>" aria-labelledby="heading<?= $cont2; ?>" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<?= $tabela['tabela']; ?>
								</div>
							</div>
						</div>
<?php
					}

					// Verifique se o nome solicitado corresponde e saia do loop
					if ($requested_name == $items['nome']) {
						break;
					}
				}
			}
		}

		wp_die(); // Encerre a chamada AJAX
	} else {
		echo "<h3><strong style='font-size:20px;'> Nenhum Post Encontrado!')</strong></h3>";
	}
}

add_action('wp_ajax_load_info_car', 'load_info_car');
add_action('wp_ajax_nopriv_load_info_car', 'load_info_car');
