<?php
/**
 * Terra D\'arate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Terra_D\'arate
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function terra_darate_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Terra D\'arate, use a find and replace
		* to change 'terra-darate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('terra-darate', get_template_directory() . '/languages');

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
			'menu-1' => esc_html__('Primary', 'terra-darate'),
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
			'terra_darate_custom_background_args',
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
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}

add_action('after_setup_theme', 'terra_darate_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function terra_darate_content_width()
{
	$GLOBALS['content_width'] = apply_filters('terra_darate_content_width', 640);
}

add_action('after_setup_theme', 'terra_darate_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function terra_darate_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'terra-darate'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'terra-darate'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}

add_action('widgets_init', 'terra_darate_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function terra_darate_scripts()
{
	wp_enqueue_style('terra-darate-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('terra-darate-style', 'rtl', 'replace');
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), _S_VERSION);

	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome/css/fontawesome.min.css');
	wp_enqueue_style('font-awesome-all', get_stylesheet_directory_uri() . '/css/font-awesome/css/all.min.css');
	wp_enqueue_style('swiper-bundle', get_stylesheet_directory_uri() . '/css/swiper/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_style('aos', get_stylesheet_directory_uri() . '/css/aos/aos.css', array(), _S_VERSION);

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.js', array(), _S_VERSION);
	wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/js/swiper/swiper-bundle.min.js', array(), _S_VERSION);
	wp_enqueue_script('js-cookie', get_template_directory_uri() . '/js/js.cookie.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('common-page', get_template_directory_uri() . '/js/common.js', array(), _S_VERSION, true);
	wp_enqueue_script('header', get_template_directory_uri() . '/js/header.js', array(), _S_VERSION, true);

	wp_enqueue_script('aos', get_template_directory_uri() . '/js/aos/aos.js', array(), _S_VERSION, true);

	if (is_home()) {
		wp_enqueue_style('home-page', get_stylesheet_directory_uri() . '/dist/css/home.min.css', array(), _S_VERSION);
	}

	if (is_page()) {
		wp_enqueue_style('pagestyle', get_stylesheet_directory_uri() . '/dist/css/page.min.css', array(), _S_VERSION);
	}

	if (is_404() || is_page()) {
		wp_dequeue_script('header');
	}

	if (!wp_script_is('jquery', 'enqueued')) {
		//Enqueue
		wp_enqueue_script('jquery');

	}

	if (is_page_template(['page_portfolio-all.php'])) {
		wp_enqueue_style('projects-style', get_stylesheet_directory_uri() . '/dist/css/project-page.min.css', array(), _S_VERSION);
		wp_dequeue_script('header');

		wp_enqueue_script('isotope-pkgd', get_template_directory_uri() . '/js/isotope-layout/isotope.pkgd.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('projects', get_template_directory_uri() . '/js/projects-page.js', array(), _S_VERSION, true);
	}

	if (is_page_template(['page_about-template.php'])) {
		wp_enqueue_script('header');
	}

	if (is_singular(['post', 'tiger_portfolio'])) {
		wp_enqueue_style('single-page', get_stylesheet_directory_uri() . '/dist/css/single.min.css', array(), _S_VERSION);
		wp_dequeue_script('header');
	}

}

add_action('wp_enqueue_scripts', 'terra_darate_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once get_template_directory() . '/functions/module-clients-listing.php';

function get_post_type_template()
{
	$postType = [
		"header-banner-full-width" => "Header banner full width"
	];
	return $postType;
}

add_action('add_meta_boxes', 'add_fileds_portfolio');
function add_fileds_portfolio($post)
{
	add_meta_box(
		'tiger_portfolio_template', // Metabox ID
		'Portfolio Template', // Title to display
		'tiger_portfolio_template_render', // Function to call that contains the metabox content
		'tiger_portfolio', // Post type to display metabox on
		'normal', // Where to put it (normal = main colum, side = sidebar, etc.)
		'default' // Priority relative to other metaboxes
	);
}

function tiger_portfolio_template_render()
{

	?>

	<fieldset>
		<table class="form-table">

			<tbody>
			<tr valign="top">
				<th scope="row"><?php _e('Portfolio template', 'terra-darate');?>
				</th>
				<td>
					<select name="tiger_portfolio_template" id="tiger_portfolio_template">
						<option value="">Default</option>
						<?php
						$templates = get_post_type_template();
						foreach ($templates as $key => $template): ?>
							<option
								value="<?= $key ?>" <?= isset($_GET['action']) && $_GET['action'] == 'edit' && get_post_meta($_GET['post'], '_tiger_portfolio_template', true) ? 'selected="selected"' : '' ?>><?= $template ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php 	_e('Project information', 'terra-darate');?>
				</th>
				<td>
					<?php
					$old_description = '';
					if (isset($_GET['post'])) {
						$old_description = get_post_meta($_GET['post'], '_project_information', true);
					}
					$editor_id = 'project_information';
					$settings = array('media_buttons' => false,
						'editor_height' => 200,
						'textarea_rows' => 20
					);

					wp_editor($old_description, $editor_id, $settings);
					?>
				</td>
			</tr>
			</tbody>
		</table>

	</fieldset>
	<?php
}

add_action('save_post', 'save_portfolio_data');
function save_portfolio_data($postid)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
	if (!current_user_can('edit_page', $postid)) return false;
	if (empty($postid) || $_POST['post_type'] != 'tiger_portfolio') return false;
	if (isset($_POST['action']) && $_POST['action'] == 'editpost') {
		delete_post_meta($postid, '_tiger_portfolio_template');
		delete_post_meta($postid, '_project_information');
	}
	if (isset($_POST['tiger_portfolio_template'])) {
		add_post_meta($postid, '_tiger_portfolio_template', $_POST['tiger_portfolio_template']);
	}
	if (isset($_POST['project_information'])) {
		add_post_meta($postid, '_project_information', $_POST['project_information']);
	}
}

/**
 * Get content of post with id
 */
if (!function_exists('getPostContent')) {

	function getPostContent($post): string
	{
		return apply_filters('the_content', get_post_field('post_content', $post->ID));
	}

}


require_once 'functions/add-fields-page.php';

require_once 'functions/page/about-us.php';


add_action('post_submitbox_misc_actions', 'hide_page_title');
function hide_page_title($post)
{
	print_r('haiiii');
	print_r(get_post_type());
	if (get_post_type() == 'page') {
		$value = get_post_meta($post->ID, '_hide_page_title', true);
		echo '<div class="misc-pub-section misc-pub-section-last">
         <span id="timestamp">'
			. '<label><input type="checkbox"' . (!empty($value) ? ' checked="checked" ' : null) . 'value="1" name="hide_page_title" />Hide the page title</label>'
			. '</span></div>';
	}
}

add_action( 'save_post', 'save_page_data' );
function save_page_data($postid)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
	if (!current_user_can('edit_page', $postid)) return false;
	if (empty($postid) || $_POST['post_type'] != 'page') return false;

	if ($_POST['action'] == 'editpost') {
		delete_post_meta($postid, '_hide_page_title');
	}

	if (isset($_POST['hide_page_title'])) {
		add_post_meta($postid, '_hide_page_title', $_POST['hide_page_title']);
	}
}

function my_enqueue($hook) {
	// Only add to the edit.php admin page.
	// See WP docs.
	if (get_post_type() !== 'page') {
		return;
	}
	$myThemeParams = array(
		'homeURL' => home_url(),
		'hidePageTitle' => get_post_meta( get_the_ID(),'_hide_page_title', true )
	);
	wp_enqueue_script('my_custom_script', get_theme_file_uri() . '/js/admin/page.js');
	wp_add_inline_script( 'my_custom_script', 'var myThemeParams = ' . wp_json_encode( $myThemeParams ), 'before' );
}

add_action('admin_enqueue_scripts', 'my_enqueue');

require_once 'functions/lang-string.php';
