<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Terra_D\'arate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$logoUrl = get_template_directory_uri() . '/images/logo-terra-white.png';
if (has_custom_logo()) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logoUrl = wp_get_attachment_image_url($custom_logo_id, 'full');
}
$locations = get_nav_menu_locations();
$theme_location ='menu-1';
$menu = get_term( $locations[$theme_location], 'nav_menu' );
$menu_items = wp_get_nav_menu_items($menu->term_id);

?>

<header class="main-header fixed-top <?= $args['nav-has-bg']?'nav-has-bg':''?>" id="main_header">
	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid">
			<a href="<?= esc_url( home_url( '/' ))?>" class="z-index-1000-mobile"><img class="logo hide-pc" src="<?= $logoUrl?>"
														 alt="<?= bloginfo( 'name' )?>"></a>
			<button class="navbar-toggler z-index-1000-mobile collapsed" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarNav"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<div class='menu'>
					<svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect class="top" x="20" y="29" width="60" height="7" rx="4" fill="white"/>
						<rect class="middle" x="20" y="45.5745" width="60" height="7" rx="4" fill="white"/>
						<rect class="bottom" x="20" y="62.1489" width="60" height="7" rx="4" fill="white"/>
					</svg>
				</div>
			</button>
			<div class="collapse navbar-collapse nav-center-logo" id="navbarNav">
				<ul class="navbar-nav justify-content-around">
					<?php
					foreach ( $menu_items as $menu_item ):
					?>
					<li class="nav-item">
						<a class="nav-link" href="<?= $menu_item->url?>"><?= $menu_item->post_title?></a>
					</li>

					<?php endforeach;?>
				</ul>
				<div class="center-logo hide-tablet hide-mobile">
					<a href="<?= esc_url( home_url( '/' ))?>">
						<img class="logo" src="<?= $logoUrl?>" alt="<?= bloginfo( 'name' )?>">
					</a>
				</div>
				<div class="menu-right text-end">
					<ul class="button-group switch-lang">
						<li><a href="<?= esc_attr( get_option('tiger_contact_page_uri') )?>" class="btn btn-booknow">Book now</a></li>
						<?php pll_the_languages(); ?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>
