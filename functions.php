<?php

/**
 * Neman functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Neman
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

define('THEME_PATH', get_template_directory_uri());

if (!function_exists('neman_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function neman_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Neman, use a find and replace
		 * to change 'neman' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('neman', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header-menu' => esc_html__('Главное', 'neman'),
				'footer-menu' => esc_html__('Футер', 'neman'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'neman_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'neman_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function neman_content_width()
{
	$GLOBALS['content_width'] = apply_filters('neman_content_width', 640);
}
add_action('after_setup_theme', 'neman_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function neman_scripts()
{

	wp_enqueue_style('styles', THEME_PATH . '/assets/css/app.css', array(), _S_VERSION);
	wp_enqueue_style('neman-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('neman-style', 'rtl', 'replace');

	wp_enqueue_script('scripts', THEME_PATH . '/assets/js/app.js', array('jquery'), _S_VERSION);

	$frontpage = function_exists('pll_get_post') ? pll_get_post(get_option('page_on_front')) : get_option('page_on_front');

	wp_localize_script('scripts', 'utils', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'api_url' => get_rest_url(0, '/services/v1/type/' . get_queried_object_id()),
		'stageDurations' => array(
			'stage1' => !empty(rwmb_meta('stage1_duration', array('object_type' => 'term'), get_queried_object_id())) ? rwmb_meta('stage1_duration', array('object_type' => 'term'), get_queried_object_id()) : 0.4,
			'stage2' => !empty(rwmb_meta('stage2_duration', array('object_type' => 'term'), get_queried_object_id())) ? rwmb_meta('stage2_duration', array('object_type' => 'term'), get_queried_object_id()) : 0.4,
			'stage3' => !empty(rwmb_meta('stage3_duration', array('object_type' => 'term'), get_queried_object_id())) ? rwmb_meta('stage3_duration', array('object_type' => 'term'), get_queried_object_id()) : 0.2,
		),
		'cities_url' => get_rest_url(0, '/map/v1/cities/' . (function_exists('pll_current_language') ? pll_current_language() : 'en')),
		'translations' => array(
			'aboutus' => __('About us', 'neman'),
			'products' => __('Products & services', 'neman'),
			'projects' => __('Projects', 'neman'),
			'contacts' => __('Contact us', 'neman'),
			'projecTeamHeading' => __('Project team', 'neman'),
			'timelineHeading' => __('Timeline for a similar project', 'neman'),
			'servicesHeading' => __('Select products', 'neman'),
			'structureHeading' => __('Your project structure', 'neman'),
			'noServices' => __('You have not added any services yet', 'neman'),
			'estimatedTeam' => __('Estimated team', 'neman'),
			'estimatedDuration' => __('Estimated duration', 'neman'),
			'details' => __('Details', 'neman'),
			'people' => __('people', 'neman'),
			'month' => __('month', 'neman'),
			'director' => __('Director', 'neman'),
			'manager' => __('Manager', 'neman'),
			'consultant' => __('Consultant', 'neman'),
			'seniorConsultant' => __('Senior Consultant', 'neman'),
			'seniorAnalyst' => __('Senior Analyst', 'neman'),
			'analyst' => __('Analyst', 'neman'),
			'tbd' => __('TBD', 'neman'),
			'days' => __('days', 'neman'),
			'stageCompleted' => __('Stage completed', 'neman'),
			'timelineSubheading' => __('Here you can find a sample timeline for a project with the same list of products that you have selected above', 'neman'),
			'projecTeamSubheading' => __('Here you can find a sample governance structure for the project with the same list of products that you have selected above', 'neman'),
			'servicesSubheading' => __('Add or remove products from the list on the right to create your own project and get a high-level project estimation', 'neman'),
		),
		'frontpage' => array(
			'about_heading' => rwmb_meta('about_heading', '', $frontpage),
			'about_content' => rwmb_meta('about_content', '', $frontpage),
			'about_url' => rwmb_meta('about_url', '', $frontpage),
			'products_heading' => rwmb_meta('products_heading', '', $frontpage),
			'products_content' => rwmb_meta('products_content', '', $frontpage),
			'products_url' => rwmb_meta('products_url', '', $frontpage),
			'projects_heading' => rwmb_meta('projects_heading', '', $frontpage),
			'projects_content' => rwmb_meta('projects_content', '', $frontpage),
			'projects_url' => rwmb_meta('projects_url', '', $frontpage),
			'contacts_heading' => rwmb_meta('contacts_heading', '', $frontpage),
			'contacts_content' => rwmb_meta('contacts_content', '', $frontpage),
			'contacts_url' => rwmb_meta('contacts_url', '', $frontpage),
		)
	));
}
add_action('wp_enqueue_scripts', 'neman_scripts');


require get_template_directory() . '/inc/wp_header_menu.php';
require get_template_directory() . '/inc/wp_footer_menu.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/services_api.php';
require get_template_directory() . '/inc/cities_api.php';
require get_template_directory() . '/inc/filters.php';

add_action('init', 'cpt_init');
function cpt_init()
{
	register_post_type('project', array(
		'labels'             => array(
			'name'               => __('Credentials', 'neman'),
			'singular_name'      => __('Credential', 'neman'),
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый проект',
			'edit_item'          => 'Редактировать проект',
			'new_item'           => 'Новый проект',
			'view_item'          => 'Посмотреть проект',
			'search_items'       => 'Найти проект',
			'not_found'          => 'Проектов не найдено',
			'not_found_in_trash' => 'В корзине проектов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => __('Credentials', 'neman')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-images-alt',
		'menu_position'      => null,
		'supports'           => array('title', 'thumbnail', 'excerpt')
	));

	register_post_type('service', array(
		'labels'             => array(
			'name'               => __('Services', 'neman'),
			'singular_name'      => __('Service', 'neman'),
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый сервис',
			'edit_item'          => 'Редактировать сервис',
			'new_item'           => 'Новый сервис',
			'view_item'          => 'Посмотреть сервис',
			'search_items'       => 'Найти сервис',
			'not_found'          => 'Сервисов не найдено',
			'not_found_in_trash' => 'В корзине ничего не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => __('Services', 'neman')

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-excerpt-view',
		'menu_position'      => null,
		'supports'           => array('title')
	));

	register_post_type('faq', array(
		'labels'             => array(
			'name'               => 'FAQ',
			'singular_name'      => 'FAQ',
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый вопрос',
			'edit_item'          => 'Редактировать вопрос',
			'new_item'           => 'Новый вопрос',
			'view_item'          => 'Посмотреть вопрос',
			'search_items'       => 'Найти вопрос',
			'not_found'          => 'Вопросов не найдено',
			'not_found_in_trash' => 'В корзине ничего не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'FAQ'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-editor-ul',
		'supports'           => array('title', 'editor')
	));

	register_taxonomy('categories', ['project'], [
		'label'                 => 'Категории',
		'labels'                => array(
			'name'              => 'Категории',
			'singular_name'     => 'Категория',
			'search_items'      => 'Искать категорию',
			'all_items'         => 'Все категорию',
			'parent_item'       => 'Родит. категория',
			'parent_item_colon' => 'Родит. категория:',
			'edit_item'         => 'Ред. категорию',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Добавить',
			'new_item_name'     => 'Новый',
			'menu_name'         => 'Категории',
		),
		'description'           => 'Категории',
		'public'                => true,
		'show_in_nav_menus'     => true,
		'hierarchical'          => true,
		'show_admin_column'     => true,
	]);

	register_taxonomy('types', ['service'], [
		'label'                 => 'Тип',
		'labels'                => array(
			'name'              => 'Типы',
			'singular_name'     => 'Тип',
			'search_items'      => 'Искать типы сервисов',
			'all_items'         => 'Все типы',
			'parent_item'       => 'Родит. тип',
			'parent_item_colon' => 'Родит. тип:',
			'edit_item'         => 'Ред. тип',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Добавить',
			'new_item_name'     => 'Новый',
			'menu_name'         => 'Типы',
		),
		'description'           => 'Типы сервисов',
		'public'                => true,
		'show_in_nav_menus'     => true,
		'hierarchical'          => true,
		'show_admin_column'     => true,
	]);

	register_taxonomy('theme', ['faq'], [
		'label'                 => 'Темы',
		'labels'                => array(
			'name'              => 'Темы',
			'singular_name'     => 'Тема',
			'search_items'      => 'Искать тему',
			'all_items'         => 'Все темы',
			'parent_item'       => 'Родит. тема',
			'parent_item_colon' => 'Родит. тема:',
			'edit_item'         => 'Ред. тему',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Добавить',
			'new_item_name'     => 'Новый',
			'menu_name'         => 'Темы',
		),
		'description'           => 'Темы вопросов',
		'public'                => true,
		'show_in_nav_menus'     => false,
		'hierarchical'          => true,
		'show_admin_column'     => true,
	]);
}

// Breadcrumbs
function the_breadcrumbs($class_prefix)
{

	// Settings
	$breadcrumbs_class   = $class_prefix . '__breadcrumbs breadcrumbs';
	$home_title         = __('Home', 'neman');

	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy    = 'product_cat';

	// Get the query & post information
	global $post, $wp_query;

	// Do not display on the homepage
	if (!is_front_page()) {

		// Build the breadcrums
		echo '<nav class="' . $breadcrumbs_class . '" aria-label="breadcrumb"><ol class="breadcrumbs__list">';

		// Home page
		echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';

		if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
			echo '<li class="breadcrumbs__item">' . post_type_archive_title('', false) . '</li>';
		} else if (is_archive() && is_tax() && !is_category() && !is_tag()) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if ($post_type != 'post') {

				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
			}

			$custom_tax_name = get_queried_object()->name;
			echo '<li class="breadcrumbs__item">' . $custom_tax_name . '</li>';
		} else if (is_single()) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if ($post_type != 'post') {

				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);

				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
			}

			// Get post category info
			$category = get_the_category();

			if (!empty($category)) {

				// Get last category post is in
				$last_category = end(array_values($category));

				// Get parent any categories and create array
				$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
				$cat_parents = explode(',', $get_cat_parents);

				// Loop through parent categories and store in variable $cat_display
				$cat_display = '';
				foreach ($cat_parents as $parents) {
					$cat_display .= '<li class="breadcrumbs__item">' . $parents . '</li>';
				}
			}

			// If it's a custom post type within a custom taxonomy
			$taxonomy_exists = taxonomy_exists($custom_taxonomy);
			if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

				$taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
				$cat_id         = $taxonomy_terms[0]->term_id;
				$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
				$cat_name       = $taxonomy_terms[0]->name;
			}

			// Check if the post is in a category
			if (!empty($last_category)) {
				echo $cat_display;
				echo '<li class="breadcrumbs__item">' . get_the_title() . '</li>';

				// Else if post is in a custom taxonomy
			} else if (!empty($cat_id)) {

				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
				echo '<li class="breadcrumbs__item">' . get_the_title() . '</li>';
			} else {

				echo '<li class="breadcrumbs__item">' . get_the_title() . '</li>';
			}
		} else if (is_category()) {

			// Category page
			echo '<li class="breadcrumbs__item">' . single_cat_title('', false) . '</li>';
		} else if (is_page()) {

			// Standard page
			if ($post->post_parent) {

				// If child page, get parents 
				$anc = get_post_ancestors($post->ID);

				// Get parents in the right order
				$anc = array_reverse($anc);

				// Parent page loop
				if (!isset($parents)) $parents = null;
				foreach ($anc as $ancestor) {
					$parents .= '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
				}

				// Display parent pages
				echo $parents;

				// Current page
				echo '<li class="breadcrumbs__item">' . get_the_title() . '</li>';
			} else {

				// Just display current page if not parents
				echo '<li class="breadcrumbs__item">' . get_the_title() . '</li>';
			}
		} else if (is_tag()) {

			// Tag page

			// Get tag information
			$term_id        = get_query_var('tag_id');
			$taxonomy       = 'post_tag';
			$args           = 'include=' . $term_id;
			$terms          = get_terms($taxonomy, $args);
			$get_term_name  = $terms[0]->name;

			// Display the tag name
			echo '<li class="breadcrumbs__item">' . $get_term_name . '</li>';
		} elseif (is_day()) {

			// Day archive

			// Year link
			echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</a></li>';

			// Month link
			echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . '</a></li>';

			// Day display
			echo '<li class="breadcrumbs__item">' . get_the_time('jS') . ' ' . get_the_time('M') . '</li>';
		} else if (is_month()) {

			// Month Archive

			// Year link
			echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</a></li>';

			// Month display
			echo '<li class="breadcrumbs__item">" title="' . get_the_time('M') . '">' . get_the_time('M') . '</li>';
		} else if (is_year()) {

			// Display year archive
			echo '<li class="breadcrumbs__item">' . get_the_time('Y') . '</li>';
		} else if (is_author()) {

			// Auhor archive

			// Get the author information
			global $author;
			$userdata = get_userdata($author);

			// Display author name
			echo '<li class="breadcrumbs__item">' . $userdata->display_name . '</li>';
		} else if (get_query_var('paged')) {

			// Paginated archives
			echo '<li class="breadcrumbs__item">' . __('Page', 'neman') . ' ' . get_query_var('paged') . '</li>';
		} else if (is_search()) {

			// Search results page
			echo '<li class="breadcrumbs__item">' . __('Search results for:', 'neman') . ' ' . get_search_query() . '</li>';
		} elseif (is_404()) {

			// 404 page
			echo '<li class="breadcrumbs__item">' . '404' . '</li>';
		}

		echo '</ol></nav>';
	}
}

function pagesNav($class_prefix)
{

	$pagelist = get_pages('sort_column=menu_order&sort_order=asc');
	$pages = array();

	foreach ($pagelist as $page) {
		$pages[] += $page->ID;
	}

	$current = array_search(get_the_ID(), $pages);
	$prevID = $pages[$current - 1];
	$nextID = $pages[$current + 1];
?>
	<div class="<?= $class_prefix; ?>__pages-navigation pages-navigation">
		<ul class="pages-navigation__list">
			<?php if (!empty($prevID)) : ?>
				<li class="pages-navigation__item pages-navigation__item--prev"><a href="<?= get_permalink($prevID); ?>" title="<?= get_the_title($prevID); ?>" class="pages-navigation__link pages-navigation__link--prev"><?= get_the_title($prevID); ?></a></li>
			<?php endif; ?>
			<?php if (!empty($nextID)) : ?>
				<li class="pages-navigation__item pages-navigation__item--next"><a href="<?= get_permalink($nextID); ?>" title="<?= get_the_title($nextID); ?>" class="pages-navigation__link pages-navigation__link--next"><?= get_the_title($nextID); ?></a></li>
			<?php endif; ?>
		</ul>
	</div>
<?php
}

function postsNav($class_prefix, $post_type = 'post')
{

	$pagelist = get_posts('sort_column=menu_order&sort_order=asc&post_type=' . $post_type);
	$pages = array();

	foreach ($pagelist as $page) {
		$pages[] += $page->ID;
	}

	$current = array_search(get_the_ID(), $pages);
	$prevID = $pages[$current - 1];
	$nextID = $pages[$current + 1];
?>
	<div class="<?= $class_prefix; ?>__pages-navigation pages-navigation">
		<ul class="pages-navigation__list">
			<?php if (!empty($prevID)) : ?>
				<li class="pages-navigation__item pages-navigation__item--prev"><a href="<?= get_permalink($prevID); ?>" title="<?= get_the_title($prevID); ?>" class="pages-navigation__link pages-navigation__link--prev"><?= get_the_title($prevID); ?></a></li>
			<?php endif; ?>
			<?php if (!empty($nextID)) : ?>
				<li class="pages-navigation__item pages-navigation__item--next"><a href="<?= get_permalink($nextID); ?>" title="<?= get_the_title($nextID); ?>" class="pages-navigation__link pages-navigation__link--next"><?= get_the_title($nextID); ?></a></li>
			<?php endif; ?>
		</ul>
	</div>
<?php
}

function svg_support($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'svg_support');

add_action('template_redirect', 'cpt_required_redirects');

function cpt_required_redirects()
{
	if (is_singular('service')) {
		wp_redirect(site_url(), 301);
		exit;
	}
	if (is_post_type_archive('service')) {
		wp_redirect(site_url(), 301);
		exit;
	}
	if (is_singular('faq')) {
		wp_redirect(get_post_type_archive_link('faq'), 301);
		exit;
	}
}

add_action('wp_ajax_contact_form', 'contact_form_process');
add_action('wp_ajax_nopriv_contact_form', 'contact_form_process');

function contact_form_process()
{

	if (!preg_match("/[0-9]+/",  htmlspecialchars(trim($_POST["name"])))) {

		// Set content type html
		add_filter('wp_mail_content_type', 'custom_wp_mail_content_type');
		function custom_wp_mail_content_type()
		{
			return 'text/html';
		}

		$attachments = '';

		if ($_FILES['attachment']['name'] != '') {
			if (wp_verify_nonce($_POST['fileup_nonce'], 'attachment')) {

				if (!function_exists('wp_handle_upload'))
					require_once(ABSPATH . 'wp-admin/includes/file.php');

				$file = &$_FILES['attachment'];

				$overrides = ['test_form' => false];

				$movefile = wp_handle_upload($file, $overrides);

				if ($movefile && empty($movefile['error'])) {
					$attachments = $movefile['file'];
				} else {
					wp_die();
				}
			}
		}

		$to      = get_option('admin_email');
		$subject = 'Neman - контактная форма';
		$headers = 'From: Neman <auto@shuvalov.crazytest.studio>';

		$message = '<html>';
		$message .= '<head>';
		$message .= '<title>' . $subject . '</title>';
		$message .= '</head>';
		$message .= '<body>';

		$message .= '<h3>' . $subject . '</h3>';
		$message .= '<p>Имя: ' . $_POST['name'] . '</p>';
		$message .= '<p>Email: ' . $_POST['email'] . '</p>';
		$message .= '<p>Телефон: ' . $_POST['tel'] . '</p>';
		$message .= '<p>Сообщение: ' . $_POST['message'] . '</p>';
		$message .= '</body></html>';

		$email = wp_mail($to, $subject, $message, $headers, $attachments);

		// Reset content type html to avoid conflicts
		remove_filter('wp_mail_content_type', 'custom_wp_mail_content_type');

		return $email;
		wp_die();
	}
}
